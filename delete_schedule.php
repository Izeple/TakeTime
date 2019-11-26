
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM schedule WHERE schedule_id=".$_POST["schedule_id"];
    $result = $conn->prepare($sql);
    $result->execute();
    }
catch(PDOException $e)
    {
        echo $sql."<br>".$e->getMessage();
    }
$conn = null;
echo "<script language=\"JavaScript\">";
echo 'location.replace("./booking_0.php");';
echo "</script>";
?>