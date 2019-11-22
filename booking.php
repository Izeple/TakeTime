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
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
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

    
    <h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 50;
        text-align: center;margin-top: -50px;">Booking Doctor</h1>
    <div style="text-align:center; margin-top: -50px;">    
        <?php 
        session_start();
        require_once("connectPDO.php");
        $pdo = conPDO();     
        if(isset($_POST["HospitalID_Select"]) || !isset($_SESSION['HospitalID_Select']))
        $_SESSION['HospitalID_Select']= isset($_POST["HospitalID_Select"]) ? $_POST["HospitalID_Select"] : NULL; 
        if(isset($_POST["DepartmentID_Select"]) || !isset($_SESSION['DepartmentID_Select']))
        $_SESSION['DepartmentID_Select']= isset($_POST["DepartmentID_Select"]) ? $_POST["DepartmentID_Select"] : NULL; 

        $HospitalID = $_SESSION['HospitalID_Select'];
        $DepartmentID = $_SESSION['DepartmentID_Select'];
        ?>


        <form style="display: inline; " action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">     
                <select onchange="submit();" name="HospitalID_Select" type="button">
                    <option value=""><- Select hospitalID -></option>
                        <?php
                        $result_H = $pdo->prepare("SELECT * FROM hospital");
                        $result_H->execute();
                        while($objResuut = $result_H->fetch()){
                        echo print_r($objResuut);
                        ?>
                        <option value="<?php echo $objResuut["hospital_id"];?>" <?php if ($objResuut["hospital_id"] == $HospitalID) echo ' selected="selected"';?>><?php echo $objResuut["hospital_id"]." - ".$objResuut["hospital_name"];?></option>
                        <?php } ?>
                </select>
            </form>

            <form style="display: inline; " action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">     
                <select onchange="submit();" name="DepartmentID_Select" type="button">
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
            </form>
    </div>
    
    
    
    
    <center>
        <div class="row">
            <?php
            $i = 0;
            $mysql_qry1 = "SELECT * FROM `staff`s JOIN hospital h ON s.hospital_id = h.hospital_id JOIN department d ON s.department_id = d.department_id";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($row12 =  $result1->fetch_assoc()) {
                if ($i % 2 == 0 && $i != 0) {
                    ?>
        </div>
        <div class="row">
        <?php
            } ?>
        <div class="column" onclick="myFunction('<?php echo $row12['name']; ?>','<?php echo $row12['surname']; ?>','<?php echo $row12['department_name']; ?>','<?php echo $row12['hospital_name']; ?>','<?php echo $row12['price']; ?>')">
            <div class="card">
                <img src="./img/picdoc.jpg" alt="Avatar" style="width:140px;" class="img2">
                <div class="side right" align="left">
                    <p>
                        <font size='5' color="#47b6c7"> &nbsp;Dr.<?php echo $row12['name']; ?>&nbsp;<?php echo $row12['surname']; ?></font><br>
                        <font size='3' color="#a4a4a4">&nbsp;&nbsp;Department : <?php echo $row12['department_name']; ?><br>
                            &nbsp; Hospital : <?php echo $row12['hospital_name']; ?></font><br>
                        &nbsp;&nbsp;
                        <?php
                            for ($j = 0; $j < 5; $j++) {
                                $star = $row12['star'];
                                if ($j < $star) {
                                    ?>
                                <span class="fa fa-star checked"></span>
                            <?php
                                    } else {
                                        ?>
                                <span class="fa fa-star"></span>
                            <?php
                                }
                            }
                            ?><br>
                        <font size='4' color="#85c06a" style="float: right;"> &nbsp;<?php echo $row12['price']; ?> Baht&nbsp;&nbsp;</font>
                        <img src="./img/coin.png" style="width:20px; float: right;" align="top">
                    </p>
                </div>
            </div>
        </div>


    <?php
        $i++;
    } ?>
    </center>

    <script>
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    
    <!--- 
   <script type="text/javascript">
            function refreshPage () {
                var page_y = document.getElementsByTagName("body")[0].scrollTop;
                window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
            }
            window.onload = function () {
                setTimeout(refreshPage, 35000);
                if ( window.location.href.indexOf('page_y') != -1 ) {
                    var match = window.location.href.split('?')[1].split("&")[0].split("=");
                    document.getElementsByTagName("body")[0].scrollTop = match[1];
                }
            }
    </script> 
    --->



</body>
</html>
