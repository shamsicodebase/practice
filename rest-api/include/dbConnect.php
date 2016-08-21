<?php
require 'config.php';
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);

if($conn == false){
	die('Could not connect to my sql');
}

$mysqlDB = mysqli_select_db($conn,DBNAME);
if(!$mysqlDB){
	$sql = "CREATE DATABASE IF NOT EXISTS ".DBNAME.";";
	if(mysqli_query($conn,$sql)){
		echo "DATABASE created";
	}else{
		echo "Could not execute the query $sql .".mysqli_error($conn);
	}
}