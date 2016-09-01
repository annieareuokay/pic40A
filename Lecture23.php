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
 
Extra:

  - the endif and endwhile and endforach should terminate with a semicolon or else weird problems can emerge. 

41. Arrays
  41.1 Overview
    - store key-value pairs
    - can have nonnegative int or string keys
    - can store variables of mixed type
  
  41.2 Creation and Access
  
    - create with array constructor:
	
	*/
  
    $a = array(1,'2','three'); // will have ordinary indices 0, 1, 2
    $b = array('a'=>4, 'b'=>5, 'c'=>6, 'd'=>false); // will have indices
	// a, b, c
	
    /*
    - index with subscript
	
	*/
  
    $a[2] = 'four';
    $b['c'] = 'seven';
		
	/*
  
    - create with [] notation:
	
	*/
  
    $c = [true, '9', 8];
	
	/*
	
  41.3 Useful Functions
    - array_push: add elements to the array
	
	- or just add a value with []
	
	- print_r: print array
	
	*/
	
	$d = [1=>2,2=>3,3=>4];
	
	array_push($d,5,6);
	
	$d['hello'] = "random";
	
	echo '<b>see $d</b><br/>';
	
	print_r($d);
  
    /*
    - explode: turn string into array with specified dividers
	
	*/
	  echo '<b>see explode</b><br/>';
	
	  $s = "1,2,3,4,5";
	  $a = explode(",", $s);
	  echo var_dump($a), "<br/>";
	  
	/*
	  
	- implode: turn array into string with specified spacers
	
	*/
	  echo '<b>see implode</b><br/>'; 
	  
	  $a = array(2,4,6,8,10);
	  $s = implode("---",$a);
	  echo $s, "<br/>";
	  
	  /*
	  
	- is_array: true or false if array
	*/
	
	  echo '<b>see is_array</b><br/>';
	  echo "check if is array: ", (is_array($s) ? 'true' : 'false'), "<br/>";
	  
	  /*
	  Note: PHP also supports the conditional operator ?:
	  
	- current: returns the value currently "pointed to" - initially first element is pointed to. Returns false if empty.
	
	*/
	  echo '<b>see current of $b and $b</b><br/>';
	  echo current($b), "<br/>";
	  
	  /*
	
	- next / prev: moves the array pointer forward and returns the new pointed-to element (next) or moves the array pointer backward and returns the new pointed-to element (prev) or false if no more elements. Both return false if no more elements
	*/
	print_r($b);
	
	echo "next with b array:<br/>";
	while(next($b))
		echo (int)current($b), " ";
	echo "<br/>";
	
	/*
	- each: returns key-value pair that can be input into the list
	construct and traverse the array...
	*/
	
	echo "next with b array:<br/>";
	reset($b);
	while(list($key,$val) = each($b))
		echo "$key=>$val", " ";
	
	
	/*
	- reset / end: moves the array pointer to the start/end and returns the start/end value.
	
	- in_array: checks is a value is in the array
	  - in_array(theValue, theArray, strictness) where strictness
	  is true if we require type matching and value; false if not strict (by default allows type conversions). Somehow, if the array contains the value 'true' then in_array, without strictness, also returns true...
	  
	  */
	  
	  echo "<br/>c array check:<br/>";
	  
	  echo var_dump($c), "<br/>";
	  
	  /*
	  Observe an actual bug in PHP. This function DOES NOT work for
	  associative arrays!!!*/
	  
	  	  
	  if(in_array(4,$c))
		  echo "There is a 4 in array c<br/>";
	  
	  if(!in_array(4,$c,true))
		  echo "There ain't no 4 in array c<br/>";

	  $d = [false,'9',0];
	  
	  echo "check array d<br/>";
	  
	  echo var_dump($d);
	  
	  if(in_array(9,$d))
		  echo "There is a 9 in array d<br/>";
	  
	  if(in_array(100,$d))
		  echo "There is a 100 in array d<br/>";
	  
	  if(!in_array(9,$d,true))
		  echo "There ain't no 9 in array d<br/>";
	  
	  
	  /*
	
	- Many sorting methods
	  sort: ascending by value, associative indices lost
	  rsort: descending by value, associative indices lost
	  asort: ascending by value, associative indices kept
	  arsort: descending by value, associative indices kept
	  ksort: ascending by key, associative indices kept
	  krsort: desending by key, associative indices kept
	  
	  Also: uasort, uksort, usort: specify callable function object that returns an int and array sorted in increasing order with this function
	  
	  */
      $a1 = [10,9,1,2,6];
	  rsort($a1);
	  
	  foreach($a1 as $i)
	    echo "$i ";
	  print "<br/>";
	  	  
	  
	  $a2 = ['a'=>-4,'b'=>1,'c'=>15];
	  usort($a2,function($L,$R){ return ($L*$L) - ($R*$R);});
	  
	  foreach($a2 as $key=>$val)
	    echo "$key -- $val<br/>";
      print("<br/>");

  
     /*
42. Form Processing
  42.1 List of Global Variables
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
	    echo "Post, ", $_POST['userMessage'], "<br/>"
	  
	  
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
	    echo "get, ", $_GET['userMessage'], "<br/>";       
	  
	  
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
	

</body>
</html>