<?php
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){

	header("location:login.php");
}
include 'connection.php';
$search_key = "";
$book_id = "";

// if(isset($_POST['search_btn']))
// {
// 	$search_key = $_POST["search_key"];
	

	$sql = "select * from books";
	$result = $conn->query($sql);
	 
	$total_rec = $result->num_rows;
	 
	 
		

		
	 
	// if($usn == null)
	// 	echo "no such record";
	// else
	// 	echo $usn;
// }

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>All books list</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<button><a href="new_book_entry.php">Insert new insert</a></button>
 	 <br/>
 	 <br/>
	 
 <table border="1" id="books_list">
 	 <tr>
 	 	<th>Book id</th>
 	 	<th>Book Name</th>
		<th>Author</th>
		<th>Total</th>
		<th>Price</th>

 	 </tr>
 	
 	 	<?php  
 	 		while ($row = $result->fetch_assoc()) {
 	 			# code...
 	 		echo "<tr>";
 	 		echo "<td>{$row['book_id']}</td>";
 	 		echo "<td>{$row['book_name']}</td>";
 	 		echo "<td>{$row['author']}</td>";
 	 		echo "<td>{$row['no_of_books']}</td>";
 	 		echo "<td>{$row['price']}</td>";
 	 		echo "</tr>";
 	 		}
 	 	?>

 	
 </table>
</body>
</html>