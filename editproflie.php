<?php
$patientid = $_POST["patientid"];
$email = $_POST["email"];
$idcard = $_POST["idcard"];
$tel = $_POST["tel"];
$address = $_POST["address"];
$dob = $_POST["dob"];
require "condb.php";
$target_dir = "C:\AppServ\www\SE2\uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $sql = "UPDATE `patient` SET email ='" . $email . "',id_card = '" . $idcard . "',tel= '" . $tel . "',addresspatient =  '" . $address . "',dob ='" . $dob . "',picture='man.png' WHERE `patient_id` = '" . $patientid . "'";
}
    else {
    $t=time();
    $newname = $t .date("Ymd",$t);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir .  $newname  . $imageFileType)) {
        $namefile = $newname . "." . $imageFileType;
        echo $namefile;
        $sql = "UPDATE `patient` SET email ='" . $email . "',id_card = '" . $idcard . "',tel= '" . $tel . "',addresspatient =  '" . $address . "',dob ='" . $dob . "',picture='" . $namefile . "' WHERE `patient_id` = '" . $patientid . "'";
        if ($Connect->query($sql) === TRUE) {
            header("location: ./profile.php");
        } else {
            echo "Error: " . $sql . "<br>" . $Connect->error;
        }
    } 

}
?>
