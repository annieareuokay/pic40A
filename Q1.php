#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <style>

  body{
  	font-weight: 0.01em;
  }
  #echo{
  	font-weight: 0.01em; 
  }
  </style>
</head>
<body>

<div id="echo">
<?php

$header = 10;

while($header!=10){
	echo '<style = "font-weight=0.1em">'. "Hi";
	$header++;
	
	}


?>
</div>
</body>