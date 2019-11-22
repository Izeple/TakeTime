<head>
    <title>Homepage</title>
    <script type="text/javascript">
        function myFunction(name, surname, hospital, department, price) {
            // alert(name+" "+surname+hospital+department+price);
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            document.getElementById("Name").innerHTML = 'Dr. ' + name + ' ' + surname;
            document.getElementById("Department").innerHTML = 'Department : ' + department;
            document.getElementById("Hospital").innerHTML = 'Hepartment : ' + hospital;
            document.getElementById("price").innerHTML = price + ' Baht';
        }

        function Cancel() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome Icon Library -->
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <img type="image" src="./img/header.jpg" style="width:99%; height: 305px;">
    </header>
    <?php require "condb.php"; ?>
    <br>

    <div id="myModal" class="modal">
        <form action="/se/insertchat.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp; <font size='6' color="#47b6c7" face="Agency FB"><U>Describe Symptom</U></font>
                </p>
                <div class="row1">
                    <div class="column1">
                        <textarea rows="9" cols="70"></textarea><br><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How long?&nbsp;
                            <input type="number" name="howlong" style="width:50px; height: 38px;" min="1"></font>
                        <select style="width:110px;">
                            <option value="0">Minute</option>
                            <option value="1">Hour</option>
                            <option value="1">Day</option>
                            <option value="2">Month</option>
                            <option value="3">Year</option>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> How often? </font>
                        &nbsp; <input type="text"><br>
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
                         <input type="text" style="width:120px;">
                        &nbsp;<input type="text" style="width:120px;">
                        &nbsp;<input type="text" style="width:120px;">
                        &nbsp;<input type="text" style="width:120px;"><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> Expired Date</font>
                        &nbsp; <select style="width:110px;">
                            <option value="0">Month</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                        &nbsp;<select>
                            <option value="0">Year</option>
                            <?php
                            for ($i = 19; $i <= 43; $i++) {
                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                        <font size='5' color="#a4a4a4" face="Agency FB"> CVV</font> &nbsp; <input type="text" style="width:100px;"><br>

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
</body>

</html>