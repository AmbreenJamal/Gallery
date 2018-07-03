<?php
session_start(); //starts the session
  if($_SESSION['user']){ // checks if the user is logged in
  }
  else{
     header("location: index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
  ?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="openModal" class="modalDialog">
             <div id="modal_wrapper">
                 <div id="wrapper">
                 <div id="register" class="animate form">
                     <a href="#close" title="Close" class="close">X</a>
                     <form  action="upload.php" autocomplete="on" method="post" enctype="multipart/form-data">
                         <h1> upload photos </h1>
                         <p style="color:red; text-align:center;  font-weight:bold;">
                             <p style="color: #066A75; text-align:center; font-weight:bold;">
                                 <?php
                                         $success="";
                                          if(!empty($_GET['success'])) {
                                          echo  $success = $_GET['success']; }
                                          ?></p>
                             </p>
                             <p>
                                 <label for="album" class="album" > Select Album </label>
                                <select  name="albumID">
                                     <option value="0">Default album</option>
                                     <option value="1">album1</option>
                                     <option value="2">album2</option>
                                     <option  value="3">album3</option>
                                 </select>
                             </p>
                         <p>
                             <label for="photocaption" class="photocaption">Photo Caption</label>
                             <input id="photocaption"  name="caption" required="required" type="text" title="Username must not be blank and contain only letters, numbers and underscores, minimum length 4."   pattern="\w+.{4,}" placeholder="mysuperusername690" />
                         </p>
                         <p>
                             <label for="photo_link" class="photolink"> Select photo</label>
                             <input type="file" name="fileToUpload" id="fileToUpload">
                         </p>
                            <p class="signin button">
                                <input type="submit" value="Upload Image" name="submit">
                         </p>
                     </form>
                 </div>
             </div>
             </div>
    </div>
</body>

</html>
