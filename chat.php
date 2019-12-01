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
        <div class="column" style="height : 285px;">
        <center>
            <?php
            $mysql_qry1 = "SELECT c.staff_id,c.patient_id,s.name,s.surname FROM `consult`c JOIN staff s ON c.staff_id = s.staff_id GROUP BY c.staff_id,c.patient_id HAVING `patient_id` ='1'";
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
               <img src="./img/add.png" width="50px"></center>
        </div>
        <div class="column" style="width:60%" id="Standard">
        </div>
    </div>
</body>

</html>