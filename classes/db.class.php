<?php

include ($_SERVER['DOCUMENT_ROOT'].'/demo/conf/conf.php');

class Database{
	public $connect;
	function __construct(){
		$this->connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->connect->connect_error) {
			trigger_error('Database connection failed: '.$this->connect->connect_error, E_USER_ERROR);
		}
	}
	function getConnected() {
		return $this->connect;
	}
	
	function close(){
		$this->connect->close();
		//echo "Close is also called";
	}
}