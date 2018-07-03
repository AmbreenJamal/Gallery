<?php
include('config.php');
session_start(); //starts the session
  if($_SESSION['user']){ // checks if the user is logged in

  }
  else{
     header("location: index.php"); // redirects if user is not logged in
  }
  $user = $_SESSION['user']; //assigns user value
if(isset($_GET['photoid']) && !empty($_GET['photoid']) && is_numeric($_GET['photoid']))
{
    $newobj= new myDB;
    $photoid=$_GET['photoid'];
     $message=$newobj->deletephoto($photoid);
     header("location: home.php?success=$message");
     exit;
}
 else
{
     header("location: 404.php");
   exit;
}

  ?>
