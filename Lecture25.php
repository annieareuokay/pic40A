#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<p id="appearTop"></p>
<br/>
<? 
 
     /*		
43. Reading and Writing to Flat Files 	  
  43.3 Reading from a File
    - function fgets will collect an entire line of the file
	- function feof returns true when end-of-file is reached; otherwise
	false
	*/
		
	$file = fopen("theFile.txt", "r");
	while(!feof($file)){
		$wholeLine = fgets($file);
		echo $wholeLine, "<br/>";		
	}
	
	fclose($file);
	
	/*
  
   
  43.4 Reading/Writing Practices
  
    - data usually collected from different fields
	- some data stores single value, other data may be array
	- determine unique delimeters between array values and between
	data types for writing to file.
	
	Q: Imagine a web form with a text field (name = txt), a set of check boxes (name = chk[] ), and a set of radio buttons (name = rad).
	After the form is submitted, how could the data be stored so it can 
	be read later?
	   
	
	A strange/subtle point:
    - when reading strings or other variables from a file or even elsewhere!!!, sometimes it helps to trim them to get rid of mysterious whitespaces that appear:	
	
	*/
	
	$var = " hello, world!   ";
	$var = trim($var); 
	var_dump($var);
	
	/*

44. Databases
  44.1 Introduction to Databases
  
  	- data stored in a "table" format
	- the rows are the "records" (think of each row as storing a
	set of data for an object)
	- each column corresponds to a particular "field" (think of the 
	columns as specific items to measure for a record)
	
		Name			Salary		Department
	#1:	Alan Turing		50000		Computer Science
	#2:	Isaac Newton	98000		Physics
	
	- records are #1 and #2
	- the fields are Name, Salary, and Department
	
  44.2 SQL
    - stands for Standard Query Language	
	- free and open source
	- lightweight: takes up little space	
	- installed on many web servers	
	- SQLite3 is one implementation of SQL
	
  44.3 Basic Commants of SQLite3:
  
    - all statements end with a semi-colon except for those to...
	  - call help / get instructions: .help
	  - list databases: .databases
	  - list tables: .tables
	  - quit the program: .quit
	  - show current configurations/settings: .settings
	  - and many others...
	  
	- commands are not case sensitive
	  
	- basic commands:
	  
	  CREATE: create a new table	  
	  ALTER: modify table	  
	  DROP: deletes a table	  
	  INSERT: creates a record	  
	  UPDATE: modifies records	  
	  DELETE: deletes records	  
	  SELECT: retrieves records
	  
  44.4 SQL Data types:
    
    - NULL: for null values
    - INTEGER: for int types
    - REAL: for floating types
    - TEXT: for string types
    - BLOB: could be any data type - will match that of its input

    Fields must have an affinity set: their "preferred" data type

    - TEXT (NULL, TEXT, or BLOB)
    - INTEGER 	
	- REAL (coerces to float)
	- BLOB (has no preferential affinity)

  44.5 Creating and Writing to Database Tables
    
	44.5.1 Creating a Database and Table

      In unix:
        > sqlite3 someFile.db	
	
	  ( will create or open a database called someFile.db )
	
	  In unix:
	    > CREATE TABLE firstTable ( name TEXT, salary REAL, department TEXT
	    );
	  
	  It is an error to create a table again that already exists.
      Can also

      > CREATE TABLE IF NOT EXISTS firstTable ( name TEXT, salary REAL, department TEXT );
	  
	  General: CREATE TABLE IF NOT EXISTS tableName ([comma separated list of: fieldName affinity]);
	  
	44.5.2 Inserting data into a table

      In unix:
	  
	  > INSERT INTO firstTable (name, salary, department) VALUES
	  ('Alan Turing', 50000, 'Computer Science');
	  
	  will insert a record with name of Alan Turing, salary
	  of 50K, and department of Computer Science into the empty table
	  
	  > INSERT INTO firstTable (name, salary) VALUES ('Isaac Newton',
	  98000);
	  
	  will insert to specified fields name of Isaac Newton and salary
	  98000 into the table, leaving the department null
	  
	  General: INSERT INTO tableName ([Comma separated list of field names]) VALUES ([Comma separated list of corresponding values]);
	  
  44.6 Accessing data from and editing a table
	  44.6.1 Retrieving Data
	  
	    Can retrieve the data of an entire table:
	  
	    > SELECT * FROM firstTable;
	  
	    will display the entire table contents: the * represents "all"
	  
	    > SELECT name, salaray FROM firstTable;
	  
	    will display just the name and salary columns from the table.
	  
	    General: SELECT [Comma separated list of field names or *] FROM
	    tableName;
	  
	    > SELECT * FROM firstTable WHERE salary < 60000;
		
		will select all entries from the table where the salary value
		is < 60000
		
		> SELECT * FROM firstTable WHERE salary < 60000 OR name = "Isaac Newton";
		
		will select all entries from the table where the salary value
		is < 60000 or the name is Isaac Newton. AND is also a keyword for logical and.
		
		General: SELECT [Comma separated list of field names or *] FROM tableName WHERE [list of conditions joined by AND or OR, which may also involve <, <=, =, >=, >, or !=]
		
		parentheses may be used to bracket off (a OR b) AND c, etc.
		
	  44.6.2 Updating table data
	  
	  > UPDATE firstTable SET salary = 100000 WHERE name="Alan Turing";
	  
	  will update the salary of Alan Turing to 100K
	  
	  > UPDATE firstTable SET salary = 200000;
	  
	  sets all salaries to 200K
	  
	  > UPDATE firstTable SET department = "Physics" WHERE department IS NULL;
	  
	  sets Newton's department to Physics as nothing was there specified before	  
	  
	44.6.3 Inserting a new field
	
	  > ALTER TABLE firstTable ADD COLUMN unrelatedItem { BLOB };
	  
	  will create a new field with name unrelatedItem and of type BLOB
	  
  44.7 Deleting a table and table entries
	
	> DELETE TABLE tableToBeDestroyed;
	 
	This deletes the table and clears all of its data. Beware.
	
	> DELETE FROM firstTable WHERE name = "Alan Turing";
	
	would remove all records in which Alan Turing appears as the
	name.


45. Reading and Writing to Databases through PHP
  
  45.1 Opening a Database
  
    - construct a database object to read from/to
	- the call may fail, so use a try/catch statement
	- if an exception is thrown within try, an exception object is
	thrown and catch will be able to parse it.
    */
	try{
		$firstPHPDatabase = new SQLite3('php_database.php');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}

    echo "If you are reading this, the connection was successful...";

    $firstPHPDatabase->close();	// close the connection
	
	/*
  
  
  45.2 Database queries: writing
  
    - write commands in PHP as strings to pass to the database
	
	- semi-colons do not appear in these PHP-Database queries, but
	PHP statements still must end with a semi-colon
	
	*/
	
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
	$field3 = "department";
	
	$name1 = "Alan Turing";
	$salary1 = 50000;
	$department1 = "Computer Science";
	
	$name2 = "Isaac Newton";
	$salary2 = 98000;
	$department2 = "Physics";
	
	$cmd = "CREATE TABLE IF NOT EXISTS " . $table . " ( " . $field1 . " TEXT, " . $field2 . " REAL, " . $field3 . " TEXT ) ";
	
	$firstPHPDatabase->query($cmd);
	
    $cmd = "INSERT INTO " . $table . " ( " . $field1 . ", " . $field2 . ", " . $field3 . " ) VALUES ( \" " . $name1 . "\", " . $salary1 . ", \"" . $department1 . "\" )";
	
	$firstPHPDatabase->query($cmd); 
		
    $firstPHPDatabase->close();	
	
	/*

  45.3 Database queries: reading
    - can store database query result as a variable
	
	*/
	
	$firstPHPDatabase = new SQLite3('php_database.php');
	
	$firstPHPDatabase->query("INSERT INTO firstTable ('name', 'salary') VALUES (\"Isaac Newton\", 98000 )"	);
	
	$res = $firstPHPDatabase->query("SELECT * FROM firstTable");
	
	/*
	
	- the variable res, in this case is an SQLite3ResultObject
	
	- has a member function fetchArray that returns a record
	in an associative array, also with regular indices	
	
	- if fetchArray unsuccessful, returns false	
	
	*/
	
	echo "<br/>Database output:<br/>";
	
	while($record = $res->fetchArray()){
	  print_r($record);
      echo "<br/>";	  
	}
	
	/*
	- once the last record has been accessed, the pattern continues
	cyclically, back at the start with fetchArray returing the first
	entry again

    - also note that the unset function can delete an array entry (or a variable in general)	
	*/
	
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
		    <th>Name</th> <th>Salary</th> <th>Department</th>
		  </tr>";
		  
	while($record = $res->fetchArray())
	{
		echo "<tr><td>", $record['name'], "</td><td>", $record['salary'], "</td><td>", $record['department'], "</td></tr>";
	}
	
	echo "</table>";
		
	$firstPHPDatabase->close();
	
	
	

  
?>
</body>
</html>