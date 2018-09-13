<?php 
session_start();
// if(!isset($_SESSION('username')) || !isset($_SESSION['password'])){
// 	header("location:login.php");
// } 
  
$username = "";
$password = "";
$nameErr = "";
$passErr = "";
$msg= "";
if(isset($_POST['create-account'])){

	$username = $_POST['username']; 
	$password = $_POST['password'];

// validation
    $nameErr = !(preg_match("/^[a-zA-Z]*$/", $username));
	if(empty($username))
		$nameErr = "<p id='error-msg' style='color:red'> Please choose a username </p>";
	else if (empty($password))
		$passErr = "<p id='error-msg' style='color:red'> Please choose a password </p>";
	else if($nameErr)
		$nameErr = "<p id='error-msg' tyle=color:red'> Only alphabets are allowed </p>";
	
	else
	{
		$msg ="<p id='error-msg' style='color:green'>sucessfully created</p>";

		$sql = "INSERT INTO admin(username,password) VALUES('$username','$password')";

		$conn->query($sql);
	}
}


 ?>

 <!-- html -->
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Library Management System</title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
	<header>
		<div class="header">
			<h3 id="app_name">Library Management System</h3>
			<!-- <div class="menu">
			<ul id="menu">
				<li><a href="home.php">Home</a></li>
				<li><a href="home.php">Student list</a></li>
				<li><a href="home.php">Book list</a></li>
				<li><a href="logout.php">Logout ?</a></li>

			</ul>
		</div> -->
		</div>
		
	</header>
	<h2 id="welcome-heading">Create an Account</h2>
	<div class="container">
		<div class="signup-form">
		 <form action="admin_signup.php" method="POST">
		 	<label for="username"><p id="label-left">USERNAME : </p></label>
		 	<?php  echo $nameErr; ?>
		 	<input type="text" name="username" id="username" value="<?php echo $username ?>"><br/>
		 	<label for="password"><p id="label-left">PASSWORD : </p></label>
		 	<?php  echo $passErr; ?>
		 	<input type="text" name="password" id="password" value="<?php echo $password ?>"><br/></br>
		 	<input type="submit" name="create-account" value="Create Account">
		 </div>	 
		 </form>
		
		<?php echo $msg; ?>
		 
		
	</div>

 	
 </body>
 </html>