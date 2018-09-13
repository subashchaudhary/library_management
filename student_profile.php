<?php 
include 'connection.php';
include 'validation.php';
$name = "";
$usn = "";
$phone = "";
$branch = "";
$address = "";
$email = "";
$sem = "";
$section = "";
$gender = "";
$nameErr = "";
$emailErr = "";
$err = "";
$msg = "";

if(isset($_POST['update-info'])){
	$obj = new validation();
	$usn = $_POST['usn'];
	$name = $_POST['name'];
	$branch = $_POST['branch'];
	$section = $_POST['section'];
	$phone = $_POST['phone'];
	$gender = $_POST['gender'];
	$sem = $_POST['semester'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$name = $obj -> validateData($name);
	 

	if(empty($name)){
		$nameErr .= "<p id='err-msg' style='color:red'> Fill this field</p>";
	}
	else if($obj -> nameVal($name)){
		$nameErr .= "<p id='err-msg' style='color:red'> Name should be alphabets </p>";
	}
	else if(empty($usn)){
		$err .=  "<p id='err-msg'>Fill this field</p>";
	}
	else if(empty($phone)){
		$err .= "<p id='err-msg'>Fill this filed</p>";
	}
	else if(empty($email)){
		$emailErr .= "<p id='err-msg'>Fill this filed</p>";
	}
	else if($obj -> emailVal($email))
	{
		$emailErr .= "Invalid email format";
	}
	else
	{
		$sql = "INSERT INTO student values('$usn','$name','$address','$phone','$email','$branch','$section','$gender')";
		var_dump($sql);
		if($conn->query($sql))
			$msg .= "profile updated";
		else
			$msg .= "Erro";
	}
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Library Management | Register</title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<div class="container">
 		<div class="std-info-form">
 			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="stu-info-form" method="POST">
 				<label for="usn">USN:</label>
 				<br/>
 				<input type="text" name="usn" value="<?php echo $usn; ?>" placeholder="">
 				<br/>
 				<label for="name">FULL NAME:</label> <br/>
 				<input type="text" name="name" value="<?php echo $name; ?>" required>
				<br/>
				<label for="addrss">ADDRESS:</label><br/>
				<input type="text" name="address" value="<?php echo $address; ?>"><br/>
				<label for="branch">BRANCH:</label><br/>
				<input type="text" name="branch" value="<?php echo $branch;?>"><br/>
				<label for="branch">SECTION:</label><br/>
				<input type="text" name="section" value="<?php echo $section;?>"><br/>
				<label for="phone">PHONE:</label><br/>
				<input type="phone" name="phone" value="<?php echo $phone; ?>" requrired/><br/>
				<label for="email">EMAIL ID:</label><br/>
				<input type="email" name="email" value="<?php echo $email;?>" requrired/><br/>
				<label for="semester">SEMESTER</label><br/>
				<input type="text" name="semester" value="<?php echo $sem; ?>" ><br/><br/>
				<label for="gender">GENDER:</label>
				<input type="radio" value="male" name="gender" checked="true">
				<input type="radio" value="female" name="gender">
				<input type="submit" value="update" name="update-info" >
 			</form>
 		</div>
 		<?php echo $err; ?>
 		<?php echo $nameErr; ?>
 		<?php echo $emailErr; ?>
 		<?php
 		 	echo $msg; 
 			echo "<a href='student_dashboard.php'>Back</a>";
 		?>
 	</div>
 </body>
 </html>