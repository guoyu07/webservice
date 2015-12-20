<?php

// 电量
function proc_9010($row) { 
	return $row['POSITIVE_ACTIVE_POWER_TOTAL'];
}

// 负荷
function proc_b630($row) {
	return $row['ACTIVE_POWER_TOTAL'];
}

// A电压
function proc_b611($row) {
	return $row['PHASE_VOLTAGE_A'];
}

// B电压
function proc_b612($row) {
	return $row['PHASE_VOLTAGE_B']; 
}

// C电压
function proc_b613($row) {
	return $row['PHASE_VOLTAGE_C'];
}

// A电流
function proc_b621($row) {
	return $row['PHASE_CURRENT_A'];
}

// B电流
function proc_b622($row) {
	return $row['PHASE_CURRENT_B'];
}

// C电流
function proc_b623($row) {
	return $row['PHASE_CURRENT_C'];
}

// 总功率因数
function proc_b650($row) {
	return $row['POWER_FACTOR_TOTAL'];
}

