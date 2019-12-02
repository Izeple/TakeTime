<?php session_start();
        require_once("connectPDO.php");
        $email = $_SESSION["email"];

        $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
        $result_User = PDOfetchAll($sql)[0];
    ?>
<head>
    <script type="text/javascript">
        function consult() {
            window.open('selectdoc.php', "_self");
        }

        function myFunction(staffid, name, surname) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Standard").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "selectchat.php?staffid=" + staffid + "&name=" + name + "&surname=" + surname, true);
            xhttp.send();
        }

        function star1(consult_id) {
            var star = ["star5", "star4", "star3", "star2", "star1"];
            var icon = document.getElementById("star1");
            if (icon.classList.contains("fa-star-o")) {
                for (var i = 0; i < 5; i++) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star-o");
                    icon.classList.add("fa-star");
                }
            } else {
                var icon = document.getElementById("star1");
                icon.classList.remove("fa-star");
                icon.classList.add("fa-star-o");
            }
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhttp.open("GET", "updatestar.php?consult_id=" + consult_id + "&star= 5", true);
            xhttp.send();
        }

        function star2(consult_id) {
            var star = ["star5", "star4", "star3", "star2", "star1"];
            var icon = document.getElementById("star2");
            if (icon.classList.contains("fa-star-o")) {
                for (var i = 0; i < 4; i++) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star-o");
                    icon.classList.add("fa-star");
                }
            } else {
                for (var i = 4; i > 3; i--) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star");
                    icon.classList.add("fa-star-o");
                }
            }
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhttp.open("GET", "updatestar.php?consult_id=" + consult_id + "&star= 4", true);
            xhttp.send();
        }

        function star3(consult_id) {
            var star = ["star5", "star4", "star3", "star2", "star1"];
            var icon = document.getElementById("star3");
            if (icon.classList.contains("fa-star-o")) {
                for (var i = 0; i < 3; i++) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star-o");
                    icon.classList.add("fa-star");
                }
            } else {
                for (var i = 4; i > 2; i--) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star");
                    icon.classList.add("fa-star-o");
                }
            }
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhttp.open("GET", "updatestar.php?consult_id=" + consult_id + "&star= 3", true);
            xhttp.send();
        }

        function star4(consult_id) {
            var star = ["star5", "star4", "star3", "star2", "star1"];
            var icon = document.getElementById("star4");
            if (icon.classList.contains("fa-star-o")) {
                for (var i = 0; i < 2; i++) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star-o");
                    icon.classList.add("fa-star");
                }
            } else {
                for (var i = 4; i > 1; i--) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star");
                    icon.classList.add("fa-star-o");
                }
            }
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhttp.open("GET", "updatestar.php?consult_id=" + consult_id + "&star= 2", true);
            xhttp.send();
        }

        function star5(consult_id) {
            var star = ["star5", "star4", "star3", "star2", "star1"];
            var icon = document.getElementById("star5");
            if (icon.classList.contains("fa-star-o")) {
                icon.classList.remove("fa-star-o");
                icon.classList.add("fa-star");

            } else {
                for (var i = 4; i > 0; i--) {
                    var icon = document.getElementById(star[i]);
                    icon.classList.remove("fa-star");
                    icon.classList.add("fa-star-o");
                }
            }
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                }
            }
            xhttp.open("GET", "updatestar.php?consult_id=" + consult_id + "&star= 1", true);
            xhttp.send();
        }

        function closechat() {
            document.getElementById("Standard").innerHTML = "";
        }
    </script>

    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/clickNav.js"></script> 

    <style>
        
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
           .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
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
        .bar {
            padding-top: 4px;
            width: 100%;
            height: 6%;
            background-color: #47b6c7;
        }

        .barback {
            width: 100%;
            height: 7%;
            background-color: #0f5a66;
        }

        .barchat {
            padding: 3px 16px;
            margin-top: 5px;
            width: 100%;
            height: 65px;
            background-color: #207a85;
            border-radius: 3px 3px 0px 0px ;
        }

        .row {
            display: flex;
        }

        .column {
            margin: 10px;
        }

        .card {
            margin-left: 170px;
            box-shadow: 0.3px 0.3px 0.3px 0.3px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 375px;
            height: 95px;
            overflow: auto;
            margin-top: 5px;
            border-radius: 5px;
        }

        .card1 {
            padding: 1rem;
            width: 100%;
            height: 292px;
            overflow: auto;
            border-radius: 0px;

        }

        .cardchat {
            margin-left: 40px;
            transition: 0.3s;
            overflow: auto;
            margin-top: 5px;
            border-radius: 10px;

        }

        .close {
            
        }

        .buttonconfirm {
            width: 100%;
            background-color: #ffffff;
            color: #acacac;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            cursor: pointer;
            font-family: Agency FB;
            border-radius: 5px;
            border-color: #c6c6c6;
            border: 1px solid #8c8c8c;
        }
    </style>

</head>
<?php require "condb.php"; ?>

<body style="margin :0px; height:100%;">
    <div id="main">
        <ul>
        <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right">
            <p class='usern' style='padding: 14px 16px; margin:0; color:#4e707e; ' onclick="location.replace('./profile.php')";>Hi,<?php echo $result_User["name"]; ?></p>
            </li>
            <li style="float:right"><button class="btn4" id="btn4"><img src="./img/bell.png" height="25"></button></li>
       </ul>

        <section><img src="./img/Banner.png" style="width:100%; height: 305px; position: relative;">
            <div id="sidenav" class="sidenav">
                <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
                <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>

        </section>
    </div>
    <div class="bar">
        &nbsp;&nbsp; &nbsp;<font size='6' color="#ffffff" face="Agency FB">Consult Doctor</font>
    </div>
    <div class="row" style="margin :0px;">
        <div class="column" style="height : 285px;">
        <center>
            <?php
            $mysql_qry1 = "SELECT c.staff_id,c.patient_id,s.name,s.surname FROM `consult`c JOIN staff s ON c.staff_id = s.staff_id GROUP BY c.staff_id,c.patient_id HAVING `patient_id` ='".$result_User['patient_id']."'";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($row12 =  $result1->fetch_assoc()) {
                ?>
                <br>
                <div class="card" onclick="myFunction('<?php echo $row12['staff_id']; ?>','<?php echo $row12['name']; ?>','<?php echo $row12['surname']; ?>')">
                    <img src="./img/picdoc.png" alt="Avatar" style="width:68px; float: left;">
                    <br>
                    &nbsp;&nbsp; &nbsp;&nbsp;<font size='6' color="#47b6c7" face="Agency FB">Dr.<?php echo $row12['name']; ?>&nbsp;<?php echo $row12['surname']; ?></font>
                </div>
            <?php
            }
            ?>
            <br>
               <img onclick="window.location.href='selectdoc.php' "src="./img/add.png" width="50px"></center><br>
        </div>
        <div class="column" style="width:60%" id="Standard">
        </div>
    </div>
    
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

                            <img src="./img/add.png" style="width:75px; padding:10px;">
                            <input type="file" name="fileToUpload" />

                        </div>
                        <?php if(isset($result1['img'])){
                        echo "<img src='./uploads/".$result1['img']."' style='width:75px; padding:10px;'><br>";
                        }?>
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
</body>

</html>