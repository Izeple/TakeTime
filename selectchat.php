<?php
$staffid = $_REQUEST['staffid'];
require "condb.php";
$mysql_qry1 = "SELECT * FROM `consult` WHERE `staff_id`= '" . $staffid . "' AND `patient_id` = '1'";
$result1 = mysqli_query($Connect, $mysql_qry1);
while ($row12 =  $result1->fetch_assoc()) {
$img = $row12['img'];
echo "<div >
                <div>
                    <img src='./img/man.png' style='width:75px; margin-top: 15px; float: right; margin-right: 8px;'>
                    <div style='width:350px; margin-top: 6px; float: right; margin-right: 10px;  margin-top: 15px; background-color: #dffbff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;'>
                        <font size='3' color='#6e6e6e' face='[supermarket]'>
                            <br>";
                            echo $row12['consult_detail'];
                         
echo "                      <br>
                            <br>
                            How long? :"; echo "&nbsp;"; echo $row12['howlong']; echo "&nbsp;"; echo $row12['unitlong'];
echo "                      <br>
                            How often? :";  echo "&nbsp;";echo $row12['often']; 
echo "                      <br>

                        </font>
                    </div>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br>";
                    if($img != '-')
                    {
echo"                <img src='./uploads/";echo $row12['img'];  echo"' style='width:150px; margin-top: 15px; float: right; margin-right: 90px;'>";}
echo"                </div>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <br><br>
                <div>";
                $ans = $row12['answer'];
                if($ans != "")
                {
 echo"              <img src='./img/picdoc.png' style='width:75px; margin-top: 15px; float: left; margin-right: 8px;'>
                    <div style='width:350px; margin-top: 6px; float: left; margin-right: 10px;  margin-top: 15px; background-color: #ffffff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;'>
                        <font size='3' color='#6e6e6e' face='[supermarket]'>
                            <br>";
                            echo $row12['answer'];
 echo"                       </font>
                    </div>";
                }
echo"               <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br>
                </div>
</div>";
}
?>