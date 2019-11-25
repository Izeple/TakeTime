<?php 
    session_start();
    if(isset($_SESSION["email"]))
    {
        $email = $_SESSION["email"];
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '".$email."'";
        $result_User = PDOfetchAll($sql)[0];
    }
    else
        header("location:Homepage.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">

    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src="js/index.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
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

    <?php 
        if(!isset($_POST['myform'])){
            $id = $_POST['id'];
            //echo $id;
          }
        $_SESSION['staff_id'] = $id;
        $_SESSION["date"] = 2019-11-27;
    ?>


    <div style="margin-left:250px;  width:70%; background-color:#d3d3d3;">

        <div class='datepicker' style="margin-left:20px;"></div>
        <div style="margin-left:50%; margin-top:-480px; background-color:#cacaca; width:25%;  padding: 35px;">
            <font size="4px">
                Select Time <br>
                <form id="formid" action="booking_3.php" method="POST">
                    <input type="radio" name="times" value="08:30:00"> 08:30 - 09:00 <br>
                    <input type="radio" name="times" value="09:30:00"> 09:30 - 10:00 <br>
                    <input type="radio" name="times" value="09:30:00"> 10:30 - 11:00 <br>
                    <input type="radio" name="times" value="09:30:00"> 11:30 - 12:00 <br>
                    <input type="radio" name="times" value="09:30:00"> 12:30 - 13:00 <br>
                    <input type="radio" name="times" value="09:30:00"> 13:30 - 14:00 <br>
                    <input type='submit' value='Select' name='submit'>
                </from>
            </font>
        </div>
    </div>
<?php //if($role!="Admin") echo "disabled" ?> 

</body>
</html>

