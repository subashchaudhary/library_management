<?php 
include 'connection.php';



$total_rec = "";
$book_key = "";
$msg = "";

    
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
			<h3 id="app_name">Library Management System</h3>
		</div>
	</header>
	<br/><br/>
	<!-- section -->
	<div class="container">
	<?php 

		 if(isset($_POST["search_book"])){

		 	$book_key = $_POST["search_key"];

		 	$sql = "select book_id,book_name,no_of_books from books where book_name ='$book_key'";
		 	// var_dump($sql);
		 	$result = $conn->query($sql);
		 	// var_dump($result);
		 	$total_rec = $result->num_rows;
		 	$row = $result -> fetch_assoc();
		 	$total_book = $row['no_of_books'];

		 	if($total_rec > 0)
		 	{
		 		$msg .= "<p id='font-big' style='color:green'>Books Available : {$total_book}</p>
		 		      <a href='issue_book_page.php?book_name=$book_key'><button type='' id='search_book'>Issue Now</button></a>";
		 	}
		 	else
		 		$msg .= "<p id='font-big' style='color:red'>Books not Available..!!!</p>";

		 }


	 ?>
 	<form action="issue_book.php" method="POST">
 		<label for="" id="search_label">Which Book Searching for: <input type="text" name="search_key">
		</label>
		<input type="submit" name="search_book" value="search">
		
 	</form>

 	<?php 

 	echo $msg;

 	 ?>
 	</div>
 </body>
 </html>


 <?php 
 
 // class Democlass{
 // 	static $username = "subashs"; 
 // 	function __constructor($name){
	// 	 echo $name;
	//  	}

	// function show(){
	// 	echo "hellow world";
	// }

 // 	function getVal()
 // 	{
 // 		echo Democlass::show();
 // 	}


 // }

 // class Demob extends Democlass{

 // 	function getVal(){
 // 		echo "this is subclass";
 // 	}
 // }
 

 // // $demo = new Democlass();
 // //  var_dump($demo);
 // //  echo $demo->__constructor("SUB");
 // //  echo $demo->getVal();
 // //  var_dump(Democlass::$username);
 //   $demo2 = new Demob();
 //   var_dump($demo2);
 //   $demo2->getVal();

 //  ?>