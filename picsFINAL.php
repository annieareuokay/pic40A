#!/usr/local/bin/php
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Cool Items</title>

	<style>
		html{
			background: url(http://www.vdgh.ca/wp-content/uploads/2015/09/Silver-Blur-Background.jpg)no-repeat center center fixed; 
			background-size: cover;
			font-family: 'Optima';
		}

		#header:visited, #header:link{
			color:black;
			text-decoration: none;
			margin-left: 10px;
		}

		#header:hover{
			color: white;

		}

		.img{
			float: left;
			padding: 10px;
		}
	</style>

</head>
<body>

	<header>
		<h1><a href="FINALfirstpage.html" id="header">Annie's Cool Things Randomizer Page</a>
			<img id="headerimg" src='http://i.imgur.com/nfmhDw5.gif'></h1>
		</header>
		<nav>

			<?php include("navbar.html"); ?>

		</nav>

		<p>Click image to see reviews.</p>

		<div class="img">
			<a href="pic1.php">
				<img src='http://66.media.tumblr.com/b5901ba6eb52e447f36f2123079c7052/tumblr_n7cnmrMVGK1tbwj7ho1_500.jpg' alt="doge1" width="300" height="200">
			</a>

		</div>

		<div class="img">
			<a href="pic2.php">
				<img src="http://66.media.tumblr.com/60003a38dd69618b5dcb8dcdb9196d46/tumblr_nn9y9uwvRf1qixslso1_500.jpg" alt="doge2" width="300" height="200">
			</a>

		</div>

		<div class="img">
			<a href="pic3.php">
				<img src="http://65.media.tumblr.com/3e2fa4e05d2a8e1d479bde87a819d775/tumblr_o41eo3RGGC1s4yg05o1_500.jpg" alt="doge3" width="300" height="200">
			</a>

		</div>

		<div class="img">
			<a href="pic4.php">
				<img src="http://67.media.tumblr.com/d27ea5146c2a1c4082526d05cc44cb2e/tumblr_o38682EzqH1qhbh1qo1_1280.jpg" alt="doge4" width="300" height="200">
			</a>

		</div>

		<div class="img">
			<a href="pic5.php">
				<img src="http://66.media.tumblr.com/5ff72e4aa38304e1c32c7ce546575dd4/tumblr_o795uhaVt01tghz4zo1_500.jpg" alt="dog5" width="300" height="200">
			</a>
		</div>

		<div class="img">
			<a href="pic6.php">
				<img src="http://65.media.tumblr.com/17aeb823c8eddb02cc958ac05cc13b50/tumblr_o5nuzwmuPG1uie2pco1_500.jpg" alt="dog6" width="300" height="200">
			</a>
		</div>

		<div class="img">
			<a href="pic7.php">
				<img src="http://67.media.tumblr.com/c748caa13c242d8f850f0c6fbd72ea71/tumblr_mu2iinC9Vo1qb08qmo1_500.jpg" alt="dog7" width="300" height="200">
			</a>

		</div>

	</body>
	</html>