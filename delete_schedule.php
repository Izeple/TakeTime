
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $EmployeeID = $_SESSION["EmployeeID_List"];
    $sql = "DELETE FROM educationhistory WHERE ED_NO=$EDNO AND EmployeeID=$EmployeeID";
    $result = $conn->prepare($sql);
    $result->execute();
    $_SESSION["success"] = "success";
    }
catch(PDOException $e)
    {
        echo $sql."<br>".$e->getMessage();
        $_SESSION["success"] = $sql."<br>".$e->getMessage();
    }
$conn = null;
echo "<script language=\"JavaScript\">";
echo 'location.replace("./booking_0.php");';
echo "</script>";
?>