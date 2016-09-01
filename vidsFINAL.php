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
    <p>Click thumbnail to see reviews.</p>

    <div class="img">
      <a href="vid1.php">
        <img src='http://img.youtube.com/vi/GZjt_sA2eso/0.jpg' alt="video" width="300" height="200">
      </a>

    </div>

    <div class="img">
      <a href="vid2.php">
        <img src='http://img.youtube.com/vi/6QFwo57WKwg/0.jpg' alt="video" width="300" height="200">
      </a>

    </div>

    <div class="img">
      <a href="vid3.php">
        <img src='http://img.youtube.com/vi/YXwYJyrKK5A/0.jpg' alt="video" width="300" height="200">
      </a>

    </div>

    <div class="img">
      <a href="vid4.php">
        <img src='http://img.youtube.com/vi/O0_ardwzTrA/0.jpg' alt="video" width="300" height="200">
      </a>

    </div>

    <div class="img">
      <a href="vid5.php">
        <img src='http://img.youtube.com/vi/TTAU7lLDZYU/0.jpg' alt="video" width="300" height="200">
      </a>
    </div>

    <div class="img">
      <a href="vid6.php">
        <img src='http://img.youtube.com/vi/oDuif301F-8/0.jpg' alt="video" width="300" height="200">
      </a>
    </div>

    <div class="img">
      <a href="vid7.php">
        <img src='http://img.youtube.com/vi/dQw4w9WgXcQ/0.jpg' alt="video" width="300" height="200">
      </a>

    </div>

  </body>
  </html>