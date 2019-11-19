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
  position: sticky;
  top: 0;
  width: 100%;
  z-index: 1;
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
    margin-top: 0px;
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
.ab{
    position:relative;
    margin-top:-5px;
    border:5px solid #6690a0;
    background-color: #6690a0;
}
.quickmenu{
    position:absolute;
    top:-100px;
    left:25%;
    width:50%

}
.quicklist{
    display: table-cell;
    text-align: middle;
    padding: 10px;

}
.New{
    display: table-cell;
    text-align: middle;

}


</style>


<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://allfont.net/allfont.css?fonts=agency-fb" rel="stylesheet" type="text/css" />
    <title>Homepage</title>
</head>
<body>

    <div id="main">
            <header></header>

            <ul>
                    <li><a class="active" href="#home" onclick="clickNav()"><img src="menu.png" height="15"></a></li>
                    <li><a href="#news"><img src="nametag.png" height="15"></a></li>
                    <li style="float:right"><a class="active" href="#about">Sign up</a></li>
                    <li style="float:right"><a class="active" href="#about">Log in</a></li>
            </ul>
            

        <section><img src="Banner.png" style="width:100%">
        <div class="ab" align="center">
        <div class="quickmenu">
                <div class="quicklist"><img src="quickcon.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>
                <div class="quicklist"><img src="quickcon2.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>
                <div class="quicklist"><img src="quickcon3.png" style="border-radius:50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"></div>


        </div>
                
        </div>
                
            <div class="bignew" align="center">
                    <p style="color: #6690a0; margin-left:-60%; margin-bottom: 0%; margin-top:10%; font-size:60px;">News</p>

                    <div class="New"><img src="New1.png" width="350px"></div>
                    <div class="New"><img src="New2.png" width="350px"></div>
                    <div class="New"><img src="New3.png" width="350px"></div>

            </div>



        </section>
    </div>    

    <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="#"><img src="user.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="help.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="time.png" height="30"></a></div>
            <div class="sidein"><a href="#"><img src="noti.png" height="30"></a></div>
    
    </div>

    <div id="logpop" class="login">

            <!-- Modal content -->
            <div class="log-content">
              <span class="close">&times;</span>
                <br>
              <input type="text" name="Email" value="Email"><br>
              <input type="password" name="Password" value="Password">


            </div>
          
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
