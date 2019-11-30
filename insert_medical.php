<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $patient_id =  $_POST["patient_id"];
    $medicine_id = $_POST["medicine_id"];

    $sql = "INSERT INTO allergy_medicine VALUES ('$patient_id','$medicine_id','แพ้')";

    $result = $conn->prepare($sql);
    $result->execute();
    }
catch(PDOException $e)
    {
         echo $sql."<br>".$e->getMessage();
    }
$conn = null;
//header("location:profile.php");
?>