<!--Write an array that will store first name (as key) and last name (as value) and will sort the array by number of letters of the last name in decreasing order. :( print the array--> 

#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>
<?

$names = array('Annie'=>'Le', 'V=>Puppy', 'Suga'=>"Kookie", 'Hobi'=>'Ho', "Jin"="RM"); 
sort($names); 
	foreach($names as $key=>$val){
		echo "names[".$key."]=".$val."\n"; 
	})



?>

</body>
</html>