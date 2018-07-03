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
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>
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
                              <p style="color:red; text-align:center;  font-weight:bold;">
                              <?php
                              $message="";
                               if(!empty($_GET['message'])) {
                               echo  $message = $_GET['message']; }
                               ?>
                                  </p>
                                  <p style="color: green; text-align:center; font-weight:bold;">
                                      <?php
                                              $success="";
                                               if(!empty($_GET['success'])) {
                                               echo  $success = $_GET['success']; }
                                               ?>
                                           </p>
                                  <h1> <a href="add_photos.php" onclick="">add photos</a> | <a href="#AlbumModal" onclick="">Create Album</a> | <a href="#" onclick="openNav()">allbums</a> |  <a href="logout.php">logout</a></h1>
<?php   //$result = getimages();
$newobj= new myDB;
$result=$newobj->getimages(); //$anotherLock->isLocked()
while($row = $result->fetch_assoc()) {
//    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//}
?>
                                 <div class="imagegallery">
                                     <div class="gallery">
                                    <a target="_blank" href="<?php echo $row["photoLink"] ?>">
                                      <img src="<?php echo $row["thumblink"] ?>" alt="Trolltunga Norway" width="600" height="400">
                                    </a>
                                    <div class="desc"><?php echo  $row["caption"] ?></div>
                                  </div>
                                 <div  class="boxhead"><a href="edit_photos.php?photoid=<?php echo $row["photoID"] ?>" style="text-decoration:none !important;color: inherit;"><i class="material-icons">&#xe3c9;</i></a><a href="deleterecord.php?photoid=<?php echo $row["photoID"] ?>"  class="delete" style="text-decoration:none !important;color: inherit;"><i class="material-icons">&#xe5c9;</i></a>

                                 </div>
                              </div>
                          <?php }?>
                          </div>
                      </div>
                  </div>
              </section>
    </div>
      </body>
  </html>
