<?php
/*
 * Singleton Pattern example
 * The singleton pattern is useful when we need to make sure
 * we only have a single instance of a class for the entire 
 * request lifecycle in a web application.
 */
echo "<h1>Singleton Pattern Example </h1>";

class dbConnect{
	private $dbName = null, $dhHost = null, $dbPass = null, $dbUser = null;
	
	private static $instance = null;
	
	private function __construct($dbDetails = array()){
		$this->dbName = $dbDetails['dbName'];
		$this->dbHost = $dbDetails['dbHost'];
		$this->dbPass = $dbDetails['dbPass'];
		$this->dbUser = $dbDetails['dbUser'];
		
		$this->dbh = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName,$this->dbUser,$this->dbPass);
	}
	
	public static function connect($dbDetails = array()){
		if(self::$instance == null){
			self::$instance = new dbConnect($dbDetails);
		}
		
		return self::$instance;
	}
	
	
}

$dbDetails = array(
	'dbHost'=>'localhost',
	'dbName'=>'mysql',
	'dbUser'=>'root',
	'dbPass'=>''
);

echo '<h1>Creating Object 1</h1>';
$obj1 = dbConnect::connect($dbDetails);
echo '<pre>';var_dump($obj1);
echo '<h1>Creating Object 2</h1>';
$obj2 = dbConnect::connect($dbDetails);
echo '<pre>';var_dump($obj1);


