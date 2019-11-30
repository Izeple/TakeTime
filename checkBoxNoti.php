<?php 
 $status = $_REQUEST["status"];
$medicid = $_REQUEST["medicid"];
require "condb.php";
 
$sql = "UPDATE Notification SET status='".$status."' WHERE medicine_id='".$medicid."'";
 if ($Connect->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
 ?>