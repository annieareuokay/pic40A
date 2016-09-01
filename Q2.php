#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<form method="POST">
<input type="text" name ="name"/>
<input type="submit" value="submit" />
</form>


</body>

<?php

  $value = $_POST['name'];
  $i=0;
  $sum;
  $limit = 1; 

  echo $value."<br/>"; 

  while ($sum > $limit){
  	if($value%2 != 0){
  		$sum = 3*($value+1);
  		
  	}
  	 
  	else{
  		$sum=$value/2; 
  		
  	}
  	echo $sum."<br/>"; 
  }

  // if($a)

?>
