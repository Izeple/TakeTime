<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "softeng";

$Connect = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($Connect,"utf8");
if ($conn->connect_error)
{
	die("Connection failed: ". $conn->connect_error);
}

?>