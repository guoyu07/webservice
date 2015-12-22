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
    '7103' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'), 
    '7104' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7105' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7106' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7107' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7108' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7109' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710A' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710B' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710C' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710D' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710E' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '710F' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7110' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7111' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7112' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
    '7113' => array('pdsm_2x1x1s' , 'pdsm_2x2x1s'),
		
	
	// B谐波电压含有量 = B电压 * B谐波电压含有率	
    '7202' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'), 
    '7203' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7204' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7205' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7206' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7207' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7208' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7209' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720A' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720B' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720C' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720D' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720E' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '720F' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7210' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7211' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7212' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),
    '7213' => array('pdsm_2x1x1s', 'pdsm_2x2x2s'),

	// C谐波电压含有量 = C电压 * C谐波电压含有率
    '7302' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'), 
    '7303' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7304' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7305' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7306' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7307' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7308' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7309' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730A' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730B' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730C' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730D' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730E' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '730F' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7310' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7311' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7312' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),
    '7313' => array('pdsm_2x1x1s', 'pdsm_2x2x3s'),

	// A谐波电流含有量 = A电流 * A谐波电流含有率
    '7402' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'), 
    '7403' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7404' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7405' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7406' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7407' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7408' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7409' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740A' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740B' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740C' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740D' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740E' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '740F' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7410' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7411' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7412' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),
    '7413' => array('pdsm_2x1x5s', 'pdsm_2x3x1s'),

	// B谐波电流含有量 = B电流 * B谐波电流含有率
    '7502' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'), 
    '7503' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7504' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7505' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7506' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7507' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7508' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7509' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750A' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750B' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750C' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750D' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750E' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '750F' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7510' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7511' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7512' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),
    '7513' => array('pdsm_2x1x5s', 'pdsm_2x3x2s'),

	// C谐波电流含有量 = C电流 * C谐波电流含有率
    '7602' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'), 
    '7603' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7604' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7605' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7606' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7607' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7608' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7609' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760A' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760B' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760C' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760D' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760E' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '760F' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7610' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7611' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7612' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),
    '7613' => array('pdsm_2x1x5s', 'pdsm_2x3x3s'),

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
	'7102','7103','7104',
	'7105','7106','7107',
	'7108','7109','710A',
	'710B','710C','710D',
	'710E','710F','7110',
	'7111','7112','7113',
	'7202','7203','7204',
	'7205','7206','7207',
	'7208','7209','720A',
	'720B','720C','720D',
	'720E','720F','7210',
	'7211','7212','7213',
	'7302','7303','7304',
	'7305','7306','7307',
	'7308','7309','730A',
	'730B','730C','730D',
	'730E','730F','7310',
	'7311','7312','7313',
	
	// 谐波电流含有率相关
	'7402','7403','7404',
	'7405','7406','7407',
	'7408','7409','740A',
	'740B','740C','740D',
	'740E','740F','7410',
	'7411','7412','7413',
	'7502','7503','7504',
	'7505','7506','7507',
	'7508','7509','750A',
	'750B','750C','750D',
	'750E','750F','7510',
	'7511','7512','7513',
	'7602','7603','7604',
	'7605','7606','7607',
	'7608','7609','760A',
	'760B','760C','760D',
	'760E','760F','7610',
	'7611','7612','7613',
);
