<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    require_once("connectPDO.php");
    $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
    $result_User = PDOfetchAll($sql)[0];
} else
    header("location:Homepage.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <title>Booking</title>
</head>

<body>

    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="Homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right"><?php echo $result_User["name"]; ?></li>
        </ul>

        <section><img src="./img/Banner.png" style="width:100%"> 
            <div class="ab" align="center">
                <div id="sidenav" class="sidenav">
                    <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>
                    <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                    <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                    <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
                </div>
            </div>
        </section>
    </div>


    <h1 class="HeadModule">Booking Doctor</h1>
    <h2 onclick="location.replace('./booking_0.php');" class="HeadModule-h2-1">Booking</h2>
    <h2 onclick="location.replace('./booking_0c.php');" class="HeadModule-h2-2">Complete</h2>

    <div class="row" style="margin-left:-20px;">
        <?php
        $status_select = "Complete";
        $i = 0;
        //'".$result_User['patient_id']."'
        $sql = "SELECT * FROM schedule WHERE patient_id = 1";
        $result_Schedule = PDOfetchAll($sql);
        if ($result_Schedule) {
            foreach ($result_Schedule as $row) {
                if ($i % 2 == 0 && $i != 0) {

                    ?>
    </div>
    <div class="row" style="margin-left:-20px;">
    <?php } ?>
    <?php if ($row['status'] == $status_select && $row['status'] == "Complete") { ?>
        <div class="column">
            <div class="card" style="margin-top:60px; margin-left:100px;">
                <div class="side right" align="left">
                    <h4 class="HeadModule-h4-1" style="position: absolute; margin-top:-12px; margin-left:-7px;">Complete</h4>
                    <img src="./img/picdoc.jpg" alt="Avatar" style="width:140px;" class="img2">

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
    </div>

    <center>
        <a href="booking_1.php"><img src='./img/add.jpg' style='width:100px;'><br></a>
    </center>


    <br><br><br><br><br><br><br><br><br><br>





</body>

</html>