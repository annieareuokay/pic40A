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
		}

		#header:hover{
			color: white;

		}
		.myButton {
			-moz-box-shadow: 0px 10px 14px -7px #276873;
			-webkit-box-shadow: 0px 10px 14px -7px #276873;
			box-shadow: 0px 10px 14px -7px #276873;
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
			background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
			background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
			background-color:#599bb3;
			-moz-border-radius:8px;
			-webkit-border-radius:8px;
			border-radius:8px;
			display:inline-block;
			cursor:pointer;
			color:#ffffff;
			font-family:Arial;
			font-size:12px;
			font-weight:bold;
			padding:13px 32px;
			text-decoration:none;
			text-shadow:0px 1px 0px #3d768a;
			display: inline-block;
			margin: 30px;
		}
		.myButton:hover {
			background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
			background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
			background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
			background-color:#408c99;
		}
		.myButton:active {
			position:relative;
			top:1px;
		}


		#content{
			position: relative;
			height: 200px;
			width: 400px;
			display: inline;
			top: 50%;
			left: 50%;
			margin-top: -100px;
			margin-left: -200px;
			padding: 30px;
		}

		#randomizer{
			position: relative;
			left: 50%;
			margin-left: -100px;
		}

		.fieldsets{
			background-color: rgba(192,192,192,0.5);
		}

		.submit{

		}
	</style>



</head>
<body>

	<header>
		<h1><a href="FINALfirstpage.html" id="header">Annie's Cool Things Randomizer Page</a></h1>
	</header>
	<nav>

		<?php include("navbar.html"); ?>

	</nav>

	<section>
		<p>Here are the reviews for this pic.</p>

		<div id="content">

			<?php 

// Build an array from the list of YouTube videos
// Replace YourVideoList.txt with the path to your text file
// This will likely be something like /home/accountname/public_html/foldername/etc
			$content_array = array(
	//songs (0-5)
				'http://www.youtube.com/v/GZjt_sA2eso?autoplay=1',
				'http://www.youtube.com/v/6QFwo57WKwg?autoplay=1',
				'https://www.youtube.com/v/YXwYJyrKK5A?autoplay=1',
				'https://www.youtube.com/v/O0_ardwzTrA?autoplay=1',
				'https://www.youtube.com/v/TTAU7lLDZYU?autoplay=1',
				'https://www.youtube.com/v/oDuif301F-8?autoplay=1',
				'https://www.youtube.com/v/dQw4w9WgXcQ?autoplay=1',


	//images (7-12)
				'http://66.media.tumblr.com/b5901ba6eb52e447f36f2123079c7052/tumblr_n7cnmrMVGK1tbwj7ho1_500.jpg',
				'http://66.media.tumblr.com/60003a38dd69618b5dcb8dcdb9196d46/tumblr_nn9y9uwvRf1qixslso1_500.jpg',
				'http://65.media.tumblr.com/3e2fa4e05d2a8e1d479bde87a819d775/tumblr_o41eo3RGGC1s4yg05o1_500.jpg',
				'http://67.media.tumblr.com/d27ea5146c2a1c4082526d05cc44cb2e/tumblr_o38682EzqH1qhbh1qo1_1280.jpg',
				'http://66.media.tumblr.com/5ff72e4aa38304e1c32c7ce546575dd4/tumblr_o795uhaVt01tghz4zo1_500.jpg',
				'http://65.media.tumblr.com/17aeb823c8eddb02cc958ac05cc13b50/tumblr_o5nuzwmuPG1uie2pco1_500.jpg',
				'http://67.media.tumblr.com/c748caa13c242d8f850f0c6fbd72ea71/tumblr_mu2iinC9Vo1qb08qmo1_500.jpg'
				); 

// Randomly pick one video from the array
			$content = $content_array[rand(0, count($content_array) - 1)];
			$content = trim($content);

			?>

			<object width="425" height="350"><param name="stuffs" value="stuff" name="autoplay" value="true"></param><param name="wmode" value="transparent"></param><embed src="<?php echo $content_array[11];?>" type="application/x-shockwave-flash" wmode="transparent" name="content" width="425" height="350"></embed></object>
		</div>


		<fieldset class="fieldsets">
			<form action="" method="POST">
				<label>Rate:</label>
				1 stars(bad)<input type="radio" name="rating" value="1">
				2 stars<input type="radio" name="rating" value="2">
				3 stars<input type="radio" name="rating" value="3">
				4 stars<input type="radio" name="rating" value="4">
				5 stars(great)<input type="radio" name="rating" value="5">
				<hr/>
				<label>Leave a comment: </label><br/>
				<textarea rows="5" cols="30" name="commentSection"></textarea><br/>
				<button type="submit" name="post" class="submit" value="Submit">Submit</button>
			</form>
		</fieldset>
	</section>
	<fieldset class="fieldsets">
		<?php include 'commentspage.php';?>


	</fieldset>
</section>

<footer>
	<small>&copy;2016 by Annie Le</small>
</footer>
</body>
</html>