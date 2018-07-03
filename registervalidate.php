<?php
session_start();
 $servername = "localhost";
 $dbusername = "root";
 $dbpassword = "";
 $dbname = "test";


// Create connection

  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
//$referer = $_SERVER['HTTP_REFERER'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $user_name = mysqli_real_escape_string($conn, $_POST['username']);
 $user_password = mysqli_real_escape_string($conn, $_POST['password']);
 $hash_password=  password_hash($user_password , PASSWORD_DEFAULT);
  $emailsignup = mysqli_real_escape_string($conn, $_POST['emailsignup']);
 $bool = true;
 $sql = "Select * from user WHERE user_name='$user_name' || email='$emailsignup'";
 $result = $conn->query($sql); // Query the users table
     $table_users = "";
     $table_email="";
     if ($result->num_rows > 0)
     {
        $bool = false ;
        // output data of each row
        while($row = $result->fetch_assoc()) {
             $table_users = $row['user_name'];
             $table_email=$row['email'];// the first username row is passed on to $table_users, and so on until the query is finishe
        if($user_name == $table_users) // checks if there are any matching fields
           {
                 //  Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
                //  Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
                 header("Location: register.php?message=Username has been taken!");//redirects to register.php
                exit;
           }
           else if($emailsignup==$table_email)
           {
                header("Location: register.php?message=Email already registed!");  // redirects to register.php
                exit;
            }
     }
}
    if ($bool) {
                  $sql =  "INSERT INTO user (user_name,email,password) VALUES ('$user_name','$emailsignup','$hash_password')";
                   if ($conn->query($sql) === TRUE) {
                          header("Location:index.php?success=Successfully registered, Login now !");
                          exit;
                     }
                     else {
                            $error= "Error: " . $sql . "<br>" . $conn->error;
                     header("Location:register.php?message=Invalid entry");// redirects to register.php
                     exit;
                         } //Inserts the value to table users

               }
    }

 ?>
