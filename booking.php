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
            <div id="sidenav" class="sidenav">
   <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
   <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
   <div class="sidein"><a href="booking.php"><img src="img/time.png" height="30"></a></div>
   <div class="sidein"><a href="test.php"><img src="img/noti.png" height="30"></a></div>
            </div>
        </div>
        </section>
    </div>    

    


   booking
   <?php 
   require_once("connectPDO.php");
   $pdo = conPDO();    
   $HospitalID = 1; 
   $DepartmentID = 0;
   ?>

   <form style="display: inline; " action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">     
          <select name="BranchID_Select" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select BranchID
              <option value=""><- Select DepartmentID -></option>
                <?php
                $result_B = $pdo->prepare("SELECT * FROM department WHERE hospital_id=:HospitalID");
                $result_B->execute(array(':HospitalID' => $HospitalID));
                while($objResuut = $result_B->fetch()){
                    echo print_r($objResuut);
                ?>
                <option value="<?php echo $objResuut["department_id"];?>" <?php if ($objResuut["department_id"] == $DepartmentID) echo ' selected="selected"';?>><?php echo $objResuut["department_id"]." - ".$objResuut["department_name"];?></option>
                <?php } ?>
                </select>
          </div>
    </form>




</body>
</html>
