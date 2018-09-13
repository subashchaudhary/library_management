<?php 
include 'connection.php';
$usn = "";
$name = "";
$address = "";
$branch = "";
$section = "";
$phone = "";
$err="";
//if(isset(_$POST["insert_record"])){
	$usn = $_POST['usn'];
	var_dump($usn);
	$name = $_POST['name'];
	$address = $_POST['address'];
    $phone = $_POST['phone'];
	$branch = $_POST['branch'];
	$section = $_POST['section'];

	//validation
     $nameErr = !(preg_match("/^[a-zA-Z]*$/", "$name"));
	 $phoneError=!(preg_match("/^[0-9]*$/",$phone));

	if(empty($usn))
		$err .= "<p id='error-msg'>USN field is empty </p>";
	else if(empty($name))
		$err .= "<p id='error-msg'>Name field is empty </p>";
	else if(empty($phone))
		$err .= "<p id='error-msg'>phone field is empty </p>";
	else if(empty($branch))
		$err .= "<p id='error-msg'>Branch field is empty </p>";
	else if(empty($section))
		$err .= "<p id='error-msg'>Section field is empty </p>";
	echo $err;
	 
	 // else if($nameErr && $phoneError)
	 // {
	 // 	$nameErr = "<p id='error-msg'>Invalid inputs only alphabets are allowed </p>";
	 // 	$phoneError = "<p id='error-msg'>Invalid inputs only numeric value are allowed </p>";
	 //  }
	// else{

	// 	$sql = "insert into student(usn,student_name,address,phone,branch,section) values('$usn','$name','$address','$phone','$branch','$section')";
	// 	if($conn->query($sql))
	// 		echo "New record inserted";
	//      header("location:dashboard.php");
// }
 ?>