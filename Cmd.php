<?php

function HandleCmdPointCurve($data, $emsClient, $dataItemCode, $dataTime) {
	$result = $data->pointCurveData($dataItemCode, $dataTime);
	if (!is_array($result) || !count($result)) { // 没有数据不提交
		return;
	}
	$emsClient->monitorPointCurveService($dataItemCode, $dataTime, $result);
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
