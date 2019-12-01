<head>
    <script type="text/javascript">
        function image(img) {
            window.open('selectdoc.php',"_self");
        }
    </script>
     <style>
      .bar {
            width: 180px;
            background-color: #47b6c7;
            position: absolute;
            margin-top: -30px;
            padding: 10px;
        }
        </style>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
<body >
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
    <div class="bar">
                <font size='6' color="#ffffff" face="Agency FB"> Consult Doctor</font>
            </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <img src="img/add.png" height="150" size="150" onclick="image(this)">
        <br>
        <font face="verdana" color="#a4a4a4" size="4">
            Create new consult to make a conversation with doctor.
        </font>
    </center>
</body>

</html>