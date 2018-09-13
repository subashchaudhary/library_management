<?php 
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){

	header("location:login.php");
}

 include 'connection.php';
$usn = "";
$sql= "select * from student";

$result = $conn->query($sql);
$rows = $result->fetch_assoc();
 
// echo "usn : " .$rows['usn'] ."<br/>";
// echo "name : " .$rows['student_name']."<br/>" ;
// echo "address : " .$rows['address']."<br/>" ;
// echo "branch : " .$rows['branch']."<br/>" ;
// echo "section : " .$rows['section']."<br/>" ;

//new student entry
if(isset($_POST['new-student-entry'])){

	header("location:new_std_insert.php");

}

//new book entry 
if(isset($_POST['new-book-entry'])){

	header("location:new_book_entry.php");

}


 ?>
 
 <!-- HTML -->
<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>book issue</title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
	<header>
		<div class="header">
			<h3 id="app_name_logo">Library Management System</h3>
			<div class="menu">
			<ul id="menu">
				<li><a href="issue_book.php">Issue Book</a></li>
				<li><a href="students_list.php">Student list</a></li>
				<li><a href="books_list.php">Book list</a></li>
				<li><a href="logout.php">Logout ?</a></li>

			</ul>
		</div>
		</div>
		
	</header>

	<div class="container">
		 <!-- New Entry Stuent form -->
		<div class="new-student-form">
			<h2 id="student-entry-heading">
				New Student Record :
			</h2>
		 <form action="new_std_insert.php" method="POST">
		 	<label for=""><p id="label-left">USN:</p></label>
		 	<input type="text" name="usn"><br/>
		 	<label for=""><p id="label-left">FULL NAME:</p></label>
		 	<input type="text" name="name"><br/>
		 	<label for=""><p id="label-left">ADDRESS:</p></label>
		 	<input type="text" name="address"><br/>
		 	<label for=""><p id="label-left">BRANCH:</p></label>
		 	<input type="text" name="branch"><br/>
		 	<label for=""><p id="label-left">SECTION:</p></label>
		 	<input type="text" name="section"><br/>
		 	<label for=""><p id="label-left">PHONE NO:</p></label>
		 	<input type="text" name="phone"><br/><br/>
		 	<input type="submit" name="new-student-entry">
		 	 
		 </form>
		 </div>
<!-- New Book Entry -->
		 <div class="new-book-form">
		 	<h2 id="student-entry-heading">
				New Book Entry :
			</h2>
		 <form action="new_book_entry.php" method="POST">
		 	<label for=""><p id="label-left">BOOK ID:</p></label>
		 	<input type="text" name="book-id"><br/>
		 	<label for=""><p id="label-left">BOOK NAME:</p></label>
		 	<input type="text" name="book-name"><br/>
		 	<label for=""><p id="label-left">AUTHOR:</label></p>
		 	<input type="text" name="author"><br/>
		 	<label for=""><p id="label-left">PRICE:</label></p>
		 	<input type="text" name="price"><br/><br/>	 
		 	<input type="submit" name="new-book-entry">
		 	 
		 </form>
		 </div>
		
	</div>
 
<!-- <footer>
	<p id="copyright">&copy copyright @library management </p>

</footer> -->

</body>
</html>