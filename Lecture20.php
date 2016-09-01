#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<? 
/*
36. PHP Syntax and Variables
  36.1 Statements and Variables
    36.1.1 Syntax:
	  - all statements end with a semi-colon
	  - comments can be of the following form:
	  # this is a one-line comment
	  
	  // this is a one-line comment
	  
	  /* this is for a multiline
	  comment */  
	  
	  /*
	  
    36.1.2 Variables
	
	  36.1.2.1 Naming
	    - all variables must be prefixed by $
	  
	    - following the $ can be a letter or _, then any string
	    of letters, numbers, or _s, but not spaces or dashes
	  
	    - it's easy to forget the $ and then problems happen...
	    (stuff doesn't appear on the screen, a variable is not used
	    or set, etc.)
	  
	    - Variable names are case sensitive but function names are not
	  
	    - Variables are loosely typed, as with JavaScript: many implicit
	    conversions take place, type may change, etc. **********
		
	  36.1.2.2 Variable Types
	    36.1.2.2.1 String
		
		  to store text
		  
		  single or double quotes (but they are not always the same)
		  
		  strlen($var) gives length of string
		*/
		  $s1 = "hi... ";
		  $s2 = '<h2>greetings!</h2>';
		  $s3 = $s1 . $s2; // . for concatantion!
		  echo $s3 . ", " . strlen($s3), "<br/>";
		  /*
		36.1.2.2.2 Integer
		
		  to store INTEGERS, no decimals allowed
		  
		  from ~-2 billion to +2 billion
		  
		  */
		  $i = 42;
		  /*
		36.1.2.2.3 Float
		
		  to store floating points: type double
		  
		  */
		  $d = 3.14;
		  
		  /*
		36.1.2.2.4 Boolean - true/false
		
		36.1.2.3.5 Arrays
		
		  - store anything in an array
		*/
		  $listOfThings = array("write lecture", "get coffee", "fill in for a lecture", false, 5, function($msg){ echo $msg; });
		  echo count($listOfThings);
		  echo "<br/>";
		  $listOfThings[5]('water watever everywhere'); #calling the function
		  # the function is anonymous, just like in JS
		  
		/*
		 
		 - count( ) gives the array size
		
		36.1.2.3.6 NUll 
		
		  - has no value
		  - uninitialized variables are NULL
		  - NULL evaluates to 0 for numbers, and to "" for strings
		
		36.1.2.3.7 Objects and Resources
		
		  - object similar to C++ or the objects created by JavaScript
		  - objects contain values and functions
		  
		  - resource: a database, etc.	

        36.1.2.3.8 Constants
          - define a constant with define

         */
         define("MIKES_CONSTANT", 17.22);		 
  /*
  36.2 Printing
      - two printing methods: echo and print
	  - material printed can be HTML, CSS, JavaScript, ...
	  
	    36.2.1 Echo
	  */
	    echo "<h1>Hello, world!</h1><br/>"; // echo just one item
	  
	    // echo multiple items: separate by comma 		
	    echo "<h1>Hello, world!</h1>", "<br/>", "How are you today?<br/>";
	
	  
	    $x=4;
	  
	    echo "x is $x <br/>"; // double quotes evaluate variables
	    echo 'x is $x', '<br/>'; // single quotes do not evaluate variables!
	    echo $x; // or just print like so
		/*
		- echo can take multiple inputs; it has no return value
		
		36.2.2 Print
		*/
		print "<h1>Hello, world!</h1><br/>";
		
		print $x . "<br/>"; // concatenates
		print '$x <br/>';
		print "$x <br/>";

        print( var_dump($i)); // var_dump tells type and value
        print( var_dump($d));
        print( var_dump($x));
        print( var_dump(true));		
		echo ( var_dump($listOfThings));
		echo "<br/>";
		echo MIKES_CONSTANT, "<br/>";
		
	  /*
	  
	  - print takes only one value, can have parentheses or not
	  - returns 1. marginally slower than echo

37. Arithmetic
  - Same operators as for C++ and JavaScript

  ++ both prefix and postfix
  -- both prefix and postfix
  +=, -=, *=, /=, %
  
  Also ** for $a ** $b: $a to the $bth power.
  
38. Control Flow
  38.1 If-Statements
    - similar to C++/JS but follows:
	
	if(...) { }
	elseif(...) { }
    else { }
	
	elseif is a keyword: not 'else if'
*/
?>

<h2>Some control flow:</h2>

<?
  $a = 17;
  $b = 42;
 
  if($a < $b)
	  echo 'Lookie here, $b is bigger than $a<br/>';
  
  $a *= $a;	  
  
  if($a < $b)
	  echo "$b is bigger than $a";
  elseif($a > $b)
	  echo "$a is bigger than $b";
  else
	  echo "$a and $b are equal";
  
  echo "<br/><br/>",  var_dump($c) . "<br/>";
  echo "Hi" . $c . "Bye<br/>";
  echo 36 + $c, "<br/>";
  echo (10 * $c) . "<br/>";
  
  /*
  38.2 For Loops
    Same as C++
	
	$myList = array('a','b','3','4');
	
	for($i=0; i < count($myList); ++i) // Q: what's wrong with this?
	  echo $myList[i];
  */
  ?>
  <h2>Do Loop</h2>
  <? /*
  38.3 Do Loops
    Same as C++
	*/
	$sum = 0;
	$i=0;
	do{
	  echo $sum += $i++, " ";		
	} while($i < 10);
  /*
  38.4 While Loops
  
  38.5 For Each Loops
  
  
  
  
  */
  
?>
</body>
</html>