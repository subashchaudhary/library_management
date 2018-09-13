<?php 
include 'connection.php';

$student_name ="";
$student_usn = "";
$book_name = "";
$issue_date = "";
$return_date ="";
$extra_date ="";

$issue_date = date('y-m-d');
$return_date = date('y-m-d', strtotime($issue_date . '+ 10 days'));


session_start();

if(isset($_GET['book_name'])){
	$_SESSION['book_name'] = $_GET['book_name'];
	$book_name = $_SESSION['book_name'];
 }

 ?>



<!-- HTML  -->
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
			<h3 id="app_name">Library Management</h3>
		</div>
	</header>
	<br/><br/>
	<div class="container">
	<form action="issue_book_page.php" method="POST">

 		<label for="" id="search_label">Enter usn : </label>
 		<input type="text" name="usn">
		<input type="submit" name="search_usn">

 	</form>
	<?php 

	if(isset($_POST['search_usn'])){
		$student_usn = $_POST['usn'];
		$sql = "select * from student where usn = '$student_usn'";
		// var_dump($sql);
		$result = $conn->query($sql);
		$total_rec = $result->num_rows;

		$row = $result->fetch_assoc();
	    $student_name = $row['student_name'];

		if($total_rec > 0)
		{
			echo "<p id='font-big' style='color:green'>Boook issue successfully..!!!</p>";
			$sql = "insert into book_issue(usn,student_name,book_name,issue_date,return_date)
 					values('$student_usn','$student_name','$book_name','$issue_date','$return_date')";
    		 
    		 $conn->query($sql);

    		 $sql2 = "select * from book_issue where usn = '$student_usn'";
    		 $result2  = $conn->query($sql2);
    		 $rows = $result2->fetch_assoc();
    		 
    		 echo "<li>{$rows['usn']}</li>";
    		 echo "<li>{$row['student_name']}";
    		 echo "<li>{$rows['book_name']}";
    		 echo "<li>{$rows['issue_date']}";
    		 echo "<li>{$rows['return_date']}";
		}
		else
			echo "<p id='font-big' style='color:red'>Sorry USN not found..!!!</p>";
	}
	 ?>
	</div>
 </body>
 </html>