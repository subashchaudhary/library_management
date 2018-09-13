<?php 
include 'connection.php';
$err = "";

if(isset($_POST['student-login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	 
	echo "<br/>";
	$sql = "SELECT * FROM student_account where username = '$username' AND password = '$password'";
	$result = $conn->query($sql);
	$row = $result ->num_rows;
	$data = $result -> fetch_assoc();
	 
	echo "<br/>";
	if($row){
		// echo "sucessfully login";
		session_start();
		$_SESSION['std-username'] = $data['username'];
		$_SESSION['std-password'] = $data['password'];
		header("location:student_dashboard.php");
	}

	else
		$err = "<p id='err-msg' style='color:red'>login failed";
}

?>

<!-- html page -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Library management system</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="student-login-form">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="student-login-form" method="POST">
				<label for="username">USERNAME:</label>
				<br/>
				<input type="text" name="username" id="username">
				<br>
				<label for="password">PASSWORD:</label>
				<br/>
				<input type="text" name="password" id="password">
				<br/>
				<input type="submit" name="student-login" value="login">
			</form>
		</div>

		<?php echo $err; ?>
	</div>
</body>
</html>