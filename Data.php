<?php

require_once 'Config.php';

/**
 * 从数据库读取数据
 * @author liangdong01@baidu.com
 *
 */
class Data {
	private $conn_ = null;
	
	public function __construct() {
		$this->conn_ = mysql_connect(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD);
		mysql_select_db(MYSQL_DATABASE, $this->conn_);	
	}

}