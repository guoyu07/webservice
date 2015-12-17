<?php

require_once 'Config.php';

/**
 * 
 * 用于向Webservice提交数据
 * @author liangdong01@baidu.com
 *
 */
class EmsClient {
	private $soapClient_ = null;
	
	public function __construct() {
		$this->soapClient_ = new SoapClient(SOAP_WSDL, array(
				'login' => SOAP_AUTH_ACCOUNT, 'password' => SOAP_AUTH_PASSWORD
		));
	}
	
	/**
	 * 3.1.1.监测点曲线数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValues
	 * @return
	 */
	public function monitorPointCurveService($dataItemCode, $dataTime, $dataValues) {
		
	}
	
	/**
	 * 3.1.2.监测点日冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorDailyFreezService($dataItemCode, $dataTime, $dataValue) {
		
	}
	
	/**
	 * 3.1.3.监测点月冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $ym
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorMonFreezService($dataItemCode, $ym, $dataValue) {
		
	}
}