<?php 
session_start();

$schedule_id = $_POST["booking_id"];
$_SESSION["schedule_id"]=$schedule_id;
require_once("connectPDO.php");
$sql = "SELECT * FROM schedule WHERE schedule_id = '".$schedule_id."'";
$result_schedule = PDOfetchAll($sql)[0];
$id = $result_schedule["staff_id"]; 
?>

    <html>
      <form id='form1' name='myform' action='booking_2.php' method='POST' >
        <input type='text' value='<?php echo $id; ?>' name='id' hidden />
        <input type='submit' name='myform' />
      </form>

      <script type="text/javascript">
        document.getElementById('form1').submit(); // SUBMIT FORM
      </script>
     
    </html>