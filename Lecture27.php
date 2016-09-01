#!/usr/local/bin/php
<?
session_start();

if(isset($_POST['go'])){ /* if the login button was pressed,
  then the post subscript 'login' was set */
	  $_SESSION['beGone'] = 'redirect'; // set the login status to yes
	  unset($_POST['go']); // unset the login
  }

if(isset($_SESSION['beGone'])){ // if beGone is set
	header('location: elsewhere.php'); // redirect to another page
	exit;
}



?>
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
	
46. AJAX
  46.1 Basic Idea with PHP
    - can send information to the server or external PHP script
	- PHP script will parse the data and render HTML page
	- Result can be extracted and used on the client side
	
	- url specifies the script location
	- data, in braces (JavaScript object) is what gets sent to the script
	- type specifies how it is sent: get or post
	- ordinarily data sent to $_POST or $_GET global variables, unless
	JSON objects are sent...
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
	Inside ajaxCall.php:
	

$msg = $_POST['msg']; // collect message
$sz = (string)(strlen($msg) % 6 + 1);
echo "<h", $sz, ">", $msg, "</h", $sz, ">"; // display it in header
  
	Q: what is happening?	
	
	
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
		Inside ajaxCall2.php:
		
		$a = $_POST['a'];
        $b = $_POST['b'];
        echo var_dump($a);
        echo "<br/>";
        echo var_dump($b);
			
		
		
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
				
				setTimeout(
				function(){ // and then redirect after 3 seconds...
				$(location).attr('href', 'http://www.math.ucla.edu/'); }, 3000);
			
		}});
		}
		);	  

	</script>
		
		<?
	
/*
JavaScript redirects using JQuery:

$(location).attr('href', 'theURL');



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



47. Keeping Track of Sessions
  47.1 Idea
    - suppose that a user has logged in successfully and they have
	accessed a PHP page
	- can set that they have logged in by calling 
	session_start();
	- session data is tracked in a super global $_SESSION
	- can add elements to this super global and query the values
	on different pages
	- all pages must begin with session_start() BEFORE any HTML!
	
	
  47.2 Implementation
  
  */
  ?>
  
  <form method="post" action = "<? echo $_SERVER['PHP_SELF'] ?>" >
    <input type="submit" id="login" name = "login" value="Log in" />
    <input type="submit" id="logout" name="logout" value="Log out" />
	<input type="submit" id="go" name="go" value="Be gone" />
  </form>
  <?
    
  if(isset($_POST['login'])){ /* if the login button was pressed,
  then the post subscript 'login' was set */
	  $_SESSION['loggedIn'] = 'yes'; // set the login status to yes
	  unset($_POST['login']); // unset the login
  }
  
  if(isset($_POST['logout'])){ // if the logout button was pressed 
	  unset($_SESSION['loggedIn']); // clear the loggedIn variable
	  unset($_POST['logout']); // unset the logout
  }
  
  if($_SESSION['loggedIn'] === 'yes') // if logged in
	  echo "<h2>Logged in!</h2>"; // display so
  else
	  echo "<h2>Not logged in!</h2>"; // or not...
  

  
?>
</body>
</html>