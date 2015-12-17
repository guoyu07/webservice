<?php

namespace frontend\controllers;

class SoapClientController extends \yii\web\Controller
{
    private function fetchWeather($soapClient, $country, $city) {
        try {
            $result = $soapClient->getWeather(array(
                        'CityName'=> $city,
                        'CountryName'=> $country));
            $xml = $result->GetWeatherResult;
            $xml = str_replace('utf-16', 'utf-8', $xml);
        } catch (\Exception $e) {
            return false;
        }
        return $xml;
    }

    public function actionTestSoapClient()
    {
        //1, webservice服务的地址
        $ws = "http://www.webservicex.net/globalweather.asmx?wsdl";
        
        // 2, 创建soap客户端
        $client = new \SoapClient($ws);
        
        // 3, 获取china的城市列表, 返回值是xml
        /**
          <NewDataSet>
            <Table>
                <Country>China</Country>
                <City>Beijing</City>
            </Table>
            <Table>
                <Country>China</Country>
                <City>Hohhot</City>
            </Table>
          </NewDataSet>
        */
        $result = $client->getCitiesByCountry(['CountryName' => 'china']);
        
        // 4, 解析xml, 发起webservice请求，获取每个城市的天气
        // a) 每个城市发起一次，很慢，一会在考虑优化
        // b) 返回的天气预报也是xml,其实还是要解析一波的,我们就取一个温度好了

        $root = simplexml_load_string($result->GetCitiesByCountryResult);
        ?>
       <style type="text/css">
td{border:solid 1px #add9c0;}
       </style>
       <h1>中国主要城市天气预报</h1>
        <table border="1px" style="width:100%">
            <thead>
                <td>国家</td>
                <td>城市</td>
                <td>温度</td>
            </thead>
        <?php
        foreach ($root->Table as $item) {
            ?>
            <tr>
              <td><?= $item->Country ?> </td> 
              <td><?= $item->City ?> </td>
              <td>
            <?php
            $weather = $this->fetchWeather($client, $item->Country, $item->City);
            try {
                $wroot = simplexml_load_string($weather);
                if (!empty($wroot)) {
                    echo $wroot->Temperature;
                }
            } catch (\Exception $e) {
                // nothing to do 
            }
            ?>
              </td>
            </tr>
            <?php
        }
        echo "</table>";
    }

}
