<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/profile2.css">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/clickNav.js"></script>
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
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right">
                <p class='usern' style='padding: 14px 16px; margin:0; color:#4e707e;'>Hi,<?php echo $result_User["name"]; ?></p>
            </li>
            <li style="float:right"><button class="btn4" id="btn4"><img src="./img/bell.png" height="25"></button></li>
        </ul>
        <section>
            <div style="position:absolute; z-index:-1; width:100%;">
                <img src="./img/Banner.png" style="width:100% ">
            </div>
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
                <p class="tr"> : <?php echo $result_User['addresspatient']; ?></p>
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
    <div class="down" style="width:750; margin-left:25%;margin-right:25%;">

    <div class="bookhis">
    <div style="position:absolute; left:5px;top:-44px; background-color:#1cbbb4; color:#FFFFFF; padding:10px 15px;">Booking</div>

            <?php
            //        $status_select = "Complete";
            $i = 0;
            //'".$result_User['patient_id']."'
            $sql = "SELECT * FROM schedule WHERE patient_id = 1";
            $result_Schedule = PDOfetchAll($sql);
            if ($result_Schedule) {
                foreach ($result_Schedule as $row) {
                    if ($i != 0) {

                        ?>
        <?php } ?>
    <?php if ($row['status'] == "Going on") { ?>
        <div class="column">
            <div class="card2">
                <h4 class="HeadModule-h4-1" style="position: absolute; margin-top:-12px; margin-left:-7px; ">On-going</h4>

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
            }
        }
        foreach ($result_Schedule as $row) {
            if ($i != 0) {

                ?>
    
<?php } ?>
<?php if ($row['status'] == "Complete") { ?>
    <div class="column">
        <div class="card2" style="position:relative; ">
            <h4 class="HeadModule-h5-1" style="position: absolute; margin-top:-12px; margin-left:-7px; ">Complete</h4>

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
            <img src="./img/tag.png" style="position:absolute; right:-161.24px; top:24px;" height="80px;">
            <div class="med">
                <font size='3' color="#8c8c8c" style="margin:0px;"><u>Medicine </u>
                    <font size='2' color="#8c8c8c">
                        <?php
                                    $sql = "SELECT * FROM history_medicine WHERE schedule_id = '" . $row['schedule_id'] . "'";
                                    $result_Med = PDOfetchAll($sql);
                                    if ($result_Med) {
                                        foreach ($result_Med as $medt) {

                                            $sql = "SELECT * FROM medical WHERE medicine_id = '" . $medt['medicine_id'] . "'";
                                            $rest_Med = PDOfetchAll($sql)[0];
                                            ?>
                                <br>
                            <?php
                                                echo $rest_Med['medicine_name'] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . $medt['times'] . "&nbsp&nbsptimes";
                                            }
                                        } else {
                                            ?>
                            <br>
                        <?php
                                        echo "None";
                                    }
                                    ?><br>

                    </font>
            </div>

        </div>
    </div>
<?php
            $i++;
        }
    }
}
?>

    </div>
    

<div class="allergy">
    <div style="position:absolute; left:5px;top:-38.4px; background-color:#f26d7d; color:#FFFFFF; padding:10px;">Allergy Medicine</div>
    <?php
    $sql = "SELECT * FROM allergy_medicine WHERE patient_id = '" . $result_User['patient_id'] . "'";
    $result_allergy = PDOfetchAll($sql);
    if ($result_allergy) {
        foreach ($result_allergy as $aller) {

            $sql = "SELECT * FROM medical WHERE medicine_id = '" . $aller['medicine_id'] . "'";
            $realler = PDOfetchAll($sql)[0];
            ?>
        <?php
                echo "- ".$realler['medicine_name']."<br>";
            }
        } 
            ?>
        <br>
        <img onclick="document.getElementById('aller').style.display='block'"  class="edit"style="border-radius:0px 0px 3px 0px; width:20%" src="./img/edit.png">
</div>

</div>
    <div id="aller" class="login">
        <!-- Modal content -->
        <div class="aller">
            <span class="close" onclick="document.getElementById('aller').style.display='none'">&times;</span>
            <div style="background-color:#f26d7d; color:#FFFFFF; padding:10px;">Allergy Medicine</div>
                <form class="user" method="post" action="delete_medical.php">
                    <?php
                       if ($result_allergy) {
                        foreach ($result_allergy as $aller) {
                            $sql = "SELECT * FROM medical WHERE medicine_id = '" . $aller['medicine_id'] . "'";
                            $realler = PDOfetchAll($sql)[0];
                    ?> 
                        - <?php echo $realler['medicine_name'];?>
                        <input type='hidden' value="<?php echo $result_User['patient_id'] ?>" name='patient_id'>
                        <input type='hidden' value="<?php echo $realler['medicine_id'] ?>" name='medicine_id'>
                        <input type="submit" name="delete" value="x"/>
                    <?php
                        }
                    } 
                    ?>                    
                </form> 
                        <select name="medicine_id" form="myform" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select Medicine
                            <option value=""><- Select Medicine -></option>
                            <?php
                            $result = $pdo->prepare("SELECT * FROM medical WHERE medicine_id NOT IN (SELECT medicine_id FROM allergy_medicine WHERE patient_id = :patient_id)");
                            $result->execute(array(':patient_id' => $result_User['patient_id']));
                            while($objResuut = $result->fetch()){
                                echo print_r($objResuut);
                            ?>
                            <option value="<?php echo $objResuut["medicine_id"];?>"><?php echo $objResuut["medicine_name"]?></option>
                            <?php } ?>
                        </select>
                <form id="myform" class="user" method="post" action="insert_medical.php">
                    <input type='hidden' value="<?php echo $result_User['patient_id'] ?>" name='patient_id'>
                    <input type="submit" name="insert" value="+"/>
                </form>
                </div>
            </div>
        </div>
    </div>
   
    

</body>

</html>