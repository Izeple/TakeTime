
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

$patient_id = $_POST["patient_id"];
$medicine_id = $_POST["medicine_id"];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM allergy_medicine WHERE medicine_id=".$medicine_id." AND patient_id = ".$patient_id;
    $result = $conn->prepare($sql);
    $result->execute();
    }
catch(PDOException $e)
    {
        echo $sql."<br>".$e->getMessage();
    }
$conn = null;
echo "<script language=\"JavaScript\">";
echo 'location.replace("./profile.php");';
echo "</script>";
?>