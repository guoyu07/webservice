<?php

require_once 'Config.php';
require_once 'Proc.php';

/**
 * 从数据库读取数据
 * @author liangdong01@baidu.com
 *
 */
class Data {	
	// MYSQL连接
	private $conn_ = null;
	
	public function __construct() {
		$this->conn_ = mysql_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD);
		mysql_select_db(MYSQL_DATABASE, $this->conn_);	
	}

	/**
	 * 3.1.1.监测点曲线数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @return
	 */
	public function pointCurveData($dataItemCode, $dataTime) {
		global $CODE2TABLE;
		$table = $CODE2TABLE[$dataItemCode];
		$sql = "select * from {$table} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59'";
		$result = mysql_query($sql, $this->conn_);
		$ret = array();
		while ($row = mysql_fetch_assoc($result)) {
			$ret[] = call_user_func('proc_' . $dataItemCode, $row);
		}
		return $ret;
	}
	
	/**
	 * 3.1.2.监测点日冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @return
	 */
	public function dailyFreez($dataItemCode, $dataTime) {
		global $CODE2TABLE;
		$table = $CODE2TABLE[$dataItemCode];
		$sql = "select * from {$table} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59' order by id desc limit 1";
		$result = mysql_query($sql, $this->conn_);
		$ret = array();
		while ($row = mysql_fetch_assoc($result)) {
			$ret[] = call_user_func('proc_' . $dataItemCode, $row);
		}
		return $ret;
	}
	
	/**
	 * 3.1.3.监测点月冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $ym
	 * @return
	 */
	public function monFreez($dataItemCode, $ym) {
		global $CODE2TABLE;
		$table = $CODE2TABLE[$dataItemCode];
		
		// 求上个月最后一天
		$year = substr($ym, 0, 4);
		$mon = substr($ym, 4, 2);
		$t = strtotime("$year-$mon"); 
		$t += 31 * 86400;
		$dataTime = date('Y-m-d', strtotime(date('Y-m-01', $t)) - 1);
		
		$sql = "select * from {$table} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59' order by id desc limit 1";
		$result = mysql_query($sql, $this->conn_);
		$ret = array();
		while ($row = mysql_fetch_assoc($result)) {
			$ret[] = call_user_func('proc_' . $dataItemCode, $row);
		}
		return $ret;
	}
}