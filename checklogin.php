<?php
session_start();
$referer = $_SERVER['HTTP_REFERER'];
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

 $user_name = mysqli_real_escape_string($conn, $_POST['username']);
 $user_password = mysqli_real_escape_string($conn, $_POST['password']);
 $sql = "Select * from user WHERE user_name='$user_name' || email='$user_name'";
 $result = $conn->query($sql); // Query the users table
 if ($result->num_rows > 0) {
     $table_users = "";
    $hash_password = '';
    $email ="";
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $table_users = $row['user_name'];     // the first username row is passed on to $table_users, and so on until the query is finished
        $email = $row['email'];
         $hash_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
         if (password_verify($user_password, $hash_password))
         {
            $_SESSION['user'] = $user_name;//set the username in a session. This serves as a global variable
             header("location: home.php"); // redirects the user to the authenticated home page
             exit;
         }
          else {
             header("Location: index.php?message=Incorrect username or password!");
             exit;
         }

    }
}
else{
        //Print '<script>alert("User not exist!");</script>'; // Prompts the user
    //    Print '<script>window.location.assign("index.php");</script>'; // redirects to login.php
        header("Location: index.php?message=User not exist!");
        exit;

      }
 ?>
