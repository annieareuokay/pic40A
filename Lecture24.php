<!-- #!/usr/local/bin/php -->
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
42. Form Processing and Super Globals
  42.1 Some Super Global Variables
    42.1.1 $GLOBALS: 
	  - already seen - stores all global variables
	  
	42.1.2 $_SERVER: 
	  - stores information about file names, script locations, etc.
	  - most useful for us:
	    $_SERVER['PHP_SELF']: the current php page/script
		$_SERVER['REQUEST_METHOD']: the method of access: GET, POST
		Ex:
		if ($_SERVER['REQUEST_METHOD'] === "POST") { ... }
				
	42.1.3  $_POST:
	  - stores data from form when method=post used
	  - acess form data by indexing this variable for *names* of fields
	  */
	  ?>
	  <form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>" >
	    <input type="text" name="userMessagePost" /> <input type="submit" value = "post" />
	  </form>
	  
	  <?
	    echo "Post, ", $_POST['userMessagePost'], "<br/>"
	  	  
	  /*
	  
	42.1.4 $_GET:
	  - stores data from form when method=get used
	  - with get, see inputs in URL
	  - acess form data by indexing this variable for *names* of fields
	  
	  */
	  ?>
	  <form method="get" action="<? echo $_SERVER['PHP_SELF']; ?>" >
	    <input type="text" name="userMessageGet" /> <input type="submit" value="get" />
	  </form>
	  
	  <?
	    echo "get, ", $_GET['userMessageGet'], "<br/>";       
	  
	  
	  /*
	  
	42.1.5 $_COOKIE:
	  - stores cookie data
	  - associative array indexed by cookie name
	  - all cookie setting/deleting must take place before <!DOCTYPE html>, but this is hard to implement in practice and may not work
	  - can access/read cookies, though
	  */
	  
	  echo $name, " ", $other, "<br/>";
				
		?>
		<script>
		  document.cookie = "someCookie=this cookie is set;";
		  document.cookie = "name=Snickers;";
		  alert(document.cookie);
		</script>
		
		<?	  
	  
	  $name = $_COOKIE['name'];
	  $other = $_COOKIE['someCookie'];
	  
	  echo $name, " ", $other, "<br/>";  
	  
	  /*	

  42.2 Get
    - can send information to php scripts via the get method in a URL
	
	- when used, a new URL will be generated that includes the submission
	variables: somephpscript.php?var1=value1&var2=value2
	
	- not very secure: user submission is visible in URL
	
	- limited to ~2000 characters in total
		
  42.3 Post
    - more secure: data isn't visible in URL
	
	- think of Post like the post (mail) - stuff is secure in an envelope...
	
	- data sent by HTTP Post method	
  
  42.4 External PHP Page Referral
    - can reference a php script outside of the page the user is on
	
	- action = "filename.php" will invoke that script and take the user
	to the file.php page with their data sent through the form (the filename can be a relative file path)
	
  42.5 Accessing Form Data
    - Use the names of elements to index the values we seek
	
	- The "value" attribute will be the value of the corresponding
	$_POST['name'] or $_GET['name'] variable
	
	- Text fields (input type="text") and textareas go by value
	
	- The value radio buttons with a given name (recall radio
	buttons have the same name so that only one can be checked) is the 
	value attribute set to the radio button that is selected.
	
	- The value of a select box (input type="select") is the value
	given to its <option> elements contained within it. The select box
	needs the name, not the options.
	
	- When multiple items can be selected, such as with a checkbox,
    need to use a name array...	
	
  42.5 Name Arrays
    - In HTML forms, a checkbox may admit multiple answers
	
	- In the form, by specifying name="exampleName[]" for all of them,
	when the PHP form is processing the data, an array of all values
	will be submitted

	- $_POST['exampleName'] is an array
	*/
	
	?>
	
	<form style="border: 1px solid black;" id="byGet" method="get" action="get_it.php">
	  <input type="checkbox" name="x[]" value="A">A<br/>
	  <input type="checkbox" name="x[]" value="B">B<br/>
	  <input type="checkbox" name="x[]" value="C">C<br/>
	  <input type="checkbox" name="x[]" value="D">D<br/>
	  <input type="text" name="msg" /> <br/>
	  <input type="submit" value="GET" />	
	</form>
	
	<form style="border: 1px solid black" id="byPost" method="post" action="post_it.php">
	  <input type="checkbox" name="x[]" value="A">A<br/>
	  <input type="checkbox" name="x[]" value="B">B<br/>
	  <input type="checkbox" name="x[]" value="C">C<br/>
	  <input type="checkbox" name="x[]" value="D">D<br/>
	  <input type="text" name="msg" /> <br/>
	  <input type="submit" value="POST" />	
	</form>
	
	<? /*

	Inside of get_it:
	
	<?
  $message = $_GET['msg'];
  $checks = $_GET['x'];
  echo "<h1>You entered: ", $message, "</h1>";
  if(count($checks)===0):?>
    <h2 class='empty'>Nothing was checked</h2>
<? else:
  echo "<h2 class='chosen'>";
  foreach($checks as $selected):
    echo $selected, " was chosen. ";
  endforeach;
  echo "</h2>";
  endif;
?>

  - beware that if an array is empty and it is imploded, the resulting
  string may in fact be null instead of ""...
		
43. Reading and Writing to Flat Files
  43.1 Opening and Closing
    - To create an output file stream object to *a*ppend at 
	the end of the file:
	
	$outputVariableName = fopen($theFileName,"a");
	
	If the file does not exist, it will be created. If the file already
	exists, data can be appended to the end.
	
	- To create an input file stream object to *r*ead data from the
	beginning of the file:
	
	$inputVariableName = fopen($theFileName, "r");
	
	- When an input/output file stream has been used, it should be closed:
	fclose($inputVariableName);
	
	etc.
	
	- Can optionally specify a message to display if failure occurs:
	
	$inputVariableName = fopen($theFileName,"r") or die("Cannot find file");
	
	*/
	
	//$inputAttempt = fopen("notHere.txt","r") or die("Cannot find file!");
	
	/*	
  
  43.2 Writing to a File
    - use the fwrite function: specify the file to be written to and the string
	that is being written
	
	fwrite($fileName, "abcdefgh\n");
	
	- note that "" and '' are not interchangeable for escape characters.
	Using fwrite with '\n' or '\t' will literally write backslash n or t.
	Must use double quotes to get the new line or tab!!!
	
	*/
	$outFile = fopen("output.txt","a") or die("Failed to open.");
	
	for($i=0; $i < 10; ++$i){
		fwrite($outFile, (string)$i . '\n' . "\n");
	}
	
	fclose($outFile);	
  
?>
</body>
</html>