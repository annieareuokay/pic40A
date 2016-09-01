<!doctype html>
<html>
<head>
<?php
if($_POST){
	$username = $_POST['username'];
}
// if(isset($_POST['username'])){
// 	header("location: FINALpage2.php");}
?> 
	<meta charset="utf-8" />
	<title>Welcome</title>
	<style>

		html{
			background: url(http://4.bp.blogspot.com/-sjQ8I1twi1M/VWBIQ4372pI/AAAAAAAAAFM/J8S4tN7UuVU/s640/ib0x2amNmYdFld.gif)no-repeat center center fixed; 
			background-size: cover;
		}
		body{
			font-family: 'Optima';
		}
		div{
			text-align: center;
			height: 200px;
			width: 400px;
			position: fixed;
			background-color: rgba(192,192,192,0.5);
			top: 50%;
			left: 50%;
			margin-top: -100px;
			margin-left: -200px;
		}

		.button{
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin: 4px 2px;
			cursor: pointer;
		}

		h1{
			color: Black;
			text-align: center;
			height: 200px;
			width: 400px;
			position: fixed;
			top: 30%;
			left: 50%;
			margin-top: -100px;
			margin-left: -200px;
		}

	</style> 
</head>
<body>
	<h1>Welcome to my lame website!</h1>
	<div>
	<p><h2>Please enter your name.</h2></p>
		<form action = "FINALpage2.php" method="POST">
			<input type="text" name="username"></input><br/>
			<input type="submit" class="button" name="submit" value="Enter">
		</form>
	</div>
	<footer>
		<small>&copy;2016 by Annie Le</small>
	</footer>
</body>
</html>