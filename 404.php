<?php
include('config.php');
session_start(); //starts the session
  if($_SESSION['user']){ // checks if the user is logged in
  }
  else{
     header("location: index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
  <!DOCTYPE html>
  <!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
  <!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
  <!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
  <!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
      <head>
          <meta charset="UTF-8" />
          <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
          <title>Image Gallery</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
          <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
          <meta name="author" content="Codrops" />
          <link rel="shortcut icon" href="../favicon.ico">
          <link rel="stylesheet" type="text/css" href="css/demo.css" />
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          <link rel="stylesheet" type="text/css" href="css/style.css" />
  		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <script src="app.js" type="text/JavaScript"></script>
        <style>
        .boxhead a {
   text-decoration:none !important;
                  color: inherit;
}
        </style>
      </head>
      <body>
          <div class="container" id="main">

              <header>
                  <h1>Image Gallery</h1>
              </header>

                                                        <div id="mySidenav" class="sidenav">
                                                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                                          <span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i><a href="#">Album1</a></span>
                                                          <a href="#">Album2</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                          <a href="#">Album3</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                          <a href="#">Album4</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                        </div>
              <section>

                      <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="home_wrapper">
                        <div id="wrapper">
                          <div id="register" class="animate">
                                  <h1> <a href="add_photos.php" onclick="">add photos</a> | <a href="#AlbumModal" onclick="">Create Album</a> | <a href="#" onclick="openNav()">allbums</a> |  <a href="logout.php">logout</a></h1>
                      404 This is not the web page you are looking for
                          </div>
                      </div>
                  </div>
              </section>
    </div>

      </body>
  </html>
