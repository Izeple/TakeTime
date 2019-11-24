<head>
    <script type="text/javascript">
        function consult() {
            window.open('selectdoc.php', "_self");
        }

        function myFunction(staffid) {
            var xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("Standard").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "selectchat.php?staffid=" + staffid, true);
            xhttp.send();
        }
    </script>

    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/clickNav.js"></script> 
    <style>
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
            margin-top: 5px;
            width: 100%;
            height: 65px;
            background-color: #207a85;
            border-radius: 4px;
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
            margin-left: 10px;
            width: 755px;
            height: 292px;
            overflow: auto;
            margin-top: 5px;
            border-radius: 10px;

        }

        .cardchat {
            margin-left: 40px;
            transition: 0.3s;
            overflow: auto;
            margin-top: 5px;
            border-radius: 10px;

        }

        .close {
            color: #e79d94;
            float: right;
            font-size: 15px;
            width: 2%;
            height: 25%;
            font-weight: bold;
            margin-right: 15px;
            border-radius: 60px;
            border-style: solid;
            background-color: #d75a4a;
            border-color: #d75a4a;
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
            border-style: solid;
        }
    </style>

</head>
<?php require "condb.php"; ?>

<body style="margin :0px;">
    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="#news"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn" id="btn">Sign up</button></li>
            <li style="float:right"><button class="btn2" id="btn2">Log in</button></li>
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
        <div class="column">
            <?php
            $mysql_qry1 = "SELECT c.staff_id,c.patient_id,s.name,s.surname FROM `consult`c JOIN staff s ON c.staff_id = s.staff_id GROUP BY c.staff_id,c.patient_id HAVING `patient_id` ='1'";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($row12 =  $result1->fetch_assoc()) {
                ?>
                <br>
                <div class="card" onclick="myFunction(<?php echo $row12['staff_id']; ?>)">
                    <img src="./img/picdoc.png" alt="Avatar" style="width:68px; float: left;">
                    <br>
                    &nbsp;&nbsp; &nbsp;&nbsp;<font size='6' color="#47b6c7" face="Agency FB">Dr.<?php echo $row12['name']; ?>&nbsp;<?php echo $row12['surname']; ?></font>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="column">
            <div class="barchat">
                &nbsp;&nbsp;<img src="./img/picdoc.png" style="width:60px; margin-top: 3px; float: left; margin-left: 8px;"> <br>
                &nbsp;&nbsp;<font size='6' color="#ffffff" face="Agency FB">Dr.Jin Hong</font>
                <span class="close">&nbsp;<font face="Myriad Pro">X</font></span>
            </div>
            <div class="card1" id="Standard">
                <div>
                    <div>
                        <img src="./img/man.png" style="width:75px; margin-top: 15px; float: right; margin-right: 8px;">
                        <div style="width:350px; margin-top: 6px; float: right; margin-right: 10px;  margin-top: 15px; background-color: #dffbff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;">
                            <font size='3' color="#6e6e6e" face="[supermarket]">
                                <br>
                                รู้สึกช่วงนี้กินไม่ได้นอนไม่หลับ หงุดหงิดง่าย ปวดหัวแบบ
                                บีบๆ บางทีเห็นภาพหลอน แล้วก็รู้สึกเหมือนมีคนกระซิบข้างหู
                                ตลอดเวลา อาการแบบนี้เป็นโรคซึมเศร้ารึเปล่าคะ หรือควร
                                จะทำยังไงดี
                                <br>
                                <br>
                                How long? : 3 weeks
                                <br>
                                How often? :
                                <br>

                            </font>
                        </div>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br>
                        <img src="./img/card.png" style="width:150px; margin-top: 15px; float: right; margin-right: 90px;">
                    </div>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <br><br>
                    <div>
                        <img src="./img/picdoc.png" style="width:75px; margin-top: 15px; float: left; margin-right: 8px;">
                        <div style="width:350px; margin-top: 6px; float: left; margin-right: 10px;  margin-top: 15px; background-color: #ffffff; padding-left:15px; padding-bottom:15px;  border-radius: 10px;">
                            <font size='3' color="#6e6e6e" face="[supermarket]">
                                <br>
                                หมอแนะนำให้คนไข้เขียนไดอารี่บันทึกอาการและมาพูดคุยกับ
                                หมออาทิตย์ละหนึ่งวันนะครับ เพื่อติดตามอาการถ้าเป็น
                                ไปได้ อาการของคนไข้ก้ำกึ่งระหว่างคนเมายา กับจิตวิตกขั้น
                                รุนแรงแนะนำให้มาพบหมอโดยเร็วนะครับ
                            </font><br>
                            <span class="fa fa-star checked" style=" float: right;"></span>
                            <span class="fa fa-star" style=" float: right;"></span>
                        </div>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <br>
                    </div>
                </div>
            </div>
            <form action="chat.php" method="POST">
                <input type="submit" class="buttonconfirm" value="Tap to chat">
        </div>
    </div>
    <div class="barback">
        <img src="./img/consult.jpg" style="width:100px; padding-top: 4px; padding-right: 5px; float: right;" onclick="consult()">
    </div>
</body>

</html>