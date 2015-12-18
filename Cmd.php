<?php

function HandleCmdPointCurve($data, $emsClient, $dataItemCode, $dataTime) {
	$result = $data->pointCurveData($dataItemCode, $dataTime);
	if (!is_array($result) || !count($result)) { // 没有数据不提交
		return;
	}
	// 保留96个采样点
	$segSize = intval(count($result) / 96);
	if ($segSize < 1) {
		$segSize = 1;
	}
	$dataValues = array();
	$segIndex = 0;
	while (count($dataValues) < 96) {
		$index = $segIndex++ * $segSize;
		if ($index >= count($result)) {
			break;
		}
		$dataValues[] = $result[$index];
	}
	$emsClient->monitorPointCurveService($dataItemCode, $dataTime, $dataValues);
}

function HandleCmdDailyFreez($data, $emsClient, $dataItemCode, $dataTime) {
	$result = $data->dailyFreez($dataItemCode, $dataTime);
	if (!is_array($result) || !count($result)) { // 没有数据不提交
		return;
	}
	$emsClient->monitorDailyFreezService($dataItemCode, $dataTime, $result[0]);
}

function HandleCmdMonFreez($data, $emsClient, $dataItemCode, $ym) {
	$result = $data->monFreez($dataItemCode, $ym);
	if (!is_array($result) || !count($result)) { // 没有数据不提交
		return;
	}
	$emsClient->monitorMonFreezService($dataItemCode, $ym, $result[0]);
}