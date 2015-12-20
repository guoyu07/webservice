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
	echo 'usage: php main.php monitorPointCurveService|monitorDailyFreezService|monitorMonFreezService [reportDate]' . PHP_EOL;
	return;
}

// 上传类型
$cmd = $argv[1];

// 数据源(MYSQL)
$data = new Data();

// Webservice客户端
$emsClient = new EmsClient();

// 计算上报日期
if ($argc == 2) { // 没有指定上报日期, 默认上报"昨天/上个月"的数据
    $now = time();
    $reportDate = date('Y-m-d', $now - 86400);
    $reportMonth = date('Ym', strtotime(date('Y-m-01', $now)) - 1);
} else { // 指定了日期, 那么上报指定日期的数据
    $t = strtotime($argv[2]);
    $reportDate = date('Y-m-d', $t);
    $reportMonth = date('Ym', $t);
}

// 处理上报
foreach ($CODE_LIST as $dataItemCode) {
	switch ($cmd) {
		case 'monitorPointCurveService':
			HandleCmdPointCurve($data, $emsClient, $dataItemCode, $reportDate);
			break;
		case 'monitorDailyFreezService':
			HandleCmdDailyFreez($data, $emsClient, $dataItemCode, $reportDate);
			break;
		case 'monitorMonFreezService':
			HandleCmdMonFreez($data, $emsClient, $dataItemCode, $reportMonth);
			break;
	}
}
