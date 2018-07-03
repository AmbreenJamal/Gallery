<?php
include('config.php');
session_start(); //starts the session
  if ($_SESSION['user']) { // checks if the user is logged in
  } else {
      header("location: index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value



if (isset($_GET['photoid']) && !empty($_GET['photoid'])) {
    $photoid=$_GET['photoid'];
    $newobj= new myDB;
    $row=$newobj->getimage($photoid); 
} else {
     header("location: 404.php");
     exit;
 }
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

        </style>
      </head>
      <body>
          <div class="container" id="main">

<?php include("header.php"); ?>

                                                        <div id="mySidenav" class="sidenav">
                                                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                                          <span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i><a href="#">Album1</a></span>
                                                          <a href="#">Album2</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                          <a href="#">Album3</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                          <a href="#">Album4</a><span><i class="material-icons">&#xe3c9;</i><i class="material-icons">&#xe5c9;</i></span>
                                                        </div>
              <section>

                      <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                      <div class="container_demo">
                      <div id="auth_wrapper">
                          <div id="wrapper">
                          <div id="login" class="animate form">
                          <h1>Update Photo
                           </h1>
                                          <form  action="updatephoto.php" autocomplete="on" method="post" enctype="multipart/form-data">
                                              <p style="color:red; text-align:center;  font-weight:bold;">
                                              <?php
                                              $message="";
                                               if (!empty($_GET['message'])) {
                                                   echo  $message = $_GET['message'];
                                               }
                                               ?>
                                                  </p>
                                                  <p style="color: #066A75; text-align:center; font-weight:bold;">
                                                      <?php
                                                              $success="";
                                                               if (!empty($_GET['success'])) {
                                                                   echo  $success = $_GET['success'];
                                                               }
                                                               ?>
                                                           </p>
                                                  <p>
                                                      <label for="album" class="youmail" > Select Album </label>
                                                     <select  name="albumID">
                                                         <option value="<?php echo $row['albumID']?>"><?php echo $row['albumID']?></option>
                                                          <option value="1">album1</option>
                                                          <option value="2">album2</option>
                                                          <option  value="3">album3</option>
                                                      </select>
                                                  </p>
                                              <p>
                                                  <label for="photocaption" class="uname">Photo Caption</label>
                                                  <input id="photocaption"  name="caption" required="required" type="text" title="Username must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" value="<?php echo  $row["caption"] ?>" />
                                              </p>
                                              <p> <img src="<?php echo $row["thumblink"] ?>" alt="Trolltunga Norway"></p>
                                              <p>
                                                  <label for="photo_link" class="uname"> Select photo</label>
                                                  <input type="file" name="fileToUpload" id="fileToUpload">
                                                  <input type="hidden" value="<?php echo $row['photoID']?>" name ="photoID">
                                                   <input type="hidden" value="<?php echo $row['thumblink']?>" name ="thumblink">
                                                   <input type="hidden" value="<?php echo $row['photoLink']?>" name ="photoLink">
                                                   <input type="hidden" value="<?php echo $row['albumthumb']?>" name ="albumthumb">
                                              </p>
                                                 <p class="signin button">
                                                     <input type="submit" value="Update Image" name="submit">
                                              </p>
                                          </form>
                                       </div>
                                   </div>
                                  </div>
                          </div>
              </section>
    </div>
      </body>
  </html>
