<?php
$servername = "localhost";
$username = "mI9SntCS7w";
$password = "FYj3bB0ClF";
$dbname = "mI9SntCS7w";

$Connect = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($Connect,"utf8");
if ($conn->connect_error)
{
	die("Connection failed: ". $conn->connect_error);
}

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <title>Notification</title>
</head>
<body>
    
    <div id="main">
    <ul>
        <li><a class="active" href="#home" onclick="clickNav()"><img src="menu.png" height="15"></a></li>
        <li><a href="#news"><img src="nametag.png" height="15"></a></li>
        <li style="float:right"><a class="active" href="#about">Sign up</a></li>
        <li style="float:right"><a class="active" href="#about">Log in</a></li>
    </ul>
            
<header>Header image</header>
<section style="margin-top: 0px;"><img src="Banner.png" style=" width:100%; height:fixed;"></section>
		
<h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 50;
		text-align: center;margin-top: -50px;">Notification</h1>

		 <dl>
		   <dt class="menu" style="margin-top: -10px;">
				 Booking
			 </dt>
			 <dd>
				 
			 <table width="1000" border="1" style="margin-top: -50px; margin-bottom: -35px; margin-left: 50px;">
  <tbody>
    <tr>
      <td><img src="Doctor1.png" width="412" height="133" alt=""/></td>
      <td><table height="300" width="800" border="1" align="right" style=" margin-left:80px; background-color: #EBEBEB;border-radius: 20px;">
  <tbody> 
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td1
      ><td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
    </tr>
  </tbody>
</table>

		   </dd>
			 
			 <dt class="menu">
			 Medicine
			 </dt>
			 		<dd>
			 Medicine
		  		 </dd>
			 
		</dl>

    <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="#"><img src="user.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="help.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="time.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="noti.png" height="30"></a></div>
    </div>

    <script>
            function clickNav(){
                console.log(document.getElementById("sidenav").style.width);
                if(document.getElementById("sidenav").style.width == "250px")
                {
                    document.getElementById("sidenav").style.width = "0%";
                }
                else
                {
                    document.getElementById("sidenav").style.width = "250px";
                }
            }

                
    </script>
		
</body>

    
</html>
