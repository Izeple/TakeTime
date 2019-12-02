<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    require_once("connectPDO.php");
    $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
    $result_User = PDOfetchAll($sql)[0];
} else {
    header("location:Homepage.php");
}
if(isset($_SESSION["edit"]))
    if ($_SESSION["edit"] == 1 && !isset($_POST["edit"])) {
        $_SESSION["edit"] = 0;
        header("location:delete_schedule.php");
    }

?>
<?php
$staffid = $_REQUEST['staffid'];
$name = $_REQUEST['name'];
$surname = $_REQUEST['surname'];
require "condb.php";
$mysql_qry1 = "SELECT * FROM consult c JOIN patient p ON c.patient_id = p.patient_id WHERE c.staff_id = '" . $staffid . "' AND c.patient_id ='".$result_User['patient_id']."'";
$result1 = mysqli_query($Connect, $mysql_qry1);
echo "<div class='barchat'>
&nbsp;&nbsp;<img src='./img/picdoc.png' style='width:60px; margin-top: 3px; float: left; margin-left: 8px;'> <br>
&nbsp;&nbsp;<font size='6' color='#ffffff' face='Agency FB'>Dr.";echo " ".$name." ".$surname ; echo "</font>
<span class='close' onclick='closechat()'>x</span>
</div>
<div class='card1'>";
while ($row12 =  $result1->fetch_assoc()) {
$img = $row12['img'];
echo "<div>
                <div>
                    <img src='./uploads/";echo $row12['picture']; echo "' style='width:75px; margin-top: 15px; float: right; margin-right: 8px;'>
                    <div style='width:350px; margin-top: 6px; float: right; margin-right: 10px;  margin-top: 15px; background-color: #dffbff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;'>
                        <font size='3' color='#6e6e6e' face='[supermarket]'>
                            <br>";
                            echo $row12['consult_detail'];
                         
echo "                      <br>
                            <br>
                            How long? :"; echo "&nbsp;"; echo $row12['time frame'];
echo "                      <br>
                            How often? :";  echo "&nbsp;";echo $row12['often']; 
echo "                      <br>

                        </font>
                    </div>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br>";
                    if($img != '-')
                    {
echo"                <img src='./uploads/";echo $row12['img'];  echo"' style='width:150px; margin-top: 15px; float: right; margin-right: 90px;'>";}
echo"                </div>
                <div>";
                $ans = $row12['answer'];
                if($ans != "")
                {
 echo"              <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                        <br><br> <img src='./img/picdoc.png' style='width:75px; float: left; margin-right: 8px;'>
                    <div style='width:350px; margin-top: 6px; float: left; margin-right: 10px;  margin-top: 15px; background-color: #ffffff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;'>
                        <font size='3' color='#6e6e6e' face='[supermarket]'>
                            <br>";
                            echo $row12['answer'];
 echo"                       </font><br>";
                            $star = $row12['star'];
                            if($star == 0)
                            {
echo"                       <span id='star1' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
                            if($star == 1)
                            {
echo"                       <span id='star1' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
                            if($star == 2)
                            {
echo"                       <span id='star1' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
                            if($star == 3)
                            {
echo"                       <span id='star1' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
                            if($star == 4)
                            {
echo"                         <span id='star1' class='fa fa-star-o' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
                            if($star == 5)
                            {
echo"                       <span id='star1' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star1("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star2' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star2("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star3' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star3("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star4' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star4("; echo $row12['consult_id']; echo ")'></span>
                            <span id='star5' class='fa fa-star' style=' float: right; color: #efce4a;' onclick='star5("; echo $row12['consult_id']; echo ")'></span>";
                            }
echo                        "</div>";
                }
echo"               <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                
                </div>
</div>";
}
echo "   
<form action='chat.php' method='POST'>
    <input type='submit' class='buttonconfirm' value='Tap to chat'>
    </div>
    ";
    
?>