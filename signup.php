<?php
//session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //require_once("connectPDO.php");
    //$pdo = conPDO();
    //$stmt = $pdo->query('SELECT * FROM patient');
    //$row_count = $stmt->rowCount();

    $patientid = 4;
    $name = $_POST["name"];
    $surname = $_POST["surname"]; 
    $dob = $_POST["dob"]; 
    $id_card = $_POST["IDcard"]; 
    $email = $_POST["email"]; 
    $password = $_POST["password"]; 
    $address = $_POST["address"]; 
    $tel = $_POST["Tel"]; 

    $sql = "INSERT INTO patient VALUES ('$patientid','$name','$surname','$dob','$id_card','$tel','$address','$email','$password')";
    
    $result = $conn->prepare($sql);
    $result->execute();
    }
catch(PDOException $sql)
    {
         echo $sql."<br>".$e->getMessage();
    }

$conn = null;
?>