<!-- Exercise: 
- create an array and print all of its elements using a foreach loop
- pass each value to a fucntion that will convert the elemtns to an int if possible and display. Otherwise if the conversion is not possible, then it should print "ERROR."
- Separate the outputs by new lines  -->

#!/usr/local/bin/php
<!DOCTYPE html>
<html> 
<head> 
	<meta charset = "utf-8"/> 
	<title>thing</title>
</head>
<body> 
<? 
 
$array=["v", "jk", "jm", "rm", "jh", "s", "j"]

foreach($array as &$value){
	echo "$value";
}

function f(){
		for($i=0; $i < func_num_args(); ++$i)
          echo func_get_arg($i), " ";			
	}
function convert(){

}	

?> 

</body> 
</html>