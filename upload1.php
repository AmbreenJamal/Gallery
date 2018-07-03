<?php
include('config.php');
include('SimpleImage.php');
session_start();
//$referer = $_SERVER['HTTP_REFERER'];
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $albumID = mysqli_real_escape_string($conn, $_POST['albumID']);
 $caption = mysqli_real_escape_string($conn, $_POST['caption']);
 $fileToUpload = mysqli_real_escape_string($conn, $_FILES['fileToUpload']['name']);
 $temp_file= $_FILES['fileToUpload']['tmp_name'];
 }
 /*if (file_exists($target_file)) {
     $new_dir="$desired_dir/".$file_name.time();
      rename($file_tmp,$new_dir);
    $uploadOk = 0;
}
else{
    move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
}
    $file_name = $_FILES['images']['name'];
    $file_tmp =$_FILES['images']['tmp_name'];
    $filePath = "img/zoekertjes/";
 if(is_dir("$desired_dir/".$file_name)==false){
       move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
       }else{  // rename the file if another one exist
           $new_dir="$desired_dir/".$file_name.time();
            rename($file_tmp,$new_dir);
       } */
 $fullimage_dir = "";
 $target_file = "";
 //echo "fullimage.........".$fullimage =  orignalfile_upload()."<br/>";
 echo "thumbnail.........".$target_file =  store_uploaded_image($fileToUpload, 200, 100);
 function store_uploaded_image($fileToUpload,$new_img_width, $new_img_height) {

    $target_dir = "thumbnail/";
    $target_file = $target_dir.basename($fileToUpload);
    $fullimage_dir = "uploads/";
    $fullimage_file = $fullimage_dir.basename($fileToUpload);

    $image = new SimpleImage();
    $image->load($_FILES['fileToUpload']['tmp_name']);
    $image->save($fullimage_file);
    $image->resize($new_img_width, $new_img_height);
    $image->save($target_file);
    return $target_file; //return name of saved file in case you want to store it in you database or show confirmation message to user

}
function orignalfile_upload()
{
    $fullimage_dir = "uploads/";
    $fullimage_file = $fullimage_dir.basename($_FILES['fileToUpload']['name']);

    $uploadOk = 1;
     $imageFileType = pathinfo($fullimage_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo  "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            return "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($fullimage_file)) {
        return  "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        return "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return  "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fullimage_file)) {
            return "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }



}
/*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        //$strQry="insert into table(photo) values('".$filename."')";
        $sql =  "INSERT INTO photos (photoLink,albumID,caption,userID,albumthumb)
        VALUES ('$target_file','$albumID','$caption',1,'$target_file')";
         if ($conn->query($sql) === TRUE) {
                header("Location:mytest.php?success=The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. !");
                exit;
            }
    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
} */
?>
