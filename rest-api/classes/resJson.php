<?php
require_once 'responseInterface.php';

class resJson implements responseInterface{
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	
	public function getResponse(){
		return json_encode($this->data,JSON_PRETTY_PRINT);
	}
}
