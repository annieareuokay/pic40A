<!-- Exercise: Make a simple database with 2 or 3 records; with fields for name, salary & print the database in a table form.  -->

#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>

<body> 

<p id="stuff"></p>
<br/>

<?php

try{
		$firstPHPDatabase = new SQLite3('php_database.php');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}

    echo "If you are reading this, the connection was successful...";

    $firstPHPDatabase->close();	


    try{
		$firstPHPDatabase = new SQLite3('php_database.php');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}
	
	$table = "firstTable";
	
	$field1 = "name";
	$field2 = "salary";
	
	$name1 = "Alan Turing";
	$salary1 = 50000;
	
	$name2 = "Isaac Newton";
	$salary2 = 98000;

	$cmd = "CREATE TABLE IF NOT EXISTS " . $table . " ( " . $field1 . " TEXT, " . $field2 . " REAL) ";
	
	$firstPHPDatabase->query($cmd);
	
    $cmd = "INSERT INTO " . $table . " ( " . $field1 . ", " . $field2 . ", " . " ) VALUES ( \" " . $name1 . "\", " . $salary1 . ", \" )";
	
	$firstPHPDatabase->query($cmd); 



	echo "back to start: <br/>";
	$record = $res->fetchArray();
	print_r($record);
	echo "<br/>";
	unset($record['name']);
	print_r($record);
	echo "<br/>";
	
	while($res->fetchArray()) ; // reset it
	
	echo "<table>
	      <tr>
		    <th>Name</th> <th>Salary</th>
		  </tr>";
		  
	while($record = $res->fetchArray())
	{
		echo "<tr><td>", $record['name'], "</td><td>", $record['salary'], "</td></tr>";
	}
	
	echo "</table>";

		
    $firstPHPDatabase->close();	


?>




</body>
</html>
