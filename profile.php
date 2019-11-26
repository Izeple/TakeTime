<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/profile2.css">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
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
            <li style="float:right"><p class='usern'style='padding: 14px 16px; margin:0; color:#4e707e;'>Hi,<?php echo $result_User["name"]; ?></p></li>
            <li style="float:right"><button class="btn4" id="btn4" ><img src="./img/bell.png" height="25"></button></li>
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
    <div class="boxe">
        <div class="hpro">Profile</div>
        <div class="Profile">
            <div class="leftpro">
                <img src="./img/man.png" class="picpro" >
                <img src="./img/cam.jpg" class="pichov" >
            </div>
        <div class="rightpro">
           <p style="font-size:28px; color:#47b6c7; margin-top:10px;margin-bottom:10px;"> <?php echo $result_User['name']; ?> <?php echo $result_User['surname']; ?></p>
           <div style="height:0.75px; background:grey;"></div>
           <p class="tl"> Email</p>
           <p class="tr"> : <?php echo $result_User['email']; ?></p>
           <p class="tl"> ID Card</p>
           <p class="tr"> : <?php echo $result_User['id_card']; ?></p>
           <p class="tl"> Telephone</p>
           <p class="tr"> : <?php echo $result_User['tel']; ?></p>
           <p class="tl"> Address</p>
           <p class="tr"> : <?php echo $result_User['address']; ?></p>
           <p class="tl"> Date of birth</p>
           <p class="tr"> : <?php echo $result_User['dob']; ?></p>
            <img onclick="document.getElementById('propop').style.display='block'" class="edit"style="border-radius:0px 0px 5px 0px; width:10%"src="./img/edit.png">
        </div>
        </div>
    </div>

    <div id="propop" class="login">
            <!-- Modal content -->
                <div class="propop">
                <div class="hpro">Profile</div>
                    <div class="Profile">
                            <div class="leftpro">
                                <img src="./img/man.png" class="picpro" >
                                <img src="./img/cam.jpg" class="pichov" >
                            </div>
                            <div class="rightpro">
                            <p style="font-size:28px; color:#47b6c7; margin-top:10px;margin-bottom:10px;"> <?php echo $result_User['name']; ?> <?php echo $result_User['surname']; ?></p>
                            <div style="height:0.75px; background:grey;"></div>
                            <p class="tl"> Email</p>
                            <p class="tr"> : <input class="ip" type="email" value="<?php echo $result_User['email']; ?>"></p>
                            <p class="tl"> ID Card</p>
                            <p class="tr"> : <input class="ip" type="email" value="<?php echo $result_User['id_card']; ?>"></p>
                            <p class="tl"> Telephone</p>
                            <p class="tr"> : <input class="ip" type="email" value="<?php echo $result_User['tel']; ?>"></p>
                            <p class="tl"> Address</p>
                            <p class="tr"> : <input class="ip" type="email" value="<?php echo $result_User['address']; ?>"></p>
                            <p class="tl"> Date of birth</p>
                            <p class="tr"> : <input class="ip" type="email" value="<?php echo $result_User['dob']; ?>"></p>
                            <center><button class="save"style="display:inline-block; margin:3px;">Save</button><button class="cancel" style="display:inline-block">Cancel</button></center>
                            </div>
                    </div>
                </div>
                </div>
    </div>

</body>
</html>
                
                    
     
                 