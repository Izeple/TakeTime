<?php 
 $status = $_REQUEST["status"]; 
$bookid = $_REQUEST["bookid"];
$patient_id = $_REQUEST["userid"];
require "condb.php";
 
$sql = "UPDATE schedule SET notification='$status' WHERE schedule_id='$bookid'AND patient_id='$patient_id'";
 if ($Connect->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
 ?>