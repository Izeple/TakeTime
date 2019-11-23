<head>
    <title>Homepage</title>
    <script type="text/javascript">
        function myFunction(staffid,name, surname, hospital, department, price) {
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
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./script/clickNav.js"></script>
    <?php require "condb.php"; ?>
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
                    <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                    <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>
        </div>
        </section>
    </div>    
    <br>

    <div id="myModal" class="modal">
        <form action="insertchat.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp; <font size='6' color="#47b6c7" face="Agency FB"><U>Describe Symptom</U></font>
                </p>
                <div class="row1">
                    <div class="column1">
                        <textarea rows="9" cols="70" name="describe"></textarea><br><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How long?&nbsp;
                            <input type="number" name="long" style="width:50px; height: 38px;" min="1" ></font>
                        <select style="width:110px;" name="unitlong">
                            <option value="Minute">Minute</option>
                            <option value="Hour">Hour</option>
                            <option value="Day">Day</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How often? </font>
                        &nbsp; <input type="text" name="often"><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Photo of symptom(optional) </font><br>
                        <div class="upload-btn-wrapper">
                            <img src="./img/upimg.png" style="width:80px;"><br>
                            <input type="file" name="fileToUpload" />
                        </div>
                    </div>
                    <div class="column1">
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
                         <input type="text" style="width:120px;"  name="CardNumber1">
                        &nbsp;<input type="text" style="width:120px;"  name="CardNumber2">
                        &nbsp;<input type="text" style="width:120px;"  name="CardNumber3">
                        &nbsp;<input type="text" style="width:120px;"  name="CardNumber4"><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Expired Date</font>
                        &nbsp; <select style="width:110px;"  name="MonthExpired">
                            <option value="">Month</option>
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
                        <select  name="YearExpired">
                            <option value="0" >Year</option>
                            <?php
                            for ($i = 2019; $i <= 2043; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> CVV</font> &nbsp;
                         <input type="text" style="width:100px;" name="CVV"><br>

                    </div>
                    <div class="column1">
                        <center>
                            <img src="./img/card.png" style="width:200px;"></center>
                    </div>
                </div>
                <div class="row1">
                    <div class="column1">
                        <input type="button" class="buttoncancel" value="CANCEL" onclick="Cancel()">&nbsp;&nbsp;&nbsp;
                        <input type="submit" class="buttonconfirm" value="CONFIRM">
                    </div>
                </div>
            </div>
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