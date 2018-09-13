<?php

include 'connection.php';
$username = "";
$password = "";
$msg = "";

if(isset($_POST['register'])){
	header("location:admin_signup.php");
}
if(isset($_POST['login']))
{
	  $username = $_POST['username'];
	  $password = $_POST['password'];

	// if($conn)
	// 	echo "connection successful";
	// else
	// 	echo "faile";
	if(empty($username) && empty($password))
	 {
	  	$msg .= "<p id='font-big' style='color:red'>Enter the username and password</p>";
	 }
	else
	{
		$sql = "select * from admin where username = '$username' && password = '$password'";

		$result = $conn->query($sql);
		$total_result = $result->num_rows;
		$row = $result->fetch_assoc();
	 	session_start();
	 	$_SESSION["username"] = $row['username'];
	 	$_SESSION["password"] = $row['password'];
	 
		if($total_result > 0)
		{
			header("location:dashboard.php");
		}
		else
		{
			$msg .= "<p id='font-big' style='color:red'>Invalid username and password</p>";
		}
	}

}

?>


<!-- HTML -->
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>book issue</title>
 	<link rel="stylesheet" href="style.css">
 </head>
 <body>
	<header>
		<div class="header">
			<h3 id="app_name">Library Management System</h3>
		</div>
	</header>

	<div class="container">
		
		<h2 id="welcome-heading">Welcome to Cpanel</h2>
		<div class="login_form">
			<form action="login.php" id="login_form" method="POST">
				<lable id="username">Username :</lable>
				<input type="text" name="username" value="<?php echo $username ?>"> <br/><br/>
				<lable id="username">Password :</lable>
				<input type="text" name="password" value="<?php echo $password ?>"><br/><br/>
				<input type="submit" value="Login" name="login"> &nbsp; &nbsp;
				<input type="submit" value="Register" name="register">

			</form>
		</div>
		<?php echo $msg ?>
	</div>
		
	<div class="body-content">
		
	</div>

<footer>
	<p id="copyright">&copy copyright @library management </p>

</footer>


</body>
</html>