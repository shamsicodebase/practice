<?php
/*
 * Factory Pattern example
 * The purpose of any factory class,
 * is to create and return instances of other classe
 */
echo "<h1>Factory Pattern Example </h1>";

class responseFactory{
	
	public static function build($type = 'array',$data = array()){
		$className = 'res'.ucfirst($type);
		
		if(class_exists($className)){
			return new $className($data);
		}else{
			throw new Exception('Response Type Not Found'); 
		}
	}
}

interface responseInterface{
	public function getResponse();
}

class resArray implements responseInterface{
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	
	public function getResponse(){
		return $this->data;
	}
}

class resJson implements responseInterface{
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	
	public function getResponse(){
		return json_encode($this->data);
	}
}

class resXml implements responseInterface{
	private $data;
	public function __construct($data){
		$this->data = $data;
	}
	
	public function getResponse(){
		$xml = new SimpleXMLElement('<root/>');
		array_walk_recursive($this->data, array ($xml, 'addChild'));
		return $xml->asXML();
	}
}

$test_array = array (
  'firstname' => 'Muhammad',
  'lastname' => 'Umair',
  'employment' => array (
    'locality' => '2 years',
  ),
);

echo "<h1>Array Class Object</h1>";
$res = responseFactory::build('array',$test_array);
echo '<pre>';print_r($res->getResponse());

echo "<h1>Json Class Object</h1>";
$res = responseFactory::build('json',$test_array);
echo $res->getResponse();

echo "<h1>Xml Class Object</h1>";
$res = responseFactory::build('xml',$test_array);
echo $res->getResponse();