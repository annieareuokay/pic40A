<!-- Write php scripts that will 
Allow the user to enter password in a type = "password" field. 
Validate the password against a password stored in a database. 
If the password is correct, redirect them to a php page that says "welcome"
if the password is incorrect, display the message "Invalid" beneath the password box via an AJAX call
Name of the files: 
login.php
welcome.php 
pass.db -->
<?php




?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

<script>
$('#button').click(
	function(){
		$.ajax({
			url: 'welcome.php',
			type:'post',
			success:function(result){
				document.getElementById('ajaxP3').innerHTML = result;
				
				setTimeout(
				function(){ // and then redirect after 3 seconds...
				$(location).attr('href', 'http://www.math.ucla.edu/'); }, 3000);
			}
		})



	})
</script>
</head>
<body>
<p id="appearTop"></p>
<br/>

<form action="" method="post" action="<? echo $_SERVER['pass.db'];?>"> 
	<input type="password" name="pwd" id="password"/>
	<input type="submit" id="button" value="Submit"/> 
</form>


<?
if ($_POST['pwd']=='1234'){
	echo 'You have entered valid password';
}else if($_POST['pwd']!=='1234'){
echo 'Incorrect password';
}



?>

</body>
</html>
