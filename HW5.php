#!/usr/local/bin/php
<!DOCTYPE html>
<?php

    try{
		$firstPHPDatabase = new SQLite3('commentsectiondb.php');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}
	
	$table = "firstTable";
	
	$field1 = "name"; //text
	$field2 = "bookName"; //text
	$field3 = "rating"; //real
	$field4 = "description"; //text
	$field5 = "comment"; //text
	
	$book=$_POST['bookname'];
	$rating = $_POST['rating'];
	$checkbox= implode(',',$_POST['describe']);
	// $checkbox=$_POST['describe[]'];
	// if (count($checkbox)===0){
	// 	$checked=""; 
	// }else{
	// 	$checked=implode(',', $checkbox);
	// }
	$username = $_POST['username']; 
	$content = $_POST['commentSection'];

	$cmd = "CREATE TABLE IF NOT EXISTS " . $table . " ( " . $field1 . " TEXT, " . $field2 . " TEXT, " . $field3 . " REAL," . $field4 . " TEXT," . $field5 . " TEXT);" ;
	
	$firstPHPDatabase->query($cmd);

	$cmd = "INSERT INTO $table ('$field1', '$field2', '$field3', '$field4', '$field5') VALUES ('$username', '$book', '$rating', '$checkbox', '$content');"; 
	
	$firstPHPDatabase->query($cmd); 
		
    $firstPHPDatabase->close();	


?>


<html>
<head>
  <meta charset="utf-8" />
  <title>Book Reviews</title>


<?php
if($_POST){
	$name = $_POST['user']; 
	$content = $_POST['commentSection'];
	// echo "Thank you for submitting, " . $name; 

}
?> 

</head>
<body>

<div id="thanks"> 
<p>Thank you for submitting, <b><?php echo $username;?></b>!</p>
<p>Here are the reviews for <?php echo $book;?>.</p>
</div>

<fieldset style = "border: 2px solid blue">
<?
$firstPHPDatabase = new SQLite3('commentsectiondb.php');
$res = $firstPHPDatabase->query("SELECT * FROM firstTable WHERE bookName='$book'");

// echo "<b>" . $username . "</b> gave this book " . $rating . " stars.<br/>";

	while($record = $res->fetchArray()){
 	  	echo "<p>". $record['name'] .' gave this book '. $record['rating'].' stars.' . '</p>'; 
 	  	echo "<p> Described as: " .$record['description'].'</p>';
 	  	echo "<p> Review Comments: " . $record['comment']. '</p><hr/>';
 	  			// <strong>Review for ".$record['bookName'].' by '.$record['name'].":</strong>
 	  		// 	<span>".$record['comment']."</span>
 	  		// </p>
 	  		// <hr/>";	  
 	}
	
// 	while($res->fetchArray()) ; // reset it
	
// 	echo "<table>
// 	      <tr>
// 		    <th>Name</th> <th>Rating</th> <th>Description</th><th>Comment</th>
// 		  </tr>";
		  
// 	while($record = $res->fetchArray())
// 	{
// 		echo "<tr><td>", $record['name'], "</td><td>", $record['rating'], "</td><td>", $record['description'], "</td></tr>",$record['comment'], "</td></tr>";
// 	}
	
// 	echo "</table>";
		
	$firstPHPDatabase->close();

 ?>

</fieldset>


</body>
<html>



