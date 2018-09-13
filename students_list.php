
<?php 
include 'connection.php';
$search_key = "";
$book_id = "";

// if(isset($_POST['search_btn']))
// {
// 	$search_key = $_POST["search_key"];
	

	$sql = "select * from student";
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
	<button><a href="new_book_entry.php">Insert</a></button>
 	 <br/>
 	 <br/>
 	 
 	 <button><a href="books_list.php">Reload</a></button>
 
 	 <br/>
 	 <br/>
	 
 <table border="1" id="books_list">
 	 <tr>
 	 	<th>USN</th>
 	 	<th>STUDENT NAME</th>
		<th>ADDRESS</th>
		<th>PHONE</th>
		<th>BRACNH</th>
		<th>SECTION</th>		

 	 </tr>
 	
 	 	<?php  
 	 		while ($row = $result->fetch_assoc()) {
 	 			# code...
 	 		echo "<tr>";
 	 		echo "<td>{$row['usn']}</td>";
 	 		echo "<td>{$row['student_name']}</td>";
 	 		echo "<td>{$row['address']}</td>";
 	 		echo "<td>{$row['phone']}</td>";
 	 		echo "<td>{$row['branch']}</td>";
 	 		echo "<td>{$row['section']}</td>";

 	 		echo "</tr>";
 	 		}
 	 	?>

 	
 </table>
</body>
</html>


