<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $patient_id =  $_SESSION["patient_id"];
    $staff_id = $_SESSION['staff_id'];
    $bookingdate = $_SESSION["date"]." ".$_SESSION["times"];
    $detail = $_POST["detail"]; 
    $status = "Going on"; 

    $sql = "INSERT INTO schedule VALUES ('','$patient_id','$staff_id',NULL,'$bookingdate','$detail','$status')";
    
    $result = $conn->prepare($sql);
    $result->execute();
    }
catch(PDOException $e)
    {
         echo $sql."<br>".$e->getMessage();
    }
$conn = null;
header("location:booking_0.php");
?>