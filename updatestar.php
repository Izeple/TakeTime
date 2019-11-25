<?php 
 $consult_id = $_REQUEST["consult_id"];
 $star = $_REQUEST["star"];
 require "condb.php";
 
 $sql = "UPDATE `consult` SET star='" . $star . "' WHERE `consult_id` = '" . $consult_id . "'";
 if ($Connect->query($sql) === TRUE) {
    header("location: modify.php");
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
 ?>
