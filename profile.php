<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/profile2.css">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="./script/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <?php require "login.php"; ?>
    <?php //require "signup.php"; 
    ?>
    <?php

    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '" . $email . "'";
        $result_User = PDOfetchAll($sql)[0];
    }
    ?>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function() {
            readURL(this);
        });
        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
    <title>Profile</title>
</head>

<body>
    <div id="main">
        <ul>
            <li><a class="active" href="#" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right">
                <p class='usern' style='padding: 14px 16px; margin:0; color:#4e707e;'>Hi,<?php echo $result_User["name"]; ?></p>
            </li>
            <li style="float:right"><button class="btn4" id="btn4"><img src="./img/bell.png" height="25"></button></li>
        </ul>
        <section><img src="./img/Banner.png" style="width:100%">
            <div id="sidenav" class="sidenav">
                <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>
                <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>

        </section>
    </div>
    <div class="boxe">
        <div class="hpro">Profile</div>
        <div class="Profile">
            <div class="leftpro">
                <img src="./img/cam.jpg" class="pichov">

                <div class="upload-btn-wrapper">
                    <div>
                       <img src="./img/man.png" class="picpro">
                            
                    </div>
                    <input class="picpro" type="file" name="fileToUpload" id="profile-img" onchange="readURL(this)" />

                </div>
            </div>
            <div class="rightpro">
                <p style="font-size:28px; color:#47b6c7; margin-top:10px;margin-bottom:10px;"> <?php echo $result_User['name']; ?> <?php echo $result_User['surname']; ?></p>
                <div style="height:0.75px; background:grey;"></div>
                <p class="tl"> Email</p>
                <p class="tr"> : <?php echo $result_User['email']; ?></p>
                <p class="tl"> ID Card</p>
                <p class="tr"> : <?php echo $result_User['id_card']; ?></p>
                <p class="tl"> Telephone</p>
                <p class="tr"> : <?php echo $result_User['tel']; ?></p>
                <p class="tl"> Address</p>
                <p class="tr"> : <?php echo $result_User['address']; ?></p>
                <p class="tl"> Date of birth</p>
                <p class="tr"> : <?php echo $result_User['dob']; ?></p>
                <img onclick="document.getElementById('propop').style.display='block'" class="edit" style="border-radius:0px 0px 5px 0px; width:10%" src="./img/edit.png">
            </div>
        </div>
    </div>
    <div id="propop" class="login">
        <!-- Modal content -->
        <div class="propop">
            <form action="editproflie.php" method="POST" enctype="multipart/form-data">
                <div class="hpro">Profile</div>
                <div class="Profile">
                    <div class="leftpro">
                        <img src="./img/cam.jpg" class="pichov">
                        <div class="upload-btn-wrapper">
                            <div>
                                <img src="./img/man.png" class="picpro" id="profile-img-tag">
                            </div>
                            <input class="picpro" type="file" name="fileToUpload" id="profile-img" onchange="readURL(this)" />

                        </div>
                    </div>
                    <div class="rightpro">
                        <p style="font-size:28px; color:#47b6c7; margin-top:10px;margin-bottom:10px;"> <?php echo $result_User['name']; ?> <?php echo $result_User['surname']; ?></p>
                        <div style="margin:15px 0px; height:0.75px; background:grey;"></div>
                        <input type="hidden" name="patientid" value="<?php echo $result_User['patient_id']; ?>">
                        <p class="tl"> Email</p>
                        <p class="tr"> : <input class="ip" type="email" name="email" value="<?php echo $result_User['email']; ?>"></p>
                        <p class="tl"> ID Card</p>
                        <p class="tr"> : <input class="ip" type="text" name="idcard" value="<?php echo $result_User['id_card']; ?>"></p>
                        <p class="tl"> Telephone</p>
                        <p class="tr"> : <input class="ip" type="text" name="tel" value="<?php echo $result_User['tel']; ?>"></p>
                        <p class="tl"> Address</p>
                        <p class="tr"> : <input class="ip" type="text" name="address" value="<?php echo $result_User['address']; ?>"></p>
                        <p class="tl"> Date of birth</p>
                        <p class="tr"> : <input class="ip" type="date" name="dob" value="<?php echo $result_User['dob']; ?>"></p>
                        <center><button type="submit" class="save" style="display:inline-block; margin-right:10px;">Save</button><button class="cancel" style="display:inline-block">Cancel</button></center>
            </form>
        </div>

    </div>
    </div>
    </div>
    </div>
    <div class="bookhis">
        <?php
        $status_select = "Complete";
        $i = 0;
        //'".$result_User['patient_id']."'
        $sql = "SELECT * FROM schedule WHERE patient_id = 1";
        $result_Schedule = PDOfetchAll($sql);
        if ($result_Schedule) {
            foreach ($result_Schedule as $row) {
                if ($i % 2 == 0 && $i != 0) {

                    ?>
    </div>
    <?php } ?>
    <?php if ($row['status'] == $status_select && $row['status'] == "Ongoing") { ?>
        <div class="column">
            <div class="card2" >
            <h4 class="HeadModule-h4-1" style="position: absolute; margin-top:-12px; margin-left:-7px; ">On going</h4>

            <div class="sideleft">
                <img src="./img/picdoc.jpg" style="width:100px;">

            </div>
            <div class="sider">

                <font size='5' color="#47b6c7">
                    Dr. <?php
                                    $sql = "SELECT * FROM staff WHERE staff_id = '" . $row['staff_id'] . "'";
                                    $result_doctor = PDOfetchAll($sql)[0];
                                    echo $result_doctor['name'], $result_doctor['surname']; ?><br>
                </font>

                <font size='3' color="#a4a4a4">
                    <?php $dates = explode(' ', $row['bookingdate']); ?>
                    Date <?php echo $dates[0]; ?><br>
                    Time <?php echo $dates[1]; ?><br>

                    Hospital <?php
                                            $sql = "SELECT * FROM hospital WHERE hospital_id = '" . $result_doctor['hospital_id'] . "'";
                                            $result_Hospital = PDOfetchAll($sql)[0];
                                            echo $result_Hospital['hospital_name'] ?><br>
                </font>


            </div>
        </div>
    </div>
<?php
            $i++;
        } else{ ?>
        <div class="column">
            <div class="card2" >
            <h4 class="HeadModule-h5-1" style="position: absolute; margin-top:-12px; margin-left:-7px; ">Complete</h4>

            <div class="sideleft">
                    <img src="./img/picdoc.jpg"  style="width:100px;">
    
            </div>
                <div class="sider">
                    
                    <font size='5' color="#47b6c7">
                        Dr. <?php
                                        $sql = "SELECT * FROM staff WHERE staff_id = '" . $row['staff_id'] . "'";
                                        $result_doctor = PDOfetchAll($sql)[0];
                                        echo $result_doctor['name'], $result_doctor['surname']; ?><br>
                    </font>

                    <font size='3' color="#a4a4a4">
                        <?php $dates = explode(' ', $row['bookingdate']); ?>
                        Date <?php echo $dates[0]; ?><br>
                        Time <?php echo $dates[1]; ?><br>

                        Hospital <?php
                                                $sql = "SELECT * FROM hospital WHERE hospital_id = '" . $result_doctor['hospital_id'] . "'";
                                                $result_Hospital = PDOfetchAll($sql)[0];
                                                echo $result_Hospital['hospital_name'] ?><br>
                    </font>

                    
                </div>
            </div> 
        </div>
<?php
            $i++;
        }?>
        <?php
    }
}
?>







</div>
</body>

</html>