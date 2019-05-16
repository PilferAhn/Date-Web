<?php
include("../../config/database.php");
include('../../server/server.php');

$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (is_null($target_file)){

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
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    echo "Sorry this file name already exists please rename the photo and try again or choose another photo";
    echo "To try again click ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" ){
    echo "Sorry, only JPG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    ?>
        <a>File could not be uploaded click </a>
        <a href="../../profile_picture.php";>here</a>
        <a> To go back</a>
        <?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $rand = rand(100000,999999);
        $newname = ("$rand.$file[1]jpg");
        rename($target_file ,$newname);
        echo "session".$_SESSION['email'];
        $sql = sprintf("UPDATE users SET profile_image = '%s' WHERE email =  '%s'" ,mysqli_real_escape_string($connection, $newname),mysqli_real_escape_string($connection, $_SESSION["email"]));
        mysqli_query($connection, $sql);
        
        header("Location: ../../setting.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo "To try again click ";
        ?>
        <br>
        <a>File could not be uploaded click </a>
        <a href="../../profile_picture.php";>here</a>
        <a> To go back</a>
        <?php
    }
}
}else{
    ?>
        <a>No File selected click </a>
        <a href="../../profile_picture.php";>here</a>
        <a> to go back</a>
        <?php
}
?>