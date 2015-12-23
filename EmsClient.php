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
       // try {
            $this->soapClient_ = new SoapClient(null, array(
            	'uri' => SOAP_URI,
            	'location' => SOAP_LOCATION,
            	'soap_version' => SOAP_1_1	
            ));
     //   } catch (Exception $e) {
      //  }
	}
	
	/**
	 * 3.1.1.监测点曲线数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValues
	 * @return
	 */
	public function monitorPointCurveService($dataItemCode, $dataTime, $dataValues) {
        if (empty($this->soapClient_)) {
            return false;
        }

        // 时间格式YYYYMMDD
        $dataTime = date('Ymd', strtotime($dataTime));

        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();

        $xmlWriter->startElement('data');
        
        // 企业编号
        $xmlWriter->startElement('CONS_NO');
        $xmlWriter->text(CONS_NO);
        $xmlWriter->endElement();
        
        // 监测点编号
        $xmlWriter->startElement('MS_NO');
        $xmlWriter->text(MS_NO);
        $xmlWriter->endElement();
        
        // 数据项代码
        $xmlWriter->startElement('DATA_ITEM_CODE');
        $xmlWriter->text($dataItemCode);
        $xmlWriter->endElement();

        // 数据日期
        $xmlWriter->startElement('DATA_TIME');
        $xmlWriter->text($dataTime);
        $xmlWriter->endElement();
        
        // 采集周期
        $xmlWriter->startElement('CURVE_DENSITY');
        $xmlWriter->text(CURVE_DENSITY);
        $xmlWriter->endElement();

        // 数据类型
        $xmlWriter->startElement('DATA_TYPE');
        $xmlWriter->text('01');
        $xmlWriter->endElement();

        // 数据值
        for ($i = 0; $i < count($dataValues); ++$i) {
            $xmlWriter->startElement('DATA_VALUE' . strval($i + 1));
            $xmlWriter->text($dataValues[$i]);
            $xmlWriter->endElement();
        }
        
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->soapClient_->monitorPointCurveService($request); 
    }
	
	/**
	 * 3.1.2.监测点日冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $dataTime
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorDailyFreezService($dataItemCode, $dataTime, $dataValue) {
        if (empty($this->soapClient_)) {
            return false;
        }
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();

        $xmlWriter->startElement('data');
        
        // 企业编号
        $xmlWriter->startElement('CONS_NO');
        $xmlWriter->text(CONS_NO);
        $xmlWriter->endElement();
        
        // 监测点编号
        $xmlWriter->startElement('MS_NO');
        $xmlWriter->text(MS_NO);
        $xmlWriter->endElement();
        
        // 数据项代码
        $xmlWriter->startElement('DATA_ITEM_CODE');
        $xmlWriter->text($dataItemCode);
        $xmlWriter->endElement();

        // 数据日期
        $xmlWriter->startElement('DATA_TIME');
        $xmlWriter->text($dataTime);
        $xmlWriter->endElement();
        
        // 日冻结类型
        $xmlWriter->startElement('FREEZE_TYPE');
        $xmlWriter->text('01');
        $xmlWriter->endElement();

        // 数据值
        $xmlWriter->startElement('DATA_VALUE');
        $xmlWriter->text($dataValue);
        $xmlWriter->endElement();
        
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->soapClient_->monitorDailyFreezService($request); 
	}
	
	/**
	 * 3.1.3.监测点月冻结数据
	 * @param unknown $dataItemCode
	 * @param unknown $ym
	 * @param unknown $dataValue
	 * @return
	 */
	public function monitorMonFreezService($dataItemCode, $ym, $dataValue) {
        if (empty($this->soapClient_)) {
            return false;
        }
        $xmlWriter = new XMLWriter();
        $xmlWriter->openMemory();

        $xmlWriter->startElement('data');
        
        // 企业编号
        $xmlWriter->startElement('CONS_NO');
        $xmlWriter->text(CONS_NO);
        $xmlWriter->endElement();
        
        // 监测点编号
        $xmlWriter->startElement('MS_NO');
        $xmlWriter->text(MS_NO);
        $xmlWriter->endElement();
        
        // 数据项代码
        $xmlWriter->startElement('DATA_ITEM_CODE');
        $xmlWriter->text($dataItemCode);
        $xmlWriter->endElement();

        // 数据日期
        $xmlWriter->startElement('YM');
        $xmlWriter->text($ym);
        $xmlWriter->endElement();
        
        // 日冻结类型
        $xmlWriter->startElement('FREEZE_TYPE');
        $xmlWriter->text('01');
        $xmlWriter->endElement();

        // 数据值
        $xmlWriter->startElement('DATA_VALUE');
        $xmlWriter->text($dataValue);
        $xmlWriter->endElement();
        
        $xmlWriter->endElement();

        $request = $xmlWriter->flush();
        $response = $this->soapClient_->monitorMonFreezService($request); 
	}
}
