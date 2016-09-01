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
44. Databases
  
  44.6 Accessing data from and editing a table
    
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

    List the column names for the table

    > PRAGMA table_info(tablename);



45. Reading and Writing to Databases through PHP
  
  45.1 Opening a Database
  
    - construct a database object to read from/to
    - the call may fail, so use a try/catch statement
    - if an exception is thrown within try, an exception object is
    thrown and catch will be able to parse it.
    */
    try{
        $firstPHPDatabase = new SQLite3('php_database.db');        
    }
    catch(Exception $e){ // exception object $e
        echo "Error in connecting to database. Message below: </br>";
        echo $e->getMessage();
        die("Script has terminated."); // terminate the script
    }

    echo "If you are reading this, the connection was successful...";

    $firstPHPDatabase->close(); // close the connection
    
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

    when using php, use '.' to concatenate, not '+'

  45.3 Database queries: reading
    - can store database query result as a variable
    
    */
    
    $firstPHPDatabase = new SQLite3('php_database.php');
    
    $firstPHPDatabase->query("INSERT INTO firstTable ('name', 'salary') VALUES (\"Isaac Newton\", 98000 )"  );
    
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
        
    $firstPHPDatabase->close();
    
    /* 
46. AJAX
  46.1 Basic Idea with PHP
    - can send information to the server or external PHP script
    - PHP script will parse the data and render HTML page
    - Result can be extracted and used on the client side
    
    - url specifies the script location
    - data, in braces (JavaScript object) is what gets sent to the script
    - type specifies how it is sent: get or post
    - success specifies a function to call upon the data returned
  
  */
  ?>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.7.1.min.js"></script>
    
    
    <input type="text" id="ajaxText" />
    <input type="button" value="AJAX" id = "ajaxButton" />
    <p id="ajaxP"></p>
    
    <script>
      $('#ajaxButton').click(     
        function(){
        usermsg = document.getElementById('ajaxText').value;
        
        $.ajax({
            url: 'ajaxCall.php', // URL of our script
            data: {msg: usermsg}, // the data we pass on
            type: 'post', // the method of PHP submission
            success: function(result){ // function to execute upon output
                document.getElementById('ajaxP').innerHTML = result;
        }});
        }
        );    

    </script>
    
    <?
    
    /*
  46.2 Sending and Receiving Data
  
    - sending large amounts of data can be cumbersome...
    
    */
    
    ?>
    
    <input type="button" value="AJAX2" id = "ajaxButton2" />
    <p id="ajaxP2"></p>
        
    <script>
      $('#ajaxButton2').click(    
        function(){
                
        $.ajax({
            url: 'ajaxCall2.php', // URL of our script
            data: {a: 7, b: {x: 1, y: 2, z: 3}}, // the data we pass on
            // a is treated as a string, b is considered an array of strings
            type: 'post', // the method of PHP submission
            success: function(result){ // function to execute upon output
                document.getElementById('ajaxP2').innerHTML = result;
        }});
        }
        );    

    </script>
            
    <?
        
        /*
        
        - can send the data with JSON encoding: JavaScript Object Notation      
        - convert data to JSON object with JQuery:
        JSON.stringify(someObject);     
        - on server end, decode a JSON object into an associative array     
        $result = json_decode(file_get_contents('php://input'), true);
        
        */
        ?>
        
        <input type="button" value="JSON" id = "ajaxButton3" />
        <p id="ajaxP3"></p>
        
        <script>
        
                
      $('#ajaxButton3').click(    
        function(){
        
        var week = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
        var hours = ["8-9", "9-10", "10-11", "11-12", "12-13", "13-14", "14-15", "15-16", "16-17"];
        
        bigObject = new Object();
        bigObject.week = week;
        bigObject.hours = hours;
        
        jsonweek = JSON.stringify(bigObject); // save as JSON object
        
                
        $.ajax({
            url: 'ajaxCall3.php', // URL of our script
            data: jsonweek, // we send the JSON object
            type: 'post', // the method of PHP submission
            success: function(result){ // function to execute upon output
                document.getElementById('ajaxP3').innerHTML = result;
                
                setTimeout(function(){ 
                $(location).attr('href', 'http://www.math.ucla.edu/'); }, 3000);
            
        }});
        }
        );    

    </script>
        
        <?
    
/*
Inside ajaxCall3.php:

// read from the json input to obtain associative array
$data = json_decode(file_get_contents('php://input'), true);

// read days and times
$days = $data['week'];
$times = $data['hours'];
for($i=0; $i < count($days); ++$i){
    for ($j=0; $j < count($times); ++$j)
        echo $days[$i], " ", $times[$j], "<br/>";
    echo "<hr/>";
}

*/
  
?>
</body>
</html>