<?php
require_once 'include/dbConnect.php';
$query = "CREATE TABLE IF NOT EXISTS customers (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			firstname varchar(100),
			lastname varchar(100),
			email varchar(100) NOT NULL,
			password varchar(255) NOT NULL,
			created datetime NOT NULL,
			PRIMARY KEY (id)
			)";
if(!mysqli_query($conn,$query)){
	echo 'Cannot create table error'.mysqli_error($conn);
}

$query = "CREATE TABLE IF NOT EXISTS departments (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			name varchar(100),
			active boolean,
			PRIMARY KEY (id)
			)";
if(!mysqli_query($conn,$query)){
	echo 'Cannot create table error'.mysqli_error($conn);
}

$query = "CREATE TABLE IF NOT EXISTS customer_department (
			id bigint(20) NOT NULL AUTO_INCREMENT,
			customer_id bigint(20) NOT NULL,
			department_id bigint(20) NOT NULL,
			PRIMARY KEY (id)
			)";
if(!mysqli_query($conn,$query)){
	echo 'Cannot create table error'.mysqli_error($conn);
}

// Creating dummy data
$query = "select id from customers where email like 'test@gmail.com';";
$result = mysqli_query($conn,$query);
if($result->num_rows == 0 ){
	$password = md5('12345678');
	$query = "INSERT INTO customers(firstname,lastname,email,password,created)
			values ('muhammad','umair','test@gmail.com','$password',now());";

	if(!mysqli_query($conn,$query)){
		echo 'Cannot create table error'.mysqli_error($conn);
	}
}

$query = "select id from departments where name like 'developer';";
$result = mysqli_query($conn,$query);
if($result->num_rows == 0 ){
	$query = "INSERT INTO departments(name,active)
			values ('developer',true);";

	if(!mysqli_query($conn,$query)){
		echo 'Cannot create table error'.mysqli_error($conn);
	}
}

$query = "select * from customer_department;";
$result = mysqli_query($conn,$query);
if($result->num_rows == 0 ){
	$query = "INSERT INTO customer_department(customer_id,department_id)
			values (1,1);";

	if(!mysqli_query($conn,$query)){
		echo 'Cannot create table error'.mysqli_error($conn);
	}
}