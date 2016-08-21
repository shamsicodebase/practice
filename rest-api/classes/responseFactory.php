<?php
class responseFactory{
	
	public static function build($type = 'array',$data = array()){
		$className = 'res'.ucfirst($type);
		include($className . '.php');
		if(class_exists($className)){
			return new $className($data);
		}else{
			throw new Exception('Response Type Not Found'); 
		}
	}
}