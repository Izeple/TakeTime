<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

$Connect = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($Connect,"utf8");
if ($Connect->connect_error)
{
	die("Connection failed: ". $Connect->connect_error);
}
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./script/clickNav.js"></script>
    <title>Homepage</title>
</head>
<body>

    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="#news"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn" id="btn">Sign up</button></li>
            <li style="float:right"><button class="btn2" id="btn2">Log in</button></li>
        </ul>
            

        <section><img src="./img/Banner.png" style="width:100%">
        <div class="ab" align="center">
        <div class="quickmenu">
                <div class="quicklist"><img src="./img/quickcon.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>
                <div class="quicklist"><img src="./img/quickcon2.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>
                <div class="quicklist"><img src="./img/quickcon3.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>
        </div>

        <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
            <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
            <div class="sidein"><a href="booking.php"><img src="img/time.png" height="30"></a></div>
            <div class="sidein"><a href="test.php"><img src="img/noti.png" height="30"></a></div>
        </div>



                
        </div>
            <div class="bignew" align="center">
                    <p style="color: #6690a0; margin-left:-60%; margin-bottom: 0%; margin-top:10%; font-size:60px;">News</p>

                    <div class="New"><img src="./img/New1.png" width="350px"></div>
                    <div class="New"><img src="./img/New2.png" width="350px"></div>
                    <div class="New"><img src="./img/New3.png" width="350px"></div>

            </div>
        </section>
    </div>    

    

    <div id="logpop" class="login">
            <!-- Modal content -->
            <div class="log-content">
              <span class="close">&times;</span>
              <p   style="color: #6690a0; font-size:40px; text-align:center; margin:10px;">Login</p>
                
                <a>Email</a>
                <br>
              <input type="email" name="Email"><br>
              <a>Password</a>
                <br>
              <input type="password" name="Password" >


            </div>
    </div>



</body>
</html>
