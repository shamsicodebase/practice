<?php
require_once 'responseInterface.php';

class resArray implements responseInterface{
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	
	public function getResponse(){
		return $this->data;
	}
}