<?php
require_once 'include/dbConnect.php';
require_once 'repository/customers.php';
require_once 'classes/functions.php';
require_once 'classes/responseFactory.php';

$format = $_GET['format'];
$showhtml = ($_GET['showhtml'] === 'true' ? true : false ) ;
if(!checkResponseformat($format)){
	$format = 'array';
}
$customerObj = new Customers($conn);
if($showhtml){
	echo '<a href="index.php">HOME</a>';
	echo '<h1>REST API CRUD OPERATIONS - GET REQUEST EXAMPLE</h1>';
	echo "<h1>Showing Results</h1>";
}
	
$customersArr = $customerObj->findAll();
$res = responseFactory::build($format,$customersArr);
if($showhtml){
	echo '<pre>';print_r($res->getResponse());
}else{
	if($format == 'array'){
		print_r($res->getResponse());
	}elseif($format == 'json'){
		header('Content-Type: application/json');
		echo $res->getResponse();
	}
	
}
