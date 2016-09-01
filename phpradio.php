<!-- #!/usr/local/bin/php -->

<!-- write a php script for a web form that has two radio button options A and B; it will then confirm their chosen option after they press submit. Call the HTML file form.html. Call the php script. -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
</head>
<body>

<?php



?>

<form style="border: 1px solid black;" id="byGet" method="get" action="form.html">
Pick one: <br/>
<input type="radio" name = "thing" value = "A">A<br/>
<input type="radio" name = "thing" value = "B">B<br/>

<input type="text" name="msg" /> <br/>
<input type="submit" value="POST" />

</form>

</body>
</html>
