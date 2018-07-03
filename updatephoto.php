<?php
include('SimpleImage.php');
include('config.php');
session_start();
$newobj= new myDB;
//$referer = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $albumID = mysqli_real_escape_string($newobj->conn, $_POST['albumID']);
    $caption = mysqli_real_escape_string($newobj->conn, $_POST['caption']);
    $fileToUpload = mysqli_real_escape_string($newobj->conn, $_FILES['fileToUpload']['name']);
    $updateid =mysqli_real_escape_string($newobj->conn, $_POST['photoID']);
    $photoLink = mysqli_real_escape_string($newobj->conn, $_POST['photoLink']);
    $thumblink =mysqli_real_escape_string($newobj->conn, $_POST['thumblink']);
    $albumthumb =mysqli_real_escape_string($newobj->conn, $_POST['albumthumb']);
}
 // echo $updateid =mysqli_real_escape_string($conn,$_POST['updateid'] );
 //else echo "id is emty do pass id";
//exit;
 // Check if image file is a actual image or fake image
if (empty($_FILES["fileToUpload"]["tmp_name"])) {
        $message=$newobj-> editphoto("$photoLink", $albumID, $caption, $albumthumb, $thumblink, $updateid);
    header("location: home.php?success=$message");
} else {
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $fullimage_dir = "uploads/";
            $fullimage_file = $fullimage_dir.basename($fileToUpload);
            //echo "fullimage.........".$fullimage =  orignalfile_upload()."<br/>";
            if (file_exists($fullimage_file)) {
                $min_rand=mt_rand(0, 1000);
                $max_rand=mt_rand(1000000000, mt_getrandmax());
                $name_file=mt_rand($min_rand, $max_rand);//this part is for creating random name for image

                // $ext=end(explode(".", $fileToUpload));//gets extension
                $tmp = explode(".", $fileToUpload);
                $extension = end($tmp);
                $fileToUpload=$name_file.".".$extension;
                $temp_file= $_FILES['fileToUpload']['tmp_name'];
                $thumb=  store_uploaded_image($fileToUpload, $temp_file, 200, 100);
                $uploadOk = 0;
                $message=$newobj->editphoto("uploads/$fileToUpload", $albumID, $caption, $albumthumb, $thumb, $updateid);
                header("location: home.php?success=$message"); // redirects the user to the add photos page
                exit;
            } else {
                $temp_file= $_FILES['fileToUpload']['tmp_name'];
                $thumb= store_uploaded_image($fileToUpload, $temp_file, 200, 100);
                $message=$newobj->editphoto($fullimage_file, $albumID, $caption, $albumthumb, $thumb, $updateid);
                header("location: home.php?success=$message");
                exit;
            }
        } else {
            header("location: add_photos.php?message=please select an image.");
            exit;
        }
    }
}


 function store_uploaded_image($fileToUpload, $temp_file, $new_img_width, $new_img_height)
 {
     $thumb_dir = "thumbnail/";
     $thumb_file = $thumb_dir.basename($fileToUpload);
     $image = new SimpleImage();
     $image->load($temp_file);
     $image->save('uploads/'.basename($fileToUpload));
     $image->resize($new_img_width, $new_img_height);
     $image->save($thumb_file);
     return $thumb_file; //return name of saved file in case you want to store it in you database or show confirmation message to user
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
