<!DOCTYPE html>
<?
try{
		$firstPHPDatabase = new SQLite3('reviewsDB.php');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}

	$table = "myTable";

	$field1="name";
	$field2="content";
	$field3="rating";
	$field4="comment";

	$username = $_POST['username'];
	$serializedContent=serialize($content);
	$rating=$_POST['rating'];
	$comments=$_POST['commentSection'];

	$cmd = "CREATE TABLE IF NOT EXISTS " . $table . " ( " . $field1 . " TEXT, " . $field2 . " TEXT, " . $field3 . " REAL," . $field4 . " TEXT);" ;
	
	$firstPHPDatabase->query($cmd);

	$cmd = "INSERT INTO $table ('$field1', '$field2', '$field3', '$field4') VALUES ('$username', '$serializedContent', '$rating', '$comments');"; 
	
	$firstPHPDatabase->query($cmd); 
		
    $firstPHPDatabase->close();	
 
?>

<section id="reviews">
	<?
$firstPHPDatabase = new SQLite3('reviewsDB.php');
$res = $firstPHPDatabase->query("SELECT * FROM myTable WHERE content='$serializedContent'");

// echo "<b>" . $username . "</b> gave this book " . $rating . " stars.<br/>";

	while($record = $res->fetchArray()){
 	  	echo "<p>". $record['name'] .' gave this '. $record['rating'].' stars.' . '</p>'; 
 	  	echo "<p> Review Comments: " . $record['comment']. '</p><hr/>';
 	  			
 	}
	

	$firstPHPDatabase->close();

?>