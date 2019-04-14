<?php
	require_once('function/koneksi.php');
	session_start();
	if(isset($_GET['out'])){
		session_start();
		session_destroy();
		header('location: index.php');
	};
?>
	<body>
	
		

		
						<?php
	                                    if (isset($_SESSION['admin'])) {
											
											echo ' 
											<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apul Ulos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/my.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
.zoom img{-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-o-transform:scale(0.8);-webkit-transition-duration:0.5s;-moz-transition-duration:0.5s;-o-transition-duration:0.5s;opacity:0.7;margin:0 10px 5px 0}
.zoom img:hover{-webkit-transform:scale(1.1);-moz-transform:scale(1.1);-o-transform:scale(1.1);box-shadow:0px 0px 30px gray;-webkit-box-shadow:0px 0px 30px gray;-moz-box-shadow:0px 0px 30px gray;opacity:1}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid" >
    <div class="navbar-header" >
    &emsp;<img src="images/logo/logo.png"  height="50px">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="CRUD.php">kelola Produk</a></li>
        <li><a href="index.php">Produk</a></li>
        <li><a href="main_forum.php">Diskusi</a></li>
        <li><a href="logout_process.php">Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>' ;
	                                    }
	                                    elseif (isset($_SESSION['user'])){
											echo '
											<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apul Ulos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/my.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
.zoom img{-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-o-transform:scale(0.8);-webkit-transition-duration:0.5s;-moz-transition-duration:0.5s;-o-transition-duration:0.5s;opacity:0.7;margin:0 10px 5px 0}
.zoom img:hover{-webkit-transform:scale(1.1);-moz-transform:scale(1.1);-o-transform:scale(1.1);box-shadow:0px 0px 30px gray;-webkit-box-shadow:0px 0px 30px gray;-moz-box-shadow:0px 0px 30px gray;opacity:1}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      &emsp;<img src="images/logo/logo.png"  height="50px">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="main_forum.php">Diskusi</a></li>
        <li><a href="tentang.php">Tentang</a></li>
        <li><a href="logout_process.php"> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>';
}

                                      else{
                            echo '
                      <!DOCTYPE html>
<html lang="en">
<head>
  <title>Apul Ulos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/my.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/animate.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <style>
.zoom img{-webkit-transform:scale(0.8);-moz-transform:scale(0.8);-o-transform:scale(0.8);-webkit-transition-duration:0.5s;-moz-transition-duration:0.5s;-o-transition-duration:0.5s;opacity:0.7;margin:0 10px 5px 0}
.zoom img:hover{-webkit-transform:scale(1.1);-moz-transform:scale(1.1);-o-transform:scale(1.1);box-shadow:0px 0px 30px gray;-webkit-box-shadow:0px 0px 30px gray;-moz-box-shadow:0px 0px 30px gray;opacity:1}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    &emsp;<img src="images/logo/logo.png"  height="50px">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="main_forum.php">Diskusi</a></li>
        <li><a href="tentang.php">Tentang</a></li>
        <li><a href="login.php"> Login</a></li>
      </ul>
    </div>
  </div>
</nav>';


                                      }
