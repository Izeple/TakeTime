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

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <title>Booking</title>
    <script type="text/javascript">
        function clickComplete() {
            document.getElementById("booking").style.backgroundColor = "#8c8c8c";
            document.getElementById("Complete").style.backgroundColor = "#f51051";
            var modal = document.getElementById("contentbooking");
            modal.style.display = "none";
            
            var Complete = document.getElementById("contentcomplete");
            Complete.style.display = "block";
       
        }

        function clickbooking() {
            document.getElementById("booking").style.backgroundColor = "#0aa6df";
            document.getElementById("Complete").style.backgroundColor = "#8c8c8c";
            var modal = document.getElementById("contentcomplete");
            modal.style.display = "none";
            
            var booking = document.getElementById("contentbooking");
            booking.style.display = "block";
            console.log("aa");
        }
    </script>
    <style>
        .complete {
            display: none;
        }
        .booking {
            display: block;
        }
    </style>
</head>

<body>

    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right">
                <p class='usern' style='padding: 14px 16px; margin:0; color:#4e707e;'>Hi,<?php echo $result_User["name"]; ?></p>
            </li>
            <li style="float:right"><button class="btn4" id="btn4"><img src="./img/bell.png" height="25"></button></li>
        </ul>

        <section><img src="./img/Banner.png" style="width:100%; height: 305px;">

            <div id="sidenav" class="sidenav">
                <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>
                <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>

        </section>
    </div>


    <div class="HeadModule">
        <font size='6' color="#ffffff">Booking Doctor</font>
    </div>
    <div style="margin-left:240px; margin-top:-67px;">
        <div onclick="clickbooking()" id="booking" style=" width:100px; margin-right:10px;padding:10px; color: #ffffff; background-color: #0aa6df; display :inline-block;">
            <center>
                <font size='5' face="Agency FB">Booking ...</font>
            </center>
        </div>
        <div onclick="clickComplete()" id="Complete" style=" width:100px; padding:10px; color: #ffffff; background-color: #8c8c8c; display  :inline-block;">
            <center>
                <font size='5' face="Agency FB">Complete</font>
            </center>
        </div>
    </div>



    <div  id="contentbooking" class="booking">
    <?php
    $i = 0;
    //'".$result_User['patient_id']."'
    $mysql_qry1 = "SELECT * FROM `schedule` WHERE patient_id = '".$result_User['patient_id']."' AND `status`  = 'Ongoing'";
    $result1 = mysqli_query($Connect, $mysql_qry1);
    $rowcount = mysqli_num_rows($result1);
    if ($rowcount == 0) {
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <center>
        <a href="booking_1.php"><img src='./img/add.png' style='width:100px;'><br></a>
            <p style="color:#a4a4a4;">Create new booking to make an appointment with doctor.</p>
        </center>
    <?php } else {
        ?>
            <div class="row" style="margin-left:-20px;">
                <?php
                    $i = 0;
                    //'".$result_User['patient_id']."'
                    $sql = "SELECT * FROM schedule WHERE patient_id = " . $result_User["patient_id"];
                    $result_Schedule = PDOfetchAll($sql);
                    if ($result_Schedule) {
                        foreach ($result_Schedule as $row) {
                            if ($i % 3 == 0 && $i != 0) {

                                ?>
            </div>
            <div class="row" style="margin-left:-20px;">
            <?php } ?>
            <?php if ($row['status'] == "Ongoing") { ?>
                <div class="column">
                    <div class="card2" style="margin-top:30px; margin-left:80px;">
                        <h4 class="HeadModule-h4-1" style="position: absolute; margin-top:-12px; margin-left:-7px; ">Ongoing</h4>

                        <div class="sideleft">
                            <img src="./img/picdoc.jpg" alt="Avatar" style="width:140px;" class="img2">
                        </div>
                        <div class="sider" align="left">

                            <font size='5' color="#47b6c7">
                                Dr. <?php
                                                    $sql = "SELECT * FROM staff WHERE staff_id = '" . $row['staff_id'] . "'";
                                                    $result_doctor = PDOfetchAll($sql)[0];
                                                    echo $result_doctor['name'], $result_doctor['surname']; ?><br>
                            </font>

                            <font size='3' color="#a4a4a4">
                                <?php $dates = explode(' ', $row['bookingdate']); ?>
                                Date <?php echo $dates[0]; ?><br>
                                Time <?php echo $dates[1]; ?><br>

                                Hospital <?php
                                                            $sql = "SELECT * FROM hospital WHERE hospital_id = '" . $result_doctor['hospital_id'] . "'";
                                                            $result_Hospital = PDOfetchAll($sql)[0];
                                                            echo $result_Hospital['hospital_name'] ?><br>
                            </font>
                            <form style="position: absolute; margin-top:-115px; margin-left:180px;" action="delete_schedule.php" method="POST">
                                <input type="hidden" name="schedule_id" value="<?php echo $row['schedule_id']; ?>" />
                                <input type='submit' class="x" value='x' onclick="return confirm('Are you sure to Delete?')">
                            </form>

                            <form style="position: absolute; margin-left:160px;" action="random-page2.php" method="POST">
                                <input type="hidden" name="schedule_id" value="<?php echo $row['schedule_id']; ?>" />
                                <input type='submit' class="subm" value='Edit'>
                            </form>
                            <br>

                        </div>
                    </div>
                </div>
    <?php
                    $i++;
                }
            }
        }
    }?>
        </div>
            </div>
    
    <div id="contentcomplete" class="complete">
    <?php
    $mysql_qry1 = "SELECT * FROM `schedule` WHERE patient_id = '".$result_User['patient_id']."' AND `status`  = 'Complete'";
    $result1 = mysqli_query($Connect, $mysql_qry1);
    $rowcount = mysqli_num_rows($result1);
    if ($rowcount > 0) {
        ?>

        <div class="row" style="margin-left:-20px;">
            <?php
                $i = 0;
                //'".$result_User['patient_id']."'
                $sql = "SELECT * FROM schedule WHERE patient_id = '".$result_User['patient_id']."'";
                $result_Schedule = PDOfetchAll($sql);
                if ($result_Schedule) {
                    foreach ($result_Schedule as $row) {
                        if ($i % 3 == 0 && $i != 0) {

                            ?>
        </div>
        <div class="row" style="margin-left:-20px;">
        <?php } ?>
        <?php if ($row['status'] == "Complete") { ?>
            <div class="column">
                <div class="card2" style="margin-top:30px; margin-left:80px;">
                <h4 class="HeadModule-h4-1" style="position: absolute; margin-top:-12px; margin-left:-7px; background-color: #f51051    ;">Complete</h4>

                <div class="sideleft">
                    <img src="./img/picdoc.jpg" alt="Avatar" style="width:140px;" class="img2">
                </div>
                    <div class="sider" align="left">

                        <font size='5' color="#47b6c7">
                            Dr. <?php
                                                $sql = "SELECT * FROM staff WHERE staff_id = '" . $row['staff_id'] . "'";
                                                $result_doctor = PDOfetchAll($sql)[0];
                                                echo $result_doctor['name'], $result_doctor['surname']; ?><br>
                        </font>

                        <font size='3' color="#a4a4a4">
                            <?php $dates = explode(' ', $row['bookingdate']); ?>
                            Date <?php echo $dates[0]; ?><br>
                            Time <?php echo $dates[1]; ?><br>

                            Hospital <?php
                                                        $sql = "SELECT * FROM hospital WHERE hospital_id = '" . $result_doctor['hospital_id'] . "'";
                                                        $result_Hospital = PDOfetchAll($sql)[0];
                                                        echo $result_Hospital['hospital_name'] ?><br>
                        </font>
                        <form style="position: absolute; margin-top:-115px; margin-left:180px;" action="delete_schedule.php" method="POST">
                            <input type="hidden" name="schedule_id" value="<?php echo $row['schedule_id']; ?>" />
                            <input type='submit'class="x" value='x' onclick="return confirm('Are you sure to Delete?')">
                        </form>

                        <form style="position: absolute; margin-left:160px;" action="random-page2.php" method="POST">
                            <input type="hidden" name="schedule_id" value="<?php echo $row['schedule_id']; ?>" />
                            <input type='submit' class="subm"value='Edit'>
                        </form>
                        <br>

                    </div>
                </div>
            </div>
<?php
                $i++;
            }
        }
    }
    ?>
<?php
}
?>
</div>
</div>
    
        <div id="logpop" class="login">
            <!-- Modal content -->
            <div class="log-content">
                <span class="close" onclick="document.getElementById('logpop').style.display='none'">&times;</span>
                <div class="sep">
                    <p style="color: #6690a0; font-size:40px; text-align:center; margin:10px;">Login</p>
                </div>
                <form class="user" method="post">
                    <div class="sep">
                        <p>Email</p><span class="required">*</span>
                    </div>
                    <div class="sep"><input type="email" name="email"></div>
                    <div class="sep">
                        <p>Password</p><span class="required">*</span>
                    </div>
                    <div class="sep"><input type="password" name="password"></div>
                    <div class="sep" style="width:50%; display:inline-block;"><input type="checkbox" checked="checked" name="remember"> <a style="font-size:18px;">Remember me</a></div>
                    <div class="sep" style="width:43%; text-align:right; display:inline-block;"><a class="aa" href="#" style="font-size:18px; text-decoration:none;">Forget Password ?</a></div>
                    <div class="sep"><input type="submit" name="login" class="sub" value="Login" /> </div>
                </form>
                <div class="sep" style="margin-top: 1rem; margin-bottom: 1rem;">
                    <div class="line"></div>
                </div>
                <div class="sep"><button class="face">Facebook</button><button class="goog">Google</button></div>
            </div>
        </div>



</body>

</html>