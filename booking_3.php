<?php 
    session_start();
    if(isset($_SESSION["email"]))
    {
        $email = $_SESSION["email"];
        require_once("connectPDO.php");
        $sql = "SELECT * FROM patient WHERE email = '".$email."'";
        $result_User = PDOfetchAll($sql)[0];
        $_SESSION['patient_id'] = $result_User["patient_id"];
    }
    else
        header("location:Homepage.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc2.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <title>Booking</title>
</head>
<body>
            <div id="sidenav" class="sidenav">
                <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>
                <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>

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

        <section><img src="./img/Banner.png" style="width:100%">
        <div class="ab" align="center">
        </div>
        
        </section>
    </div>  

    <h1 class="HeadModule">Booking Doctor</h1>
    <div class="ccard" style=margin-left:120px;>
        <img src="./img/picdoc.jpg" alt="Avatar" style="width:140px;" class="img2">
            <font size='5' color="#47b6c7"> 
                Dr. <?php  
                $sql = "SELECT * FROM staff WHERE staff_id = '".$_SESSION['staff_id']."'";
                $result_doctor = PDOfetchAll($sql)[0];
                echo $result_doctor['name'],$result_doctor['surname'];?><br>
            </font>

            <font size='3' color="#a4a4a4">
            Department : <?php  
            $sql = "SELECT * FROM department WHERE department_id = '".$result_doctor['department_id']."'";
            $result_Department = PDOfetchAll($sql)[0];
            echo $result_Department['department_name']?><br>

            Hospital : <?php  
            $sql = "SELECT * FROM hospital WHERE hospital_id = '".$result_doctor['hospital_id']."'";
            $result_Hospital = PDOfetchAll($sql)[0];
            echo $result_Hospital['hospital_name']?><br>
        </font><br>    
 

        <font size='5' color="#a4a4a4">
            Date : <?php echo $_POST["date"];
                    $date = str_replace('/', '-',  $_POST["date"]);
                    $_SESSION["date"] = date("Y-m-d", strtotime($date));
                    echo $_SESSION["date"];
                    
                    ?><br>
            Time : <?php echo $_POST["times"]; 
                    $_SESSION["times"]=$_POST["times"];?><br>
        </font>

        <form action="insert_schedule.php" method="post" id="usrform">
            <input type="checkbox" name="chkColor1" value="Noti">Notification
            
        </form>

        <div style="margin-left:420px; margin-top:-100px;">
            Symptom Detail<br>
            <textarea name="detail" rows="10" cols="40" form="usrform"></textarea><br>
        </div>
    </div>
    <div style="margin-left:650px;">
    <form action="./booking_0.php" method="post" id="usrform">
        <button name="edit" value="0">Cancel</button>
        <input type="submit" form="usrform" value="Comfirm">
    </form>
    </div>


    <br><br><br><br><br>
</body>
</html>
