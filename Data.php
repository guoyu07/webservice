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
	// 缓存最近一次查询结果(提高同表多数据项上报的处理性能)
	private $lastCacheKey_ = null;
	private $lastCacheValue_ = null;
	
	/**
	 * 获取最近一次缓存的查询结果
	 * @param unknown $cacheKey
	 * @return
	 */
	private function getCache($cacheKey) {
		if ($this->lastCacheKey_ == $cacheKey) {
			return $this->lastCacheValue_;
		}
		return false;
	}
	
	/**
	 * 设置缓存
	 * @param unknown $cacheKey
	 * @param unknown $cacheValue
	 * @return
	 */
	private function setCache($cacheKey, $cacheValue) {
		$this->lastCacheKey_ = $cacheKey;
		$this->lastCacheValue_ = $cacheValue;
	}
	
	/**
	 * 执行SQL, 返回数据(会使用缓存)
	 * @param unknown $sql
	 * @return
	 */
	private function excuteSql($sql, $dataItemCode, $cacheKey) {
		// 先查缓存
		$rawData = $this->getCache($cacheKey);
		if ($rawData === false) {
			// 缓存没有, 查数据库
			$result = mysql_query($sql, $this->conn_);
			$rawData = array();
			while ($row = mysql_fetch_assoc($result)) {
				$rawData[] = $row;
			}
			$this->setCache($cacheKey, $rawData);
		} 
		$ret = array();
		// 处理数据
		foreach ($rawData as $row) {
			$ret[] = call_user_func('proc_' . $dataItemCode, $row);
		}
		return $ret;
	}
	
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
		return $this->excuteSql($sql, $dataItemCode, "{$table}_{$dataTime}");
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
		return $this->excuteSql($sql, $dataItemCode, "{$table}_{$dataTime}");
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
		$dataTimeBeg = "$year-$mon-01";
		$dataTimeEnd = date('Y-m-d', strtotime(date('Y-m-01', $t)) - 1);
		
		$sql = "select * from {$table} where DATE>='{$dataTimeBeg} 00:00:00' and DATE<='{$dataTimeEnd} 23:59:59' order by id desc limit 1";
		return $this->excuteSql($sql, $dataItemCode, "{$table}_{$ym}");
	}
}
