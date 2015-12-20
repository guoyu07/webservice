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
);
// 需要上报EMS的数据项列表
$CODE_LIST = array(
    '9010', 'b630', 'b611', 
    'b612', 'b613', 'b621', 
    'b622', 'b623', 'b650'
);
