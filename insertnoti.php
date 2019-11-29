<?php
require "condb.php";
$timeNoti1 = $_POST["hmorn"].':'.$_POST["mmorn"].':00';
$timeNoti2 = $_POST["heven"].':'.$_POST["meven"].':00';
$timeNoti3 = $_POST["hsun"].':'.$_POST["msun"].':00';
$timeNoti4 = $_POST["hnight"].':'.$_POST["mnight"].':00';
 $sql = "INSERT INTO notification (notification_time,status,staff_id,partient_id,remaining_time,medicine_id)
VALUES
('$timeNoti1','1','$_POST[staff_id]','$_POST[partient_id]','$_POST[remaining_time]','$_POST[medicine_id]'),
('$timeNoti2','1','$_POST[staff_id]','$_POST[partient_id]','$_POST[remaining_time]','$_POST[medicine_id]'),
('$timeNoti3','1','$_POST[staff_id]','$_POST[partient_id]','$_POST[remaining_time]','$_POST[medicine_id]'),
('$timeNoti4','1','$_POST[staff_id]','$_POST[partient_id]','$_POST[remaining_time]','$_POST[medicine_id]')";
        if ($Connect->query($sql) === TRUE) {
			header('Location: Notification.php');
            // header("location: car.php");
        } else {
           // echo "Error: " . $sql . "<br>" . $Connect->error;
		}
echo $_POST["hmorn"];
?>

</body>

</html>