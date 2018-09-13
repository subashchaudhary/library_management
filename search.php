<?php 
include 'connection.php';
$search_key = "";
$usn = "";
// if(isset($_POST['search_btn']))
// {
// 	$search_key = $_POST["search_key"];

	$sql = "select * from student";
	$result = $conn->query($sql);
	$total_rec = $result->num_rows;
	 
	 
	// 	$row = $result->fetch_assoc();
	// 	echo $row['usn'];
	 
	// if($usn == null)
	// 	echo "no such record";
	// else
	// 	echo $usn;
// }

 ?>