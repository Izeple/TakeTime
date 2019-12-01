<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    require_once("connectPDO.php");
    $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
    $result_User = PDOfetchAll($sql)[0];
} else {
    header("location:Homepage.php");
}
if(isset($_SESSION["edit"]))
    if ($_SESSION["edit"] == 1 && !isset($_POST["edit"])) {
        $_SESSION["edit"] = 0;
        header("location:delete_schedule.php");
    }

?>
<html>
<head>
    <title>Homepage</title>
    <script type="text/javascript">
        function myFunction(staffid, name, surname, hospital, department, price) {
            // alert(name+" "+surname+hospital+department+price);
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            document.getElementById("Name").innerHTML = 'Dr. ' + name + ' ' + surname;
            document.getElementById("Department").innerHTML = 'Department : ' + department;
            document.getElementById("Hospital").innerHTML = 'Hepartment : ' + hospital;
            document.getElementById("price").innerHTML = price + ' Baht';
            document.getElementById("staffid").value = staffid;
        }

        function Cancel() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function backadd() {
            window.open('adddoc.php', "_self");
        }

        function backconsult() {
            window.open('chat.php', "_self");
        }

        function sql() {
            var departmentname = document.getElementById("departmentname").value;
            var hospitalname = document.getElementById("hospitalname").value;
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("sql").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "selectdepartment.php?departmentname=" + departmentname + "&hospitalname=" + hospitalname, true);
            xhttp.send();
        }

        function checktext1() {
            var describe = document.forms["forminsert"]["describe"].value.trim().length;
            var often = document.forms["forminsert"]["often"].value.trim().length;
            var CardNumber1 = document.forms["forminsert"]["CardNumber1"].value.trim().length;
            var valueCardNumber1 = document.forms["forminsert"]["CardNumber1"].value;
            var CardNumber2 = document.forms["forminsert"]["CardNumber2"].value.trim().length;
            var valueCardNumber2 = document.forms["forminsert"]["CardNumber2"].value;
            var CardNumber3 = document.forms["forminsert"]["CardNumber3"].value.trim().length;
            var valueCardNumber3 = document.forms["forminsert"]["CardNumber3"].value;
            var CardNumber4 = document.forms["forminsert"]["CardNumber4"].value.trim().length;
            var valueCardNumber4 = document.forms["forminsert"]["CardNumber4"].value;
            var CVV1 = document.forms["forminsert"]["CVV"].value.trim().length;
            var CVV = document.forms["forminsert"]["CVV"].value;
            var MonthExpired = document.forms["forminsert"]["MonthExpired"].value;
            var YearExpired = document.forms["forminsert"]["YearExpired"].value;
            if (describe == 0 || often == 0 || CardNumber1 == 0 || Number.isInteger(Number(valueCardNumber1)) == false || CardNumber1 != 4 || CardNumber2 == 0 || Number.isInteger(Number(valueCardNumber2)) == false || CardNumber2 != 4 || CardNumber3 == 0 || Number.isInteger(Number(valueCardNumber3)) == false || CardNumber3 != 4 || CardNumber4 == 0 || Number.isInteger(Number(valueCardNumber4)) == false || CardNumber4 != 4 || CVV1 == 0 || Number.isInteger(Number(CVV)) == false || CVV1 != 3 || MonthExpired == 0 || YearExpired == 0) {
                document.getElementById("eror").innerHTML = "* Please input data Correct";
                return false;
            } else {
                return true;
            }
        }

        function checktext() {
            var describe = document.forms["forminsert"]["describe"].value.trim().length;
            if (describe == 0) {
                document.getElementById("describe").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("describe").style.borderColor = "#47b6c7";
            }
            var often = document.forms["forminsert"]["often"].value.trim().length;
            if (often == 0) {
                document.getElementById("often").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("often").style.borderColor = "#47b6c7";
            }
            var CardNumber1 = document.forms["forminsert"]["CardNumber1"].value.trim().length;
            var CardNumber = document.forms["forminsert"]["CardNumber1"].value;
            if (CardNumber1 == 0 || Number.isInteger(Number(CardNumber)) == false || CardNumber1 != 4) {
                document.getElementById("CardNumber1").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("CardNumber1").style.borderColor = "#47b6c7";
            }
            var CardNumber2 = document.forms["forminsert"]["CardNumber2"].value.trim().length;
            var CardNumber = document.forms["forminsert"]["CardNumber2"].value;
            if (CardNumber2 == 0 || Number.isInteger(Number(CardNumber)) == false || CardNumber2 != 4) {
                document.getElementById("CardNumber2").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("CardNumber2").style.borderColor = "#47b6c7";
            }
            var CardNumber3 = document.forms["forminsert"]["CardNumber3"].value.trim().length;
            var CardNumber = document.forms["forminsert"]["CardNumber3"].value;
            if (CardNumber3 == 0 || Number.isInteger(Number(CardNumber)) == false || CardNumber3 != 4) {
                document.getElementById("CardNumber3").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("CardNumber3").style.borderColor = "#47b6c7";
            }
            var CardNumber4 = document.forms["forminsert"]["CardNumber4"].value.trim().length;
            var CardNumber = document.forms["forminsert"]["CardNumber4"].value;
            if (CardNumber4 == 0 || Number.isInteger(Number(CardNumber)) == false || CardNumber4 != 4) {
                document.getElementById("CardNumber4").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("CardNumber4").style.borderColor = "#47b6c7";
            }
            var CVV1 = document.forms["forminsert"]["CVV"].value.trim().length;
            var CVV = document.forms["forminsert"]["CVV"].value;
            if (CVV1 == 0 || Number.isInteger(Number(CVV)) == false || CVV1 != 3) {
                document.getElementById("CVV").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("CVV").style.borderColor = "#47b6c7";
            }
            var MonthExpired = document.forms["forminsert"]["MonthExpired"].value;
            var YearExpired = document.forms["forminsert"]["YearExpired"].value;
            if (MonthExpired == 0 || YearExpired == 0) {
                document.getElementById("MonthExpired").style.borderColor = "red";
                document.getElementById("YearExpired").style.borderColor = "red";
                document.getElementById("eror").innerHTML = "* Please input data Correct";
            } else {
                document.getElementById("MonthExpired").style.borderColor = "#47b6c7";
                document.getElementById("YearExpired").style.borderColor = "#47b6c7";
            }
        }
    </script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <style>
        input[type=text],
        select {
            width: 160px;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            padding: 10px;
            color: #a4a4a4;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 420px;
            height: 140px;
            overflow: auto;
        }

        .card1 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 250px;
            height: 300px;
            overflow: auto;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }

        .img1 {
            float: right;
        }

        .img2 {
            float: left;
        }

        .fa {
            font-size: 25px;
            color: #8c8c8c;
        }

        .checked {
            color: #efce4a;
        }

        .row {
            display: flex;
            margin-left: 20%;
            margin-right: 20%;
        }

        .column {
            padding: 10px;
        }

        .row1 {
            width: 1000px;
        }

        .column1 {
            padding-left: 35px;
            width: 900px;
            display: inline-block;
            margin: auto;
        }

        .row2 {
            display: flex;
            margin-left: 1%;
        }

        .column2 {
            width: 500px;
            display: inline-block;
        }

        .modal {
            Position: relative;
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 10px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */

        }

        /* Modal Content */
        .modal-content {
            width: 950px;
            Position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 10px;
            border: 1px solid #888;
            border-radius: 10px;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        textarea {
            resize: none;
            border: 1px solid #d3cccc;
            font-size: 16px;
        }

        input[type="number"] {
            text-align: center;
            border-style: solid;
            border-color: #d3d3d3;
        }

        .buttoncancel {
            background-color: #e1e1e1;
            border: none;
            color: #475254;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            cursor: pointer;
            font-family: Agency FB;
            border-radius: 5px;
        }

        .buttonconfirm {
            background-color: #47b6c7;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            cursor: pointer;
            font-family: Agency FB;
            border-radius: 5px;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .bar {
            width: 180px;
            background-color: #47b6c7;
            position: absolute;
            margin-top: -30px;
            padding: 10px;
        }

        .barback {
            width: 100%;
            height: 7%;
            margin-top: 11px;
            background-color: #0f5a66;
        }
    </style>
</head>

<body>
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
            <center>
                <div class="selecty">
                    <select style="width:110px;" name="departmentname" style="float: right;" id="departmentname" onchange="sql()">
                        <?php $mysql_qry = "SELECT * FROM `department`"; ?>
                        <?php $result = mysqli_query($Connect, $mysql_qry);
                        while ($row12 =  $result->fetch_assoc()) { ?>
                            <font size='5' color="#a4a4a4" face="Agency FB">
                                <option value="<?php echo $row12['department_id']; ?>"><?php echo $row12['department_name']; ?></option>
                            <?php  } ?> </select>
                    <select style="width:110px;" name="hospitalname" style="float: right;" id="hospitalname" onchange="sql()">
                        <?php $mysql_qry = "SELECT * FROM `hospital`"; ?>
                        <?php $rแesult = mysqli_query($Connect, $mysql_qry);
                        while ($row12 =  $result->fetch_assoc()) { ?>
                            <font size='5' color="#a4a4a4" face="Agency FB">
                                <option value="<?php echo $row12['hospital_id']; ?>"><?php echo $row12['hospital_name']; ?></option>
                            <?php  } ?>
                    </select>
                </div>
            </center>
           

    <div id="myModal" class="modal">
        <form action="insertchat.php" method="POST" enctype="multipart/form-data" name="forminsert" onsubmit="return checktext1()">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                    &nbsp;&nbsp;&nbsp;&nbsp; <font size='6' color="#47b6c7" face="Agency FB" style="padding-left:35px;"><U>Describe Symptom</U></font>
                </p>

                <div class="row1">
                    <div class="column1">
                        <textarea rows="8" cols="60" name="describe" id="describe" onchange="checktext()"></textarea><br><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How long?&nbsp;
                            <input type="number" name="long" id="long" style="width:50px; height: 38px;" value="1" min="1" onchange="checktext()"></font>
                        <select style="width:110px;" name="unitlong">
                            <option value="Minute">Minute</option>
                            <option value="Hour">Hour</option>
                            <option value="Day">Day</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How often? </font>
                        &nbsp; <input type="text" name="often" id="often" onchange="checktext()"><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Photo of symptom(optional) </font><br>
                        <div class="upload-btn-wrapper">
                            <img src="./img/cam.png" style="width:75px; padding:10px;"><br>
                            <input type="file" name="fileToUpload" />
                        </div>
                    </div>
                    <div class="column2">
                        <div class="card1">
                            <center>
                                <img src="./img/picdoc.jpg" style="width:160px;"><br>
                                <input type="hidden" id="staffid" name="staffid" value="">
                                <font size='5' color="#47b6c7" face="Agency FB" id="Name"></font><br>
                                <font size='4' color="#a4a4a4" face="Agency FB" id="Department"></font><br>
                                <font size='4' color="#a4a4a4" face="Agency FB" id="Hospital"></font><br><br>
                                <img src="./img/coin.png" style="width:20px;" align="top">
                                <font size='4' color="#85c06a" face="Agency FB" id="price"></font><br><br>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="row1">
                    <div class="column1">
                        <font size='6' color="#47b6c7" face="Agency FB"> <U> Payment Card</U></font><br><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Card Number</font>
                        <input type="text" style="width:120px;" name="CardNumber1" id="CardNumber1" onchange="checktext()">
                        &nbsp;<input type="text" style="width:120px;" name="CardNumber2" id="CardNumber2" onchange="checktext()">
                        &nbsp;<input type="text" style="width:120px;" name="CardNumber3" id="CardNumber3" onchange="checktext()">
                        &nbsp;<input type="text" style="width:120px;" name="CardNumber4" id="CardNumber4" onchange="checktext()"><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Expired Date</font>
                        &nbsp; <select style="width:110px;" name="MonthExpired" id="MonthExpired">
                            <option value="0">Month</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        &nbsp;
                        <select name="YearExpired" id="YearExpired" style="width:110px;">
                            <option value="0">Year</option>
                            <?php
                            for ($i = 2019; $i <= 2043; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> CVV</font> &nbsp;
                        <input type="text" style="width:95px;" name="CVV" id="CVV" onchange="checktext()"><br>

                    </div>
                    <div class="column2">
                        <center>
                            <img src="./img/card.png" style="width:200px;"></center>
                    </div>
                </div>
                <div style="margin-right: 10px;">
                    <font size='5' color="red" face="Agency FB">
                        <div id="eror" style="margin-left:35px;">

                        </div>
                    </font>
                    <center>
                        <div>
                            <input type="button" class="buttoncancel" value="CANCEL" onclick="Cancel()">&nbsp;&nbsp;&nbsp;
                            <input type="submit" class="buttonconfirm" value="CONFIRM">
                        </div>
                    </center>
                </div>
            </div>
        </form>
    </div>
    <center>
        <div id="sql">
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
            <div class="column" onclick="myFunction('<?php echo $row12['staff_id']; ?>','<?php echo $row12['name']; ?>','<?php echo $row12['surname']; ?>','<?php echo $row12['department_name']; ?>','<?php echo $row12['hospital_name']; ?>','<?php echo $row12['price']; ?>')">
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
            </div>
        </div>
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


</body>

</html>