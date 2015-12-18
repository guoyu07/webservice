<?php

function proc_电量($row) {
	return $row['POSITIVE_ACTIVE_POWER_TOTAL'];
}

function proc_负荷($row) {
	return $row['ACTIVE_POWER_TOTAL'];
}

function proc_电压($row) {
	return $row['PHASE_VOLTAGE_A'] + $row['PHASE_VOLTAGE_B'] + $row['PHASE_VOLTAGE_C'];
}

function proc_电流($row) {
	return $row['PHASE_CURRENT_A'] + $row['PHASE_CURRENT_B'] + $row['PHASE_CURRENT_C'];
}

function proc_功能率因数($row) {
	return $row['POWER_FACTOR_TOTAL'];
}

function proc_谐波电压($row) {
	return $row['HARMONIC_VOLTAGE_A'] + $row['HARMONIC_VOLTAGE_B'] + $row['HARMONIC_VOLTAGE_C'];
}

function proc_谐波电流($row) {
	return $row['HARMONIC_CURRENT_A'] + $row['HARMONIC_CURRENT_B'] + $row['HARMONIC_CURRENT_C'];
}

function proc_A谐波电压含有率($row) {
	return $row['HARMONIC_VOLTAGE_A_TOTAL'];
}

function proc_B谐波电压含有率($row) {
	return $row['HARMONIC_VOLTAGE_B_TOTAL'];
}

function proc_C谐波电压含有率($row) {
	return $row['HARMONIC_VOLTAGE_C_TOTAL'];
}

function proc_A谐波电流含有率($row) {
	return $row['HARMONIC_CURRENT_A_TOTAL'];
}

function proc_B谐波电流含有率($row) {
	return $row['HARMONIC_CURRENT_B_TOTAL'];
}

function proc_C谐波电流含有率($row) {
	return $row['HARMONIC_CURRENT_C_TOTAL'];
}