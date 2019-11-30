<?php 

$status= $_REQUEST["status"];
$medicid = $_REQUEST["medicid"];
$patient_id = $_REQUEST["userid"];
require "condb.php";
 
$sql = "UPDATE Notification SET status='$status' WHERE medicine_id='$medicid'AND patient_id='$patient_id'";
 if ($Connect->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
 ?>