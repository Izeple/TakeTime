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
<!DOCTYPE html>
<style>
    body {
        font-family: 'Agency FB', arial;
        font-size: 20px;
        margin:0;}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(255, 255, 255);
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color:rgb(139, 139, 139);
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: rgb(226, 226, 226);
}
section{
    margin-top: 28px;
}
.sidenav{
    height: 100%;
margin-top: 52px;
  width: 0%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #ffffff;
  overflow-x: hidden;
  transition: 0.5s;
  
}
.sidein{
    width:300px;
height: 30px;   
padding:16px;

}
.sidein a{
    text-decoration: none;
    padding: 14px;
}
.sidein:hover{
    text-decoration: none;
    background-color:rgb(226, 226, 226);

}
	.textMiddle {
  vertical-align:-25px;
}
	.menu {
 		 width: 9%;
    	color: white;
		background-color: #EB7273;
  		padding: 8px;
		font-size: 30;
		text-align: center;
		border-top-right-radius:25px;
		border-bottom-right-radius: 25px;
}
</style>


<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="http://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" />
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
		
<h1   style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 50;
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
