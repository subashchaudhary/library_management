<?php 
include 'connection.php';
include 'validation.php';
$username = "";
$password = "";
$nameErr = "";
$passErr = "";

if(isset($_POST['student-signup'])){
	$obj = new validation();
	$username = $obj->validateData($_POST["username"]);
	$password = $obj->validateData($_POST["password"]);
	
	if(empty($username))
		$nameErr .= "Select a username";
	else if($obj->nameVal($username))
		$nameErr .= "Only alphabets and underscore whilespace is  allowed";
	else if(empty($password))
		$passErr .= "Select a password";
	else if($obj->passVal($password))
		$passErr .= "<p id='err-msg' style='color:red'>Password should be atleat 8 character";
	else
	{
		$sql = "INSERT INTO student_account(username,password) values('$username','$password')";
		if($conn->query($sql))
		{
			echo "Sucessfuly created";
			// header("location:student_login.php");

		}
		else{
			 $err = "<p id='err-msg'> Failed </p>";
		}
	}
}

?>

<!-- html -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>library management | sign_up</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="header">
			<h3 id="app_name">Library Management System</h3>
		</div>
	</header>
	<div class="container">
		<div class="student-login-form">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="student-login-form" method="POST">
				<label for="username">USERNAME:</label>
				<br/>
				<br/>
				<input type="text" name="username" id="username" value="<?php echo $username ?>" required/>
				<br/>
				<br/>
				<label for="password">PASSWORD:</label>
				<br/>
				<br/>
				<input type="password" name="password" id="password" value="<?php echo $password; ?>" required/>
				<br/><br/>
				<input type="submit" name="student-signup" value="Register">
			</form>
		</div>

		 <?php
		  echo $nameErr;
		  echo $passErr;
		  ?>
	</div>
</body>
</html>