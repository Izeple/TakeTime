<?php
require "condb.php";
$timeNoti1 = $_POST["hmorn"].':'.$_POST["mmorn"].':00';
$timeNoti2 = $_POST["heven"].':'.$_POST["meven"].':00';
$timeNoti3 = $_POST["hsun"].':'.$_POST["msun"].':00';
$timeNoti4 = $_POST["hnight"].':'.$_POST["mnight"].':00';
$status=$_POST['status_Noti'];
$staff=$_POST['staff_id'];
$user=$_POST['partient_id'];
$times=$_POST['remaining_time'];
$medic=$_POST['medicine_id'];


$mysql_qryCount1="SELECT COUNT(*) AS count FROM `notification`n JOIN history_medicine hi ON n.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id AND s.patient_id =$user AND n.medicine_id = $medic AND n.staff_id = $staff";
			$countResult = mysqli_query($Connect, $mysql_qryCount1);
			$count = $countResult->fetch_assoc();

//Insert Notification if it first times
if($count['count']==0){
	 $sql = "INSERT INTO notification (notification_time,message,status,staff_id,patient_id,remaining_time,medicine_id)
VALUES
('$timeNoti1','morning','$status','$staff','$user','$times','$medic'),
('$timeNoti2','afternoon','$status','$staff','$user','$times','$medic'),
('$timeNoti3','evening','$status','$staff','$user','$times','$medic'),
('$timeNoti4','night','$status','$staff','$user','$times','$medic')";
        if ($Connect->query($sql) === TRUE) {
			header("location:Notification.php");
        } else {
            echo "Error: " . $sql . "<br>" . $Connect->error;
		}
}
//Update Notification 
else if($count['count']>0){
	$update1 = "UPDATE Notification SET notification_time='$timeNoti1' WHERE medicine_id= '$medic' AND patient_id= '$user' AND staff_id = '$staff' AND message LIKE 'morning' ";
	$update2 = "UPDATE Notification SET notification_time='$timeNoti2' WHERE medicine_id= '$medic' AND patient_id= '$user' AND staff_id = '$staff' AND message LIKE 'afternoon' ";
	$update3 = "UPDATE Notification SET notification_time='$timeNoti3' WHERE medicine_id= '$medic' AND patient_id= '$user' AND staff_id = '$staff' AND message LIKE 'evening' ";
	$update4 = "UPDATE Notification SET notification_time='$timeNoti4' WHERE medicine_id= '$medic' AND patient_id= '$user' AND staff_id = '$staff' AND message LIKE 'night' ";
 	if ($Connect->query($update1) === TRUE&&$Connect->query($update2) === TRUE&&$Connect->query($update3) === TRUE&&$Connect->query($update4) === TRUE) {
		header("location:Notification.php");
	} 
	else {
    	echo "Error: " . $update1 . "<br>" . $Connect->error;
	}
}
//ERROR
else{
	echo "Has some error count:"+$count['count'];
}
?>
