<?php 
include 'connection.php';
$username = "";
$pass = "";

// if(isset($_POST['submit']))
// {
	  // $username = $_POST['username'];
	  // $password = $_POST['password'];

	// if($conn)
	// 	echo "connection successful";
	// else
	// 	echo "faile";
	$sql = "select * from admin";
	// var_dump($sql);
	$result = $conn->query($sql);
	// var_dump($result);
	$rows = $result->fetch_assoc();

	// var_dump($rows);
	$admin = $rows['username'];
	$pass  = $rows['password']; 
	if($username != $admin && $password != $pass)
	{
		echo "login failed";
	}
	else
	{
		echo "login successful";
		//header("location:login.php");
	}

// }



 ?>		