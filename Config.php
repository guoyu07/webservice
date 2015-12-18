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
	'电量' => 'pdsm_2x1x13s',
	'负荷' => 'pdsm_2x1x10s',
	'电压' => 'pdsm_2x1x1s',
	'电流' => 'pdsm_2x1x5s', 
	'功能率因数' => 'pdsm_2x1x12s',
	'谐波电压' => 'pdsm_2x1x2s', 
	'谐波电流' => 'pdsm_2x1x6s',
	'A谐波电压含有率' => 'pdsm_2x2x1s',
	'B谐波电压含有率' => 'pdsm_2x2x2s',
	'C谐波电压含有率' => 'pdsm_2x2x3s',
	'A谐波电流含有率' => 'pdsm_2x3x1s',
	'B谐波电流含有率' => 'pdsm_2x3x2s',
	'C谐波电流含有率' => 'pdsm_2x3x3s',
);
// 需要上报EMS的数据项列表
$CODE_LIST = array('电压');