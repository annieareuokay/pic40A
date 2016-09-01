<!-- #!/usr/local/bin/php -->
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
  
  <style type="text/css">
    .empty{
		color: blue;
	}
	
	.chosen{
		color: red;
	}
  </style>
</head>
<body>
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

</body>
</html>