<!doctype html>

<html>
<head>
<meta charset="utf-8"/>
</head>
<body>

<!-- write php code to print out an HTML table with the numbers 1-100 -->

<?php
echo "<table border='1'>"; 
echo "<tr>"; 
for ($i=1; $i<=100; $i++){
	echo "<td>$i</td>"; 
	if ($i%10==0){
	echo "</tr>";
	}

}
echo "</tr>";
echo "</table>";  

?> 

</body>
</html>