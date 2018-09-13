<?php 
session_start();
include 'connection.php';
var_dump($_SESSION['std-username']);
$username = $_SESSION['std-username'];
$password = $_SESSION['std-password'];

class Student_dashboard extends Connection{
	 super.dbConnection();
	public function getResult($username)
	{
		$sql ="SELECT usn FROM student WHERE username = '?'";
		var_dump($sql);
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$result = $stmt->get_data();
		var_dump($result);
	}
}
$obj = new Student_dashboard($conn);
$obj->getResult($username);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Library Management | Dashboard</title>
 	<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
 	<header>
		<div class="header">
			<h3 id="app_name_logo">Library Management System</h3>
			<div class="menu">
			<ul id="menu">
				<li><a href="issue_book.php" style="background-color:darkcyan"><?php echo ucFirst($_SESSION['std-username']); ?></a></li>
				<li><a href="student_profile.php">Profile</a></li>
				<li><a href="books_list.php">Book list</a></li>
				<li><a href="logout.php">Logout ?</a></li>

			</ul>
		</div>
		</div>
		
	</header>
 	<div class="container">
		<div class="issue-books">
			<table border="1" id="issue-book">
				<tr>
					<th>BOOK ID</th>
					<th>BOOK NAME</th>
					<th>AUTHOR NAME</th>
					<th>ISSUE DATE</th>
					<th>RETURN DATE</th>
				</tr>
				<?php 
					$sql = "SELECT * FROM book_issue where usn = ''"
				 ?>
			</table>
		</div> 	
	

 	</div>
 </body>
 </html>