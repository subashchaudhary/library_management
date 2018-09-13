<?php 
class Connection{

	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $database = "library_db";
	private $conn;
	private function dbConnection(){
		$conn = new mysqli($host,$user,$pass,$database);
	}
}
?>
