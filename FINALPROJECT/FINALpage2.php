#!/usr/local/bin/php
<?php
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Cool Items</title>
  <style>
  	ul{
  		list-style-type: none; 
  		margin: 0; 
  		padding: 0; 
  	}

  	li{
  		display:inline;
  	}
  </style>



</head>
<body>

<header>
<h1>Annie's cool things page</h1>
</header>
<nav>
	<ul>
		<li><a href="#pics">Pics</a></li>
		<li><a href="#vids">Vids</a></li>
		<li><a href="#songs">Songs</a></li>
		<li><a href="#all">All</a></li>
	</ul>
</nav>

<section>
<p>Welcome to my site,<b><?php include 'firstpagename.php'; echo $username;?></b>! This is just a simple webpage that displays all my favorite pics, videos, and music. Rate and comment below!</p>

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


	//images (6-10)
	'http://66.media.tumblr.com/b5901ba6eb52e447f36f2123079c7052/tumblr_n7cnmrMVGK1tbwj7ho1_500.jpg',
	'http://66.media.tumblr.com/60003a38dd69618b5dcb8dcdb9196d46/tumblr_nn9y9uwvRf1qixslso1_500.jpg','http://65.media.tumblr.com/3e2fa4e05d2a8e1d479bde87a819d775/tumblr_o41eo3RGGC1s4yg05o1_500.jpg',
	'http://67.media.tumblr.com/d27ea5146c2a1c4082526d05cc44cb2e/tumblr_o38682EzqH1qhbh1qo1_1280.jpg',
	'http://66.media.tumblr.com/5ff72e4aa38304e1c32c7ce546575dd4/tumblr_o795uhaVt01tghz4zo1_500.jpg',
	'http://65.media.tumblr.com/17aeb823c8eddb02cc958ac05cc13b50/tumblr_o5nuzwmuPG1uie2pco1_500.jpg',
	'http://67.media.tumblr.com/c748caa13c242d8f850f0c6fbd72ea71/tumblr_mu2iinC9Vo1qb08qmo1_500.jpg'
	); 

// Randomly pick one video from the array
$content = $content_array[rand(0, count($content_array) - 1)];
$content = trim($content);

?>

<object width="425" height="350"><param name="content" value="stuff" name="autoplay" value="true"></param><param name="wmode" value="transparent"></param><embed src="<?php echo $content;?>" type="application/x-shockwave-flash" wmode="transparent" width="425" height="350"></embed></object>



<!-- <script type="text/javascript">

   var videos = ['Z-DdQUszwoc', 'Rx7OIHCR3Cw'];

   // function playRanVid()){

	
    
	var index=Math.floor(Math.random() * videos.length);
	var html='<div class="span4"><h3 class="meet">Random Video</h3><iframe width="50%" height="50%" src="http://www.youtube.com/embed/' + videos[index] + '" frameborder="0" allowfullscreen></iframe></div>';
	// document.write(html);
	document.getElementById("myContent").innerHTML = html; 
	
	// };
  </script> -->

</div>
<button type="reload" name="Randomize" value="Randomize"onClick= "window.location.reload()">Randomize!</button>
<fieldset>
	<form action="" method="POST">
	<label>Rate:</label>
		1 stars(bad)<input type="radio" name="rating" value="1">
		2 stars<input type="radio" name="rating" value="2">
		3 stars<input type="radio" name="rating" value="3">
		4 stars<input type="radio" name="rating" value="4">
		5 stars(great)<input type="radio" name="rating" value="5">
		<hr/>
		<label>Leave a comment: </label>
		<textarea rows="5" cols="30" name="commentSection"></textarea><br/>
		<button type="submit" name="post" value="Submit">Submit</button>

</fieldset>
</section>

</body>
</html>