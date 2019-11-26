<?php 
$schedule_id = $_POST["booking_id"];
require_once("connectPDO.php");
echo $schedule_id;
$sql = "SELECT * FROM schedule WHERE schedule_id = '".$schedule_id."'";
$result_schedule = PDOfetchAll($sql)[0];

$id = $result_schedule["staff_id"]; 
echo $id;
?>

    <html>
      <form id='form1' name='myform' action='booking_2.php' method='POST' >
        <input type='text' value='<?php echo $id; ?>' name='id' hidden />
        <input type='submit' name='myform' />
      </form>


      
    </html>