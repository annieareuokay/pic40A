#!/usr/local/bin/php

<?php

    try{
		$firstPHPDatabase = new SQLite3('user_pass.txt');		
	}
	catch(Exception $e){ // exception object $e
		echo "Error in connecting to database. Message below: </br>";
		echo $e->getMessage();
		die("Script has terminated."); // terminate the script
	}
	
	$table = "validation";