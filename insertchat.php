<?php
require "condb.php";
$describe = $_POST["describe"];
$long = $_POST["long"];
$unitlong = $_POST["unitlong"];
$often = $_POST["often"];
$CardNumber1 = $_POST["CardNumber1"];
$CardNumber2 = $_POST["CardNumber2"];
$CardNumber3 = $_POST["CardNumber3"];
$CardNumber4 = $_POST["CardNumber4"];
$CardNumber4 = $_POST["CardNumber4"];
$MonthExpiredDate = $_POST["MonthExpiredDate"];
$MonthExpiredYear = $_POST["MonthExpiredYear"];
$CVV = $_POST["CVV"];
echo $describe;
echo $long;
echo $unitlong;
echo $often;
echo $CardNumber1;
echo $CardNumber2;
echo $CardNumber3;
echo $CardNumber4;
echo $CardNumber4;
echo $MonthExpiredDate;
echo $MonthExpiredYear;
echo $CVV;
$target_dir = "C:\AppServ\www\se\uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
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
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . "chatid." . $imageFileType)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
