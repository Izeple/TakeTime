
<!DOCTYPE html>
<html><head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <?php require "login.php"; ?>
    <?php
    if(isset($_SESSION["email"]))
    {
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '".$_SESSION["email"]."'";
        $result_User = PDOfetchAll($sql)[0];
        $_SESSION["userid"] = $result_User["patient_id"];
    }
    ?>
    <title>Homepage</title>
   
</head>
<body>

    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn" id="btn" onclick="document.getElementById('signpop').style.display='block'">Sign up</button></li>
            <li style="float:right"><button class="btn2" id="btn2" onclick="document.getElementById('logpop').style.display='block'">Log in</button></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>

            <li style="float:right">
            <?php if(isset($_SESSION["email"])) {  
                echo "<p class='usern'style='padding: 14px 16px; margin:0; color:#4e707e;' onclick=location.replace('./profile.php');>Hi, ".$result_User["name"]."</p>"; 
            }?>
            </li>        
            
            <li style="float:right"><button class="btn4" id="btn4" ><img src="./img/bell.png" height="25"></button></li>
            
            <?php if(isset($_SESSION["email"])) {  
                
                echo "<script language=\"JavaScript\">";
                echo "document.getElementById('btn').style.display='none';";
                echo "document.getElementById('btn2').style.display='none';";
                echo "</script>";
            }
            else {
                echo "<script language=\"JavaScript\">";
                echo "document.getElementById('btn3').style.display='none';";
                echo "document.getElementById('btn4').style.display='none';";
                echo "</script>";   
            }
            ?>
            

        </ul>
            

        <section><img src="./img/Banner.png" style="width:100%">
        <div class="ab" align="center">
        <div class="quickmenu">
                <div class="quicklist"><a href="selectdoc.php"><img src="./img/quickcon.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a></div>
                <div class="quicklist"><a href="booking_0.php"><img src="./img/quickcon2.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a></div>
                <div class="quicklist"><a href="finddoc.php"><img src="./img/quickcon3.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></a></div>
        </div>


        <?php if(isset($_SESSION["email"])) { 
            echo '<div id="sidenav" class="sidenav">';
            echo '    <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>';
            echo '    <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>';
            echo '   <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>';
            echo '    <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>';
            echo '</div>';
        }
        else
        {
            echo '<div id="sidenav" class="sidenav">';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/user.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/help.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/time.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/noti.png" height="30"></a></div>';
            echo '</div>';
        }
        ?>

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
              <span class="close" onclick="document.getElementById('logpop').style.display='none'">&times;</span>
              <div class="sep"><p style="color: #6690a0; font-size:40px; text-align:center; margin:10px;">Login</p></div>
              <form class="user" method="post">
                <div class="sep"><p>Email</p></div>
                <div class="sep"><input type="email" name="email" class="homeput"></div>
                <div class="sep"><p>Password</p></div>
                <div class="sep"><input type="password" name="password" class="homeput"></div>
                <div class="sep" style="width:50%; display:inline-block;"><input type="checkbox" checked="checked" name="remember"> <a style="font-size:18px;">Remember me</a></div>
                <div class="sep" style="width:43%; text-align:right; display:inline-block;"><a class="aa" href="#" style="font-size:18px; text-decoration:none;">Forget Password ?</a></div>
                <div class="sep"><input type="submit" name="login" class="sub" value="Login" /> </div>
              </form> 
              <div class="sep" style="margin-top: 1rem; margin-bottom: 1rem;"><div class="line"></div></div>
              <div class="sep"><button class="face">Facebook</button><button class="goog">Google</button></div>
            </div>
    </div>
    

    <div id="signpop" class="login">
            <!-- Modal content -->
            <div class="log-content">
              <span class="close" onclick="document.getElementById('signpop').style.display='none'">&times;</span>
              <div class="sep"><p style="color: #6690a0; font-size:40px; text-align:center; margin:10px;">Register</p></div>
              <form class="user" method="post" action="signup.php">
                <div class="sep" style="width:46%; display:inline-block;" >Name</div>
                <div class="sep" style="width:46%; display:inline-block;">Surname</div>
                <div class="sep" style="width:46%; display:inline-block;"><input type="text" name="name" class="homeput"></div>
                <div class="sep" style="width:46%; display:inline-block;"><input type="text" name="surname" class="homeput"></div>
                <div class="sep"> <a>Email</a></div>
                <div class="sep"><input type="email" name="email" class="homeput"></div>
                <div class="sep"><a>Password</a></div>
                <div class="sep"><input type="password" name="password" class="homeput"></div>
                <div class="sep"><a>address</a></div>
                <div class="sep"><input type="text" name="address" class="homeput"></div>
                <div class="sep"><a>dob</a></div>
                <div class="sep"><input type="date" name="dob" class="homeput"></div>
                <div class="sep"> <a>ID Card</a></div>
                <div class="sep"><input type="text" name="IDcard" class="homeput"></div>
                <div class="sep"> <a>Telephone</a></div>
                <div class="sep"><input type="text" name="Tel" class="homeput"></div>
                <div class="sep" style="width:100%; display:inline-block;"><input type="checkbox" checked="checked" name="remember"> <a style="font-size:18px;">Accept Terms and Condition</a></div>
                <div class="sep"><input type="submit" name="register" class="sub" value="Register" /> </div>
              </form> 

              <div class="sep" style="margin-top: 1rem; margin-bottom: 1rem;"><div class="line"></div></div>
              <div class="sep"><button class="face">Facebook</button><button class="goog">Google</button></div>
            </div>
    </div>

</body>
</html>
                
                    
     
                 