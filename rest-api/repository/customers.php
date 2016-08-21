<?php
require_once 'repositoryInterface.php';

class Customers implements repositoryInterface {
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	public function findAll(){
		$customers = array();
		
		$query = "SELECT id,firstname,lastname,email,created from customers where id > 0;";
		$result = mysqli_query($this->conn,$query);
		if(mysqli_num_rows($result) > 0){
			while($record = mysqli_fetch_assoc($result)){
				array_push($customers,$record);
			}
		}
		
		return $customers;
	}		
}

