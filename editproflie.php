<?php 
 $patientid = $_POST["patientid"];
 $email = $_POST["email"];
 $idcard = $_POST["idcard"];
 $tel = $_POST["tel"];
 $address = $_POST["address"];
 $dob = $_POST["dob"];
 require "condb.php";
 $sql = "UPDATE `patient` SET email ='" . $email . "',id_card = '" . $idcard . "',tel= '" . $tel . "',address =  '" . $address . "',dob ='" . $dob . "' WHERE `patient_id` = '" . $patientid . "'";
 if ($Connect->query($sql) === TRUE) {
    header("location: ./profile.php");
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
 ?>
