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
	private function excuteSql($sql, $dataItemCode, $cacheKey, $curveCount = 1) {
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
		
		// 按设备ID划分
		$deviceMap = array();
		foreach ($rawData as $row) {
			$deviceMap[$row['DEVICE_ID']][] = $row;
		}
		// 每个设备ID进行采样
		$result = array();
		foreach ($deviceMap as $deviceId => $deviceData) {
			$deviceData = $this->sampleData($deviceData, $curveCount);
			if (count($deviceData) != $curveCount) { // 设备采样点不足
				continue;
			}
			$ret = array();
			// 处理数据
			foreach ($deviceData as $row) {
				$ret[] = call_user_func('proc_' . $dataItemCode, $row);
			}
			$result[$deviceId] = $ret;
		}
		return $result;
	}
	
	/**
	 * 批量执行SQL, 多表执行结果整体缓存
	 * @param unknown $sqls
	 * @param unknown $dataItemCode
	 * @param unknown $cacheKey
	 * @return
	 */
	private function excuteMultiSql($sqls, $dataItemCode, $cacheKey, $curveCount = 1) {
		// 先查缓存
		$rawData = $this->getCache($cacheKey);
		if ($rawData === false) {
			// 缓存没有, 查数据库
			$rawData = array();
			foreach ($sqls as $sql) {
				$result = mysql_query($sql, $this->conn_);
				$sqlData = array();
				while ($row = mysql_fetch_assoc($result)) {
					$sqlData[] = $row;
				}
				$rawData[] = $sqlData;
			}
			$this->setCache($cacheKey, $rawData);
		}
		
		$deviceIds = array(); // 记录涉及到的所有device id
		$deviceMapArr = array();
		// 每张表, 分别按设备ID分组
		foreach ($rawData as $sqlData) {
			$deviceMap = array();
			foreach ($sqlData as $row) {
				$deviceMap[$row['DEVICE_ID']][] = $row;
				$deviceIds[$row['DEVICE_ID']] = true;
			}
			$deviceMapArr[] = $deviceMap;
		}
		$deviceIds = array_keys($deviceIds);
	
		$result = array();
		
		// 逐个设备处理
		foreach ($deviceIds as $deviceId) {
			// 对指定的设备，到每张表里进行采样
			$cont = true;
			$sampleData = array();
			foreach ($deviceMapArr as $deviceMap) {
				if (empty($deviceMap[$deviceId])) { // 每张表里没有该设备的采样信息, 跳过该设备
					$cont = false;
					break;
				}
				$sample = $this->sampleData($deviceMap[$deviceId], $curveCount); // 对该表内该设备采样
				if (count($sample) != $curveCount) { // 采样点不足, 跳过该设备
					$cont = false;
					break;
				}
				$sampleData[] = $sample;
			}
			if (!$cont) { // 该设备无法从所有表中取得采样信息, 跳过该设备的信息上报
				continue;
			}
			$ret = array();
			// 处理数据
			for ($i = 0; $i < $curveCount; ++$i) {
				$row = array();
				for ($j = 0; $j < count($sqls); ++$j) {
					$row[] = $sampleData[$j][$i];
				}
				$ret[] = call_user_func_array('proc_' . $dataItemCode, $row);
			}
			$result[$deviceId] = $ret;
		}
		return $result;
	}
	
	/**
	 * 采样数据点
	 * @param unknown $data
	 * @return
	 */
	private function sampleData($data, $curveCount) {
		// 保留96个采样点
		$segSize = intval(count($data) / $curveCount);
		if ($segSize < 1) {
			$segSize = 1;
		}
		$dataValues = array();
		$segIndex = 0;
		while (count($dataValues) < $curveCount) {
			$index = $segIndex++ * $segSize;
			if ($index >= count($data)) {
				break;
			}
			$dataValues[] = $data[$index];
		}
		return $dataValues;
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
		
		// 单表计算上报
		if (!is_array($table)) {
			$sql = "select * from {$table} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59'";
			return $this->excuteSql($sql, $dataItemCode, "{$table}_{$dataTime}", CURVE_COUNT);
		} 
		
		// 多表计算上报
		$sqls = array();
		foreach ($table as $t) {
			$sqls[] = "select * from {$t} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59'";
		}
		return $this->excuteMultiSql($sqls, $dataItemCode, implode('_', $table) . "_" . $dataTime, CURVE_COUNT);
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
		
		// 单表计算上报
		if (!is_array($table)) {
			$sql = "select * from {$table} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59' group by DEVICE_ID order by id desc";
			return $this->excuteSql($sql, $dataItemCode, "{$table}_{$dataTime}");
		}
		
		// 多表计算上报
		$sqls = array();
		foreach ($table as $t) {
			$sqls[] = "select * from {$t} where DATE>='{$dataTime} 00:00:00' and DATE<='{$dataTime} 23:59:59' order by id desc";
		}
		return $this->excuteMultiSql($sqls, $dataItemCode, implode('_', $table) . "_" . $dataTime);
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
		
		// 单表计算上报
		if (!is_array($table)) {
			$sql = "select * from {$table} where DATE>='{$dataTimeBeg} 00:00:00' and DATE<='{$dataTimeEnd} 23:59:59' group by DEVICE_ID order by id desc";
			return $this->excuteSql($sql, $dataItemCode, "{$table}_{$ym}");
		}
		// 多表计算上报
		$sqls = array();
		foreach ($table as $t) {
			$sqls[] = "select * from {$t} where DATE>='{$dataTimeBeg} 00:00:00' and DATE<='{$dataTimeEnd} 23:59:59' group by DEVICE_ID order by id desc";
		}
		return $this->excuteMultiSql($sqls, $dataItemCode, implode('_', $table) . "_" . $ym);
	}
}
