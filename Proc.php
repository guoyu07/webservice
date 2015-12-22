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

// 谐波电压含有率
function proc_7702($row) { return $row['HARMONIC_VOLTAGE_A_2']; }
function proc_7703($row) { return $row['HARMONIC_VOLTAGE_A_3']; }
function proc_7704($row) { return $row['HARMONIC_VOLTAGE_A_4']; }
function proc_7705($row) { return $row['HARMONIC_VOLTAGE_A_5']; }
function proc_7706($row) { return $row['HARMONIC_VOLTAGE_A_6']; }
function proc_7707($row) { return $row['HARMONIC_VOLTAGE_A_7']; }
function proc_7708($row) { return $row['HARMONIC_VOLTAGE_A_8']; }
function proc_7709($row) { return $row['HARMONIC_VOLTAGE_A_9']; }
function proc_770A($row) { return $row['HARMONIC_VOLTAGE_A_10']; }
function proc_770B($row) { return $row['HARMONIC_VOLTAGE_A_11']; }
function proc_770C($row) { return $row['HARMONIC_VOLTAGE_A_12']; }
function proc_770D($row) { return $row['HARMONIC_VOLTAGE_A_13']; }
function proc_770E($row) { return $row['HARMONIC_VOLTAGE_A_14']; }
function proc_770F($row) { return $row['HARMONIC_VOLTAGE_A_15']; }
function proc_7710($row) { return $row['HARMONIC_VOLTAGE_A_16']; }
function proc_7711($row) { return $row['HARMONIC_VOLTAGE_A_17']; }
function proc_7712($row) { return $row['HARMONIC_VOLTAGE_A_18']; }
function proc_7713($row) { return $row['HARMONIC_VOLTAGE_A_19']; }
function proc_7802($row) { return $row['HARMONIC_VOLTAGE_B_2']; }
function proc_7803($row) { return $row['HARMONIC_VOLTAGE_B_3']; }
function proc_7804($row) { return $row['HARMONIC_VOLTAGE_B_4']; }
function proc_7805($row) { return $row['HARMONIC_VOLTAGE_B_5']; }
function proc_7806($row) { return $row['HARMONIC_VOLTAGE_B_6']; }
function proc_7807($row) { return $row['HARMONIC_VOLTAGE_B_7']; }
function proc_7808($row) { return $row['HARMONIC_VOLTAGE_B_8']; }
function proc_7809($row) { return $row['HARMONIC_VOLTAGE_B_9']; }
function proc_780A($row) { return $row['HARMONIC_VOLTAGE_B_10']; }
function proc_780B($row) { return $row['HARMONIC_VOLTAGE_B_11']; }
function proc_780C($row) { return $row['HARMONIC_VOLTAGE_B_12']; }
function proc_780D($row) { return $row['HARMONIC_VOLTAGE_B_13']; }
function proc_780E($row) { return $row['HARMONIC_VOLTAGE_B_14']; }
function proc_780F($row) { return $row['HARMONIC_VOLTAGE_B_15']; }
function proc_7810($row) { return $row['HARMONIC_VOLTAGE_B_16']; }
function proc_7811($row) { return $row['HARMONIC_VOLTAGE_B_17']; }
function proc_7812($row) { return $row['HARMONIC_VOLTAGE_B_18']; }
function proc_7813($row) { return $row['HARMONIC_VOLTAGE_B_19']; }
function proc_7902($row) { return $row['HARMONIC_VOLTAGE_C_2']; }
function proc_7903($row) { return $row['HARMONIC_VOLTAGE_C_3']; }
function proc_7904($row) { return $row['HARMONIC_VOLTAGE_C_4']; }
function proc_7905($row) { return $row['HARMONIC_VOLTAGE_C_5']; }
function proc_7906($row) { return $row['HARMONIC_VOLTAGE_C_6']; }
function proc_7907($row) { return $row['HARMONIC_VOLTAGE_C_7']; }
function proc_7908($row) { return $row['HARMONIC_VOLTAGE_C_8']; }
function proc_7909($row) { return $row['HARMONIC_VOLTAGE_C_9']; }
function proc_790A($row) { return $row['HARMONIC_VOLTAGE_C_10']; }
function proc_790B($row) { return $row['HARMONIC_VOLTAGE_C_11']; }
function proc_790C($row) { return $row['HARMONIC_VOLTAGE_C_12']; }
function proc_790D($row) { return $row['HARMONIC_VOLTAGE_C_13']; }
function proc_790E($row) { return $row['HARMONIC_VOLTAGE_C_14']; }
function proc_790F($row) { return $row['HARMONIC_VOLTAGE_C_15']; }
function proc_7910($row) { return $row['HARMONIC_VOLTAGE_C_16']; }
function proc_7911($row) { return $row['HARMONIC_VOLTAGE_C_17']; }
function proc_7912($row) { return $row['HARMONIC_VOLTAGE_C_18']; }
function proc_7913($row) { return $row['HARMONIC_VOLTAGE_C_19']; }

// 谐波电流含有率
function proc_7A02($row) { return $row['HARMONIC_CURRENT_A_2']; }
function proc_7A03($row) { return $row['HARMONIC_CURRENT_A_3']; }
function proc_7A04($row) { return $row['HARMONIC_CURRENT_A_4']; }
function proc_7A05($row) { return $row['HARMONIC_CURRENT_A_5']; }
function proc_7A06($row) { return $row['HARMONIC_CURRENT_A_6']; }
function proc_7A07($row) { return $row['HARMONIC_CURRENT_A_7']; }
function proc_7A08($row) { return $row['HARMONIC_CURRENT_A_8']; }
function proc_7A09($row) { return $row['HARMONIC_CURRENT_A_9']; }
function proc_7A0A($row) { return $row['HARMONIC_CURRENT_A_10']; }
function proc_7A0B($row) { return $row['HARMONIC_CURRENT_A_11']; }
function proc_7A0C($row) { return $row['HARMONIC_CURRENT_A_12']; }
function proc_7A0D($row) { return $row['HARMONIC_CURRENT_A_13']; }
function proc_7A0E($row) { return $row['HARMONIC_CURRENT_A_14']; }
function proc_7A0F($row) { return $row['HARMONIC_CURRENT_A_15']; }
function proc_7A10($row) { return $row['HARMONIC_CURRENT_A_16']; }
function proc_7A11($row) { return $row['HARMONIC_CURRENT_A_17']; }
function proc_7A12($row) { return $row['HARMONIC_CURRENT_A_18']; }
function proc_7A13($row) { return $row['HARMONIC_CURRENT_A_19']; }
function proc_7B02($row) { return $row['HARMONIC_CURRENT_B_2']; }
function proc_7B03($row) { return $row['HARMONIC_CURRENT_B_3']; }
function proc_7B04($row) { return $row['HARMONIC_CURRENT_B_4']; }
function proc_7B05($row) { return $row['HARMONIC_CURRENT_B_5']; }
function proc_7B06($row) { return $row['HARMONIC_CURRENT_B_6']; }
function proc_7B07($row) { return $row['HARMONIC_CURRENT_B_7']; }
function proc_7B08($row) { return $row['HARMONIC_CURRENT_B_8']; }
function proc_7B09($row) { return $row['HARMONIC_CURRENT_B_9']; }
function proc_7B0A($row) { return $row['HARMONIC_CURRENT_B_10']; }
function proc_7B0B($row) { return $row['HARMONIC_CURRENT_B_11']; }
function proc_7B0C($row) { return $row['HARMONIC_CURRENT_B_12']; }
function proc_7B0D($row) { return $row['HARMONIC_CURRENT_B_13']; }
function proc_7B0E($row) { return $row['HARMONIC_CURRENT_B_14']; }
function proc_7B0F($row) { return $row['HARMONIC_CURRENT_B_15']; }
function proc_7B10($row) { return $row['HARMONIC_CURRENT_B_16']; }
function proc_7B11($row) { return $row['HARMONIC_CURRENT_B_17']; }
function proc_7B12($row) { return $row['HARMONIC_CURRENT_B_18']; }
function proc_7B13($row) { return $row['HARMONIC_CURRENT_B_19']; }
function proc_7C02($row) { return $row['HARMONIC_CURRENT_C_2']; }
function proc_7C03($row) { return $row['HARMONIC_CURRENT_C_3']; }
function proc_7C04($row) { return $row['HARMONIC_CURRENT_C_4']; }
function proc_7C05($row) { return $row['HARMONIC_CURRENT_C_5']; }
function proc_7C06($row) { return $row['HARMONIC_CURRENT_C_6']; }
function proc_7C07($row) { return $row['HARMONIC_CURRENT_C_7']; }
function proc_7C08($row) { return $row['HARMONIC_CURRENT_C_8']; }
function proc_7C09($row) { return $row['HARMONIC_CURRENT_C_9']; }
function proc_7C0A($row) { return $row['HARMONIC_CURRENT_C_10']; }
function proc_7C0B($row) { return $row['HARMONIC_CURRENT_C_11']; }
function proc_7C0C($row) { return $row['HARMONIC_CURRENT_C_12']; }
function proc_7C0D($row) { return $row['HARMONIC_CURRENT_C_13']; }
function proc_7C0E($row) { return $row['HARMONIC_CURRENT_C_14']; }
function proc_7C0F($row) { return $row['HARMONIC_CURRENT_C_15']; }
function proc_7C10($row) { return $row['HARMONIC_CURRENT_C_16']; }
function proc_7C11($row) { return $row['HARMONIC_CURRENT_C_17']; }
function proc_7C12($row) { return $row['HARMONIC_CURRENT_C_18']; }
function proc_7C13($row) { return $row['HARMONIC_CURRENT_C_19']; }

// 谐波电压含有量
function proc_7102($left, $right) {
	return $left['PHASE_VOLTAGE_A'] * $right['HARMONIC_VOLTAGE_A_2'];
}
