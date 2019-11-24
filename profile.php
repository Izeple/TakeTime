<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./script/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <?php require "login.php"; ?>
    <?php //require "signup.php"; ?>
    <?php
    
    if(isset($_SESSION["email"]))
    {
        $email = $_SESSION["email"];
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '".$email."'";
        $result_User = PDOfetchAll($sql)[0];
    }
    ?>
    <title>Profile</title>
</head>
<body>
    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right"><?php echo $result_User["name"]; ?></li>
        </ul>
        <section><img src="./img/Banner.png" style="width:100%">
        <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
            <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
            <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
            <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
        </div>
        </section>
    </div>    
    <center >
        <div class="card1">
        <img src="./img/picdoc.jpg" style="width:100px;"><br>
        <?php echo $result_User['name']; ?> <br>
        <?php echo $result_User['surname']; ?><br>
        <?php echo $result_User['email']; ?><br>
        <?php echo $result_User['tel']; ?><br>
        </div>
    </center>

</body>
</html>
                
                    
     
                 