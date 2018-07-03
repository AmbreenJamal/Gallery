<?php
class  myDB
{
    private $servername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "";
    private $dbname = "test";
    public   $conn = "";

    // Create connection
    public function __construct()
  {
      $this->conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);
      // Check connection
      if ($this->conn->connect_error) {
          $this->conn= "Connection failed: " . $conn->connect_error;
      }
  }
  public function getimages()
  {
      $con =$this->conn;
      $sql = "SELECT * FROM photos";
      $result = $con->query($sql);
      if ($result->num_rows > 0) {
          // output data of each row
          return $result;
      } else {
          return  "0 results";
      }
  }
  public  function insertimage($fullimage,$albumID,$caption,$thumblink)
   {
       $con =$this->conn;
  $sql =  "INSERT INTO photos (photoLink,albumID,caption,userID,albumthumb,thumblink)
  VALUES ('$fullimage', '$albumID', '$caption', 1, '$thumblink','$thumblink')";
   if ($con->query($sql) === TRUE) {
      return "Photo succfully uploads";
                      }
  }
  public function getimage($photoid)
  {
  $con = $this->conn;
  $sql = "SELECT * FROM photos WHERE photoID='$photoid'";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
  return    $row = $result->fetch_assoc();     // output data of  row
  } else {
      return  "Photo not exist";
  }
  }
  public function    editphoto($fullimage_file,$albumID,$caption,$thumb,$thumblink,$updateid)
  {
       $con =$this->conn;
      $sql = "UPDATE photos SET photoLink='$fullimage_file', albumID='$albumID', caption='$caption', albumthumb='$thumb', thumblink='$thumblink'  WHERE  photoID='$updateid'";
          if (mysqli_query($con, $sql)) {
          return "Record updated successfully";
      } else {
          return  "Error updating record: " . mysqli_error($con);
      }

  }

  public function deletephoto($photoID)
  {
  $con =$this->conn;
  if(!$con)
  {
      return "Connection failed: ". mysqli_connect_error();
  }

  $sql= "DELETE FROM photos WHERE  photoID='$photoID'";
  if(mysqli_query($con,$sql))
  {
       return "Record deleted successfully";
  }
  else {
      return "Error deleting record: ".mysqli_error($con);
  }
  }

}
