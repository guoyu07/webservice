<?php

/**
 * @author liangdong01@baidu.com
 * 
 * 上报脚本
 * 
 * 需定时任务主动拉起。
 * 
 * 1）monitorPointCurveService： 3.1.1.监测点曲线数据（每天凌晨1:00拉起）	
 * 2）monitorDailyFreezService：3.1.2.监测点日冻结数据（每天凌晨1:00拉起）
 * 3）monitorMonFreezService：3.1.3.监测点月冻结数据（每月1号1:00拉起）
 * 
 */

require_once 'EmsClient.php';
require_once 'Data.php';
require_once 'Cmd.php';
require_once 'Config.php';

if ($argc < 2 ||
		 !in_array($argv[1], array('monitorPointCurveService', 'monitorDailyFreezService', 'monitorMonFreezService'))) {
	echo 'usage: php main.php [monitorPointCurveService|monitorDailyFreezService|monitorMonFreezService]' . PHP_EOL;
	return;
}

// 上传类型
$cmd = $argv[1];

// 数据源(MYSQL)
$data = new Data();

// Webservice客户端
//$emsClient = new EmsClient();

// 处理上报
//$now = time();
$now = strtotime('2015-12-11');
$yesterday = date('Y-m-d', $now - 86400);
$lastMonth = date('Ym', strtotime(date('Y-m-01', $now)) - 1);

foreach ($CODE_LIST as $dataItemCode) {
	switch ($cmd) {
		case 'monitorPointCurveService':
			HandleCmdPointCurve($data, $emsClient, $dataItemCode, $yesterday);
			break;
		case 'monitorDailyFreezService':
			HandleCmdDailyFreez($data, $emsClient, $dataItemCode, $yesterday);
			break;
		case 'monitorMonFreezService':
			HandleCmdMonFreez($data, $emsClient, $dataItemCode, $lastMonth);
			break;
	}
}