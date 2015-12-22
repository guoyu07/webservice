<?php
/**
 * 全局参数配置
 */

// SOAP认证账号
const SOAP_AUTH_ACCOUNT = '0700069044';
// SOAP认证密码
const SOAP_AUTH_PASSWORD = 'zckj1111';
// SOAP服务地址
const SOAP_WSDL = 'http://dsm.sx.sgcc.com.cn/axis2/services/psmService?wsdl';

// MYSQL地址
const MYSQL_HOST = '10.36.253.127:6184';
// MYSQL数据库账号
const MYSQL_USERNAME = 'uQkITdi6184';
// MYSQL数据库密码
const MYSQL_PASSWORD = 'P1PiDX7eZWdyuWfO1';
// MYSQL数据库名称
const MYSQL_DATABASE = 'demo';

// 企业编号
const CONS_NO = '0700069044';
// 监测点编号
const MS_NO = '0700069044';
// 曲线采样间隔(默认15分钟)
const CURVE_DENSITY = 15;
// 曲线采样数量(15分钟间隔，共96个采样点)
const CURVE_COUNT = 96;
// 数据项 => MYSQL表名的映射
$CODE2TABLE = array(
	'9010' => 'pdsm_2x1x13s', // 电量
	'b630' => 'pdsm_2x1x10s', // 负荷
	'b611' => 'pdsm_2x1x1s',  // A电压
	'b612' => 'pdsm_2x1x1s',  // B电压
    'b613' => 'pdsm_2x1x1s',  // C电压
    'b621' => 'pdsm_2x1x5s',  // A电流
    'b622' => 'pdsm_2x1x5s',  // B电流
    'b623' => 'pdsm_2x1x5s',  // C电流
    'b650' => 'pdsm_2x1x12s', // 总功率因数
    // A谐波电压含有率表
	'7702' => 'pdsm_2x2x1s', 
	'7703' => 'pdsm_2x2x1s',
	'7704' => 'pdsm_2x2x1s',
	'7705' => 'pdsm_2x2x1s',
	'7706' => 'pdsm_2x2x1s',
	'7707' => 'pdsm_2x2x1s',
	'7708' => 'pdsm_2x2x1s',
	'7709' => 'pdsm_2x2x1s',
	'770A' => 'pdsm_2x2x1s',
	'770B' => 'pdsm_2x2x1s',
	'770C' => 'pdsm_2x2x1s',
	'770D' => 'pdsm_2x2x1s',
	'770E' => 'pdsm_2x2x1s',
	'770F' => 'pdsm_2x2x1s',
	'7710' => 'pdsm_2x2x1s',
	'7711' => 'pdsm_2x2x1s',
	'7712' => 'pdsm_2x2x1s',
	'7713' => 'pdsm_2x2x1s',
	// B谐波电压含有率表
    '7802' => 'pdsm_2x2x2s', 
    '7803' => 'pdsm_2x2x2s',
    '7804' => 'pdsm_2x2x2s',
    '7805' => 'pdsm_2x2x2s',
    '7806' => 'pdsm_2x2x2s',
    '7807' => 'pdsm_2x2x2s',
    '7808' => 'pdsm_2x2x2s',
    '7809' => 'pdsm_2x2x2s',
    '780A' => 'pdsm_2x2x2s',
    '780B' => 'pdsm_2x2x2s',
    '780C' => 'pdsm_2x2x2s',
    '780D' => 'pdsm_2x2x2s',
    '780E' => 'pdsm_2x2x2s',
    '780F' => 'pdsm_2x2x2s',
    '7810' => 'pdsm_2x2x2s',
    '7811' => 'pdsm_2x2x2s',
    '7812' => 'pdsm_2x2x2s',
    '7813' => 'pdsm_2x2x2s',
    // C谐波电压含有率表
    '7902' => 'pdsm_2x2x3s', 
    '7903' => 'pdsm_2x2x3s',
    '7904' => 'pdsm_2x2x3s',
    '7905' => 'pdsm_2x2x3s',
    '7906' => 'pdsm_2x2x3s',
    '7907' => 'pdsm_2x2x3s',
    '7908' => 'pdsm_2x2x3s',
    '7909' => 'pdsm_2x2x3s',
    '790A' => 'pdsm_2x2x3s',
    '790B' => 'pdsm_2x2x3s',
    '790C' => 'pdsm_2x2x3s',
    '790D' => 'pdsm_2x2x3s',
    '790E' => 'pdsm_2x2x3s',
    '790F' => 'pdsm_2x2x3s',
    '7910' => 'pdsm_2x2x3s',
    '7911' => 'pdsm_2x2x3s',
    '7912' => 'pdsm_2x2x3s',
    '7913' => 'pdsm_2x2x3s',
	
    // A谐波电压含有率表
    '7A02' => 'pdsm_2x3x1s',  
    '7A03' => 'pdsm_2x3x1s',
    '7A04' => 'pdsm_2x3x1s',
    '7A05' => 'pdsm_2x3x1s',
    '7A06' => 'pdsm_2x3x1s',
    '7A07' => 'pdsm_2x3x1s',
    '7A08' => 'pdsm_2x3x1s',
    '7A09' => 'pdsm_2x3x1s',
    '7A0A' => 'pdsm_2x3x1s',
    '7A0B' => 'pdsm_2x3x1s',
    '7A0C' => 'pdsm_2x3x1s',
    '7A0D' => 'pdsm_2x3x1s',
    '7A0E' => 'pdsm_2x3x1s',
    '7A0F' => 'pdsm_2x3x1s',
    '7A10' => 'pdsm_2x3x1s',
    '7A11' => 'pdsm_2x3x1s',
    '7A12' => 'pdsm_2x3x1s',
    '7A13' => 'pdsm_2x3x1s',
    // B谐波电流含有率
    '7B02' => 'pdsm_2x3x2s', 
    '7B03' => 'pdsm_2x3x2s',
    '7B04' => 'pdsm_2x3x2s',
    '7B05' => 'pdsm_2x3x2s',
    '7B06' => 'pdsm_2x3x2s',
    '7B07' => 'pdsm_2x3x2s',
    '7B08' => 'pdsm_2x3x2s',
    '7B09' => 'pdsm_2x3x2s',
    '7B0A' => 'pdsm_2x3x2s',
    '7B0B' => 'pdsm_2x3x2s',
    '7B0C' => 'pdsm_2x3x2s',
    '7B0D' => 'pdsm_2x3x2s',
    '7B0E' => 'pdsm_2x3x2s',
    '7B0F' => 'pdsm_2x3x2s',
    '7B10' => 'pdsm_2x3x2s',
    '7B11' => 'pdsm_2x3x2s',
    '7B12' => 'pdsm_2x3x2s',
    '7B13' => 'pdsm_2x3x2s',
    // C谐波电流含有率
    '7C02' => 'pdsm_2x3x3s', 
    '7C03' => 'pdsm_2x3x3s',
    '7C04' => 'pdsm_2x3x3s',
    '7C05' => 'pdsm_2x3x3s',
    '7C06' => 'pdsm_2x3x3s',
    '7C07' => 'pdsm_2x3x3s',
    '7C08' => 'pdsm_2x3x3s',
    '7C09' => 'pdsm_2x3x3s',
    '7C0A' => 'pdsm_2x3x3s',
    '7C0B' => 'pdsm_2x3x3s',
    '7C0C' => 'pdsm_2x3x3s',
    '7C0D' => 'pdsm_2x3x3s',
    '7C0E' => 'pdsm_2x3x3s',
    '7C0F' => 'pdsm_2x3x3s',
    '7C10' => 'pdsm_2x3x3s',
    '7C11' => 'pdsm_2x3x3s',
    '7C12' => 'pdsm_2x3x3s',
    '7C13' => 'pdsm_2x3x3s',
    
	// A谐波电压含有量 = A电压 * A谐波电压含有率
	'7102' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
	
	// B谐波电压含有量 = B电压 * B谐波电压含有率	
	
	// C谐波电压含有量 = C电压 * C谐波电压含有率
	
	// A谐波电流含有量 = A电压 * A谐波电流含有率
	
	// B谐波电流含有量 = B电压 * B谐波电流含有率
	
	// C谐波电流含有量 = C电压 * C谐波电流含有率
);
// 需要上报EMS的数据项列表
$CODE_LIST = array(
    '9010', 'b630', 'b611', 
    'b612', 'b613', 'b621', 
    'b622', 'b623', 'b650',
	
	// 谐波电压含有率相关
	'7702','7703','7704',
	'7705','7706','7707',
	'7708','7709','770A',
	'770B','770C','770D',
	'770E','770F','7710',
	'7711','7712','7713',
	'7802','7803','7804',
	'7805','7806','7807',
	'7808','7809','780A',
	'780B','780C','780D',
	'780E','780F','7810',
	'7811','7812','7813',
	'7902','7903','7904',
	'7905','7906','7907',
	'7908','7909','790A',
	'790B','790C','790D',
	'790E','790F','7910',
	'7911','7912','7913',
		
	// 谐波电流含有率相关
	'7A02','7A03','7A04',
	'7A05','7A06','7A07',
	'7A08','7A09','7A0A',
	'7A0B','7A0C','7A0D',
	'7A0E','7A0F','7A10',
	'7A11','7A12','7A13',
	'7B02','7B03','7B04',
	'7B05','7B06','7B07',
	'7B08','7B09','7B0A',
	'7B0B','7B0C','7B0D',
	'7B0E','7B0F','7B10',
	'7B11','7B12','7B13',
	'7C02','7C03','7C04',
	'7C05','7C06','7C07',
	'7C08','7C09','7C0A',
	'7C0B','7C0C','7C0D',
	'7C0E','7C0F','7C10',
	'7C11','7C12','7C13',
	
	// 谐波电压含有率相关
	'7102',
	
	// 谐波电流含有率相关
);
