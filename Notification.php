<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectdead";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
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
        <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
        <li><a href="#news"><img src="./img/nametag.png" height="15"></a></li>
        <li style="float:right"><a class="active" href="#about">Sign up</a></li>
        <li style="float:right"><a class="active" href="#about">Log in</a></li>
    </ul>
            

<section style="margin-top: 0px;"><img src="./img/Banner.png" style=" width:100%; height:fixed;"></section>
		
<h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 50;
		text-align: center;margin-top: -50px;">Notification</h1>

		 <dl>
		   <dt class="notimenu" style="margin-top: -10px;">
				 Booking
			 </dt>
			 <dd>
				 
			 <table width="500" border="0" style="margin-top: 50px; margin-bottom: 35px; margin-left: 50px;">
  <tbody>
    <tr>
      <td><img src="./img/Doctor1.png" width="412" height="133" alt=""/></td>

</td>
    </tr>
  </tbody>
</table>

		   </dd>
			 
			 <dt class="notimenu">
			 Medicine
			 </dt>
			 		<dd>
			 Medicine
		  		 </dd>
			 
		</dl>

    <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="#"><img src="./img/user.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="./img/help.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="./img/time.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="./img/noti.png" height="30"></a></div>
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
