<?php

require_once 'Config.php';

/**
 * 
 * 用于向Webservice提交数据
 * @author liangdong01@baidu.com
 *
 */
class EmsClient {		
	/**
	 * 获取客户端, 会设置一些header
	 * @param unknown $clazz
	 * @param unknown $method
	 * @param unknown $beanId
	 * @return SoapClient
	 */
	private function getSoapClient($clazz, $method, $beanId, $userId = '') {
		$soapClient = new SoapClient(null, array(
				'uri' => SOAP_URI,
				'location' => SOAP_LOCATION,
				'soap_version' => SOAP_1_1
		));
		return $soapClient;
	}

	/**
	 * 发起soap请求
	 * @param unknown $soapClient
	 * @param unknown $clazz
	 * @param unknown $method
	 * @param unknown $beanId
	 * @param string $userId
	 * @return
	 */
	private  function doSoapRequest($soapClient, $request, $clazz, $method, $beanId, $userId = '') {
		var_dump($request);
		return;
		try {
			$response = $soapClient->psmSevice(array(
					'receiveStrXml' => $request, 
					'encryptBytes' => ''
			)); 
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;	
		}
		return $response;
	}
	
	/**
	 * 3.1.1.监测点曲线数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValues
	 * @return
	 */
	public function monitorPointCurveService($dataItemCode, $dataTime, $dataValues) {
		$clazz = 'com.sgcc.psm.psmapi.emsenergy.datamanage.monitorpointcurve.bizc.impl.MonitorPointCurveBizcImpl';
		$method = 'monitorPointCurveService';
		$beanId = 'commonWsService';
		$soapClient = $this->getSoapClient($clazz, $method, $beanId);
        
        // 时间格式YYYYMMDD
        $dataTime = date('Ymd', strtotime($dataTime));

        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        
        $xmlWriter->startElement('Root');
        $xmlWriter->startElement('indexDets');
        foreach ($dataValues as $msNo => $values) {
	        $xmlWriter->startElement('indexDet');
	        
	        // 企业编号
	        $xmlWriter->startElement('consNO');
	        $xmlWriter->text(CONS_NO);
	        $xmlWriter->endElement();
	        
	        // 监测点编号
	        $xmlWriter->startElement('msNO');
	        $xmlWriter->text($msNo);
	        $xmlWriter->endElement();
	        
	        // 数据项代码
	        $xmlWriter->startElement('dataItemCode');
	        $xmlWriter->text($dataItemCode);
	        $xmlWriter->endElement();
	
	        // 数据日期
	        $xmlWriter->startElement('dataDate');
	        $xmlWriter->text($dataTime);
	        $xmlWriter->endElement();
	        
	        // 采集周期
	        $xmlWriter->startElement('curveDensity');
	        $xmlWriter->text(CURVE_DENSITY);
	        $xmlWriter->endElement();
	
	        // 数据类型
	        $xmlWriter->startElement('dataType');
	        $xmlWriter->text('01');
	        $xmlWriter->endElement();
	
	        // 数据值
	        for ($i = 0; $i < count($values); ++$i) {
	            $xmlWriter->startElement('dataValue' . strval($i + 1));
	            $xmlWriter->text($values[$i]);
	            $xmlWriter->endElement();
	        }
	        
	        $xmlWriter->endElement();
        }
        $xmlWriter->endElement();
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->doSoapRequest($soapClient, $request, $clazz, $method, $beanId);
    }
	
	/**
	 * 3.1.2.监测点日冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorDailyFreezService($dataItemCode, $dataTime, $dataValue) {
		$clazz = 'com.sgcc.psm.psmapi.emsenergy.datamanage.monitordailyfreez.bizc.impl.MonitorDailyFreezBizcImpl';
		$method = 'monitorDailyFreezService';
		$beanId = 'commonWsService';
		$soapClient = $this->getSoapClient($clazz, $method, $beanId);
		
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();
        
        $xmlWriter->startElement('Root');
        $xmlWriter->startElement('indexDets');
        foreach ($dataValue as $msNo => $values) {
	        $xmlWriter->startElement('indexDet');
	        
	        // 企业编号
	        $xmlWriter->startElement('consNO');
	        $xmlWriter->text(CONS_NO);
	        $xmlWriter->endElement();
	        
	        // 监测点编号
	        $xmlWriter->startElement('msNO');
	        $xmlWriter->text($msNo);
	        $xmlWriter->endElement();
	        
	        // 数据项代码
	        $xmlWriter->startElement('dataItemCode');
	        $xmlWriter->text($dataItemCode);
	        $xmlWriter->endElement();
	
	        // 数据日期
	        $xmlWriter->startElement('dataTime');
	        $xmlWriter->text($dataTime);
	        $xmlWriter->endElement();
	        
	        // 日冻结类型
	        $xmlWriter->startElement('dataType');
	        $xmlWriter->text('01');
	        $xmlWriter->endElement();
	
	        // 数据值
	        $xmlWriter->startElement('dataValue');
	        $xmlWriter->text($values[0]);
	        $xmlWriter->endElement();
	        
	        $xmlWriter->endElement();
        }
        $xmlWriter->endElement();
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->doSoapRequest($soapClient, $request, $clazz, $method, $beanId);
	}
	
	/**
	 * 3.1.3.监测点月冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $ym
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorMonFreezService($dataItemCode, $ym, $dataValue) {
		$clazz = 'com.sgcc.psm.psmapi.emsenergy.datamanage.monitormonfreez.bizc.impl.MonitorMonFreezBizcImpl';
		$method = 'monitorMonFreezService';
		$beanId = 'commonWsService';
		$soapClient = $this->getSoapClient($clazz, $method, $beanId);
		
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();

        $xmlWriter->startElement('Root');
        $xmlWriter->startElement('indexDets');
        
        foreach ($dataValue as $msNo => $values) {
	        $xmlWriter->startElement('indexDet');
	        
	        // 企业编号
	        $xmlWriter->startElement('consNO');
	        $xmlWriter->text(CONS_NO);
	        $xmlWriter->endElement();
	        
	        // 监测点编号
	        $xmlWriter->startElement('msNo');
	        $xmlWriter->text($msNo);
	        $xmlWriter->endElement();
	        
	        // 数据项代码
	        $xmlWriter->startElement('dataItemCode');
	        $xmlWriter->text($dataItemCode);
	        $xmlWriter->endElement();
	
	        // 数据日期
	        $xmlWriter->startElement('ym');
	        $xmlWriter->text($ym);
	        $xmlWriter->endElement();
	        
	        // 日冻结类型
	        $xmlWriter->startElement('dataType');
	        $xmlWriter->text('01');
	        $xmlWriter->endElement();
	
	        // 数据值
	        $xmlWriter->startElement('dataValue');
	        $xmlWriter->text($values[0]);
	        $xmlWriter->endElement();
	        
	        $xmlWriter->endElement();
        }
        $xmlWriter->endElement();
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->doSoapRequest($soapClient, $request, $clazz, $method, $beanId);
	}
}
