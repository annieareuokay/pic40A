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
 
38. Control Flow
  
  38.3 Do Loops
    Same as C++
	*/
	$sum = 0;
	$i=0;
	do{
	  echo $sum += $i++, " ";		
	} while($i < 10);
	echo "<br/>";
  /*
  38.4 While Loops:
    Same as C++
	*/
	$j = 10;
	while($j-- > 0)
		echo '$j is ', $j, "<br/>";	
	/*
  
  38.5 For Each Loops
    - similar to the range-for in C++
	- there are two styles: with and without naming the 'keys'
	- PHP: 
	  arrays can be indexed 0, 1, 2, 3, ... (the keys) with
	  corresponding values 
	    OR
	  arrays can be indexed by strings 'cat', 'dog', ... (the keys) with
	  corresponding values
	- more on arrays to come, but for now consider:	
	 */
	 
	  $regArray = [true, true, false, true];
	  $otherArray = array("cat"=>"cute", "dog"=>"okay", "squirrel"=>"cool" );
	  
	  foreach($regArray as &$truthVal) // call each element $truthVal
	  // and access by reference to change it
	    $truthVal = !$truthVal; // negate
		
	  foreach($regArray as $truthVal)
        echo (int)$truthVal, " ";
      echo "<br/>";

      foreach($otherArray as $animal=>$attribute)
        echo "$animal -- $attribute ";		
	  
	
	/*
	
	- give names to the array elements or key-value pairs
  
  38.6 Alternative Loop and Ifs with Colons
    - may also see statements like:
	if ($x===8):
	  echo "$x is 8";
	endif
	
	- control flow with the colon requires endif, endwhile, endforeach,
	etc.
	- with colon, "else if" is not valid but "elseif" is
	
  38.7 "Mixing" HTML and PHP
    - can interlace the two:
*/
?>

  <?
  $x = -11;
  if($x > 0) { ?>
    <h1>X is positive!!!</h1>
  <? }
  else { ?>
    <h1>X is negative!!!</h1>
  <? } ?>

  <?
  for($i=0; $i < 5; ++$i):?>
    <h1>Hi</h1>
  <?endfor?>	

<? /*
  
  38.7 Truthy and Falsy
    - These values are converted to false:
	  0
	  0.0
	  ""
	  "0"
	  an array with 0 elements
	  an object with 0 member variables
	  null
	  
	- Otherwise a variable/expression is deemed truthy
	
	- == vs ===:
	  0 == "0" is true, whereas
	  0 === "0" is false
	  
	  with ==, type juggling is allowed
	  with ===, no type juggling is allowed: variables must be of same type
  
39. Types
  39.1 Settype
    Can convert between variable types: the "leading part"
	is considered
	*/
	
	$an_int = "42";
	$float_and_word = "3.14 computer";
	settype($an_int, int); // makes it a real int
	echo var_dump($an_int), "<br/>";
	settype($float_and_word, float); // only floating part kept
	echo var_dump($float_and_word), "<br/>";
	
	/*
	- settype returns true if successful or false if it fails
	
	- beware that convering 'false' to bool is true: nonempty strings
	are truthy!!!
  
  39.2 Converting in print
  
    - Convert an expression:
	*/

    echo (float)"9.876543 two one zero", "<br/>";	
    
	/*
40. Functions
  40.1 General Structure
    - can call regular JS functions - must define JS in script tags
	*/
	?>
	<script>
	function someFunction($toAlert){
		document.getElementById('appearTop').innerHTML = $toAlert;
		return $toAlert;
	}
	
	</script>
	<?
	echo "<input type=\"button\" value=\"click me\" onclick=\"alert( someFunction(42) );\"/><br/>";
	
	
	/*
	PHP functions
	- declared with function keyword
	function functionName(params){
		stuff;
	}
	- may be anonymous, too
	- executed when called
	- function names are not case sensitive
	- can name parameters -- or not
	- no function overloading: unset parameters are null, extra parameters are still stored
	- may return a value -- or not
  
  40.2 Passing by Reference
    - Specify a pass by reference with & before variable name in parameter list
	
	*/
	
	function collectedByValue($x){
		++$x;		
	}
	
	function collectedByReference(&$x){
		++$x;		
	}
	
	$x=5;
	
	echo "$x, ";
	collectedByValue($x);
	echo "$x, ";
	collectedByReference($x);
	echo "$x<br/>";
	
	/*	
	       
  40.3 Variable Scope
    - within a function, can only access local variable directly
	- to access a global variable defined outside the function, use
	global:
	*/
	
	$X = 100;
	function doSomething(){
		global $X;
		$X = 200;
	}
	
	doSomething();
	echo $X, "<br/>";
	
	/*
	- writing $GLOBALS['X'] = 200;
	would do the same thing: we access X
	through the "superglobal" variable $GLOBALS (more on superglobals to come)
	
  40.4 Special Function Variables
    - func_num_args(): the number of argumnets a function accepted
	when called
	
	- func_get_arg($i): the $ith-index of the input parameters
	
	*/
	
	function f(){
		for($i=0; $i < func_num_args(); ++$i)
          echo func_get_arg($i), " ";			
	}
	
	f(1,2,false,'hummus');
	
	echo "<br/>";


	/*
	
	Note: the false was printed as the empty string!!!
	
	false gets converted to ""!!! */
?>
	
</body>
</html>