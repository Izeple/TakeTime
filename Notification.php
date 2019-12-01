<html>
<head>
	<STYLE>A {text-decoration: none;}
	div.alert {
		border: #D9D9D9 solid 1px;
			cursor:pointer;
			border-radius: 5px; 
			margin-top: -40px; 
			margin-bottom: 20px; 
			margin-left: -30px;
			background-color: #EBEBEB;
            transition: 0.3s;
            width: 350px;
            height: 90px;
        }

	div.alert:hover {
           background-color: #F5F5F5;
        }
	</STYLE>
    <title>Notification</title>
	<!-- Login User -->
	    <script type="text/javascript">
		  <?php
			session_start();
			$userid = $_SESSION["userid"];;
			require "condb.php"; ?>
			 <?php require "login.php"; 
			if(isset($_SESSION["email"]))
    {
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '".$_SESSION["email"]."'";
        $result_User = PDOfetchAll($sql)[0];
        $_SESSION["userid"] = $result_User["patient_id"];
    }?>
    </script>
	<!-- Connect -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
	<link rel="stylesheet" type="text/css" href="./css/pillsNoti.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./js/clickNav.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	
	<script>
		var i=0;
		setInterval(function() {
			$("#nav_noti").load("notiAlert.php");
		}, 2000);

	</script>
	
	
</head>
	
<body>
<!-- Menubar -->
    <div id="main" style="background-color: #ffffff">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn" id="btn" onclick="document.getElementById('signpop').style.display='block'">Sign up</button></li>
            <li style="float:right"><button class="btn2" id="btn2" onclick="document.getElementById('logpop').style.display='block'">Log in</button></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>

            <li style="float:right">
            <?php if(isset($_SESSION["email"])) {  
                echo "<p class='usern'style='padding: 14px 16px; margin:0; color:#4e707e;' onclick=location.replace('./profile.php');>Hi, ".$result_User["name"]."</p>"; 
            }?>
            </li>        

            <li style="float:right"><button class="btn4" id="btn4" onclick="nav_noti()"><img src="./img/bell.png" height="25"></button></li>
            <?php if(isset($_SESSION["email"])) {  
                echo "<script language=\"JavaScript\">";
                echo "document.getElementById('btn').style.display='none';";
                echo "document.getElementById('btn2').style.display='none';";
                echo "</script>";
            }
            else {
                echo "<script language=\"JavaScript\">";
                echo "document.getElementById('btn3').style.display='none';";
                echo "document.getElementById('btn4').style.display='none';";
                echo "</script>";   
            }
            ?>
			<script>
				function nav_noti()
				{
					var x = document.getElementById('nav_noti');
					if (x.style.display === 'none') {
						x.style.display = 'block';
					} else {
						x.style.display = 'none';
					}
				}
			</script>
			
			
<!-- Show Notifications Alert-->
			
				<div class="bubble" id="nav_noti" style="display: none; position:fixed; margin-top: 60;margin-left: 1374;width: 320px;">
			<?php  $qryAlertMedic = "SELECT * FROM `notification`n JOIN medical m ON n.medicine_id = m.medicine_id AND patient_id = 5 AND status = 1 WHERE TIME(notification_time) <= TIME(NOW()) ORDER BY n.notification_time";
            $resultAlertMedic = mysqli_query($Connect, $qryAlertMedic);
			$row_cnt = mysqli_num_rows( $resultAlertMedic);
						while ($alertMedic =  $resultAlertMedic->fetch_assoc()) {  ?>
				 <div class="column">
                    <div class="alert" >
                        <img src="./img/pills.png" alt="Avatar" style="width:60px; margin-top: 15px; margin-left:20px;" class="img2">
                            <p>
                         			 <div style="margin-bottom: 10px;margin-top: -85px;margin-left: 90px;"> <font size="5px" color="#47b6c7"> &nbsp;
										  Time to take <?php echo $alertMedic['medicine_name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 5px;margin-left: 90px;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $alertMedic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 30px;"> 
							<!-- Queue time alart of that pill and show -->
							  <?php echo date('H:i a',strtotime($alertMedic['notification_time']));echo "."; ?>
								</font></div> &nbsp;&nbsp;
             			 	</p>

                        </div>
                    </div>	
      
	 		<?php } ?> 
			<?php if($row_cnt==0){?>
						<div style="margin-bottom: 10px;margin-left: 50px;"><font size='6' color="#a4a4a4" >Notification is empty </font></div>
				<?php }?>
			<?php if($row_cnt<=4&&$row_cnt>0){?>
						<div style="position: absolute; width: 320px;height: 0.5%;background-color: #c3c9cb;margin-top: -15px;"></div>
						<div style="margin-top: -10px;margin-bottom: -25;"><font size="5" color="#a4a4a4" style="margin-left: 120;">Notifications</font></div>	
				<?php }?>	
			<?php if($row_cnt>4){?>
					<div style="position: absolute; width: 320px;height: 0.2%;background-color: #c3c9cb;margin-top: -15px;">
						</div>
						<div style="margin-top: -10px;margin-bottom: -25;"><font size="5" color="#a4a4a4" style="margin-left: 130;">See more</font></div>
				<?php }?>
		</div>
						
<!-- Show See more -->
        </ul>
		
            
<!-- Head picture -->
        <section><img src="./img/Banner.png" style="width:100%"  >
         <?php if(isset($_SESSION["email"])) { 
            echo '<div id="sidenav" class="sidenav">';
            echo '    <div class="sidein"><a href="profile.php"><img src="img/user.png" height="30"></a></div>';
            echo '    <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>';
            echo '    <div class="sidein"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>';
            echo '    <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>';
            echo '</div>';
        }
        else
        {
            echo '<div id="sidenav" class="sidenav">';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/user.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/help.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/time.png" height="30"></a></div>';
            echo '    <div class="sidein"><a onclick=document.getElementById("logpop").style.display="block"><img src="img/noti.png" height="30"></a></div>';
            echo '</div>';
        }
        ?>
        </section>
    </div>    

<!-- Title Notification  -->
    <h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 40;
        text-align: center;margin-top: -50px;margin-bottom: 40px">Notification</h1>
<!-- Title Next Booking -->
		   <div class="notimenu" style="margin-top: -10px; font-size: 30px">Next Booking</div>
            			<div id="showData"></div>
<!-- Queue next date meeting doctor -->
			<?php 
            $mysql_qry1 = "SELECT * FROM `schedule`s JOIN staff st ON st.staff_id = s.staff_id AND s.patient_id=$userid AND s.status LIKE 'Ongoing' JOIN hospital h ON h.hospital_id = st.hospital_id ORDER BY `bookingdate`LIMIT 1";
			$result1 = mysqli_query($Connect, $mysql_qry1);
            while ($doc =  $result1->fetch_assoc()) {
                if (isset($doc['staff_id'])) {
					$havebook=1;
                    ?>
<!-- Show next booking -->
                <div class="column" style="width: 500px;"><a href="booking_0.php">
                    <div class="pills"  style="margin-top: 30px;margin-bottom: 30px; margin-left: 160px;">
                        <img src="./img/doctor (2).png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
                        <div class="side left" align="left">
                            <p>
                                <div style="margin-bottom: 10px;margin-top: -110px;margin-left: 100;"> <font size="6px" color="#47b6c7"> &nbsp;Dr.<?php echo $doc['name']; ?>&nbsp;<?php echo $doc['surname']; ?></font></div>
                               <div style="margin-bottom: 5px;margin-left: 100;"> <font size='5' color="#a4a4a4">
                                &nbsp; At <?php echo $doc['hospital_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   <font size='5' color="#a4a4a4" style="float: right;margin-right: 15px;"> 
								   <?php echo date('d/m/Y',strtotime($doc['bookingdate'])); ?> </font></div> &nbsp;&nbsp;
              </p><p style="margin-top: -40px;">
								<font size='4' color="#a4a4a4" style="float: left;margin-left: 100;"><input type="checkbox" name="vehicle3" value=1 checked> &nbsp;Notification</font>
                                <font size='4' color="#a4a4a4" style="float: right;margin-right: 15px;"> &nbsp; <?php echo date('H:i a',strtotime($doc['bookingdate'])); ?>. </font>
                            </p>
                        </div>
					</div></a>
                </div>
	 <?php }
	} ?>
	
<!-- If booking is empty.  -->
            <?php   
			if(!isset($havebook)){
				?>
				<div class="column"  href="#" style="width: 500px;">
                    	<div class="card" style="height: 150px; background-color: #E9E9E9;border-radius: 5px; margin-top: 30px;margin-bottom: 30px; margin-left: 160px;">    
                     	<a href="booking_0.php"><img src="./img/add.jpg" alt="Add" style="width:80px; margin-top: 15px; margin-left: 170px; border-radius: 60px;box-shadow: 3px 3px 3px #888888;" ></a>
						<br><table width="420" height="50"> <tr align="center" valign="middle"> <td>
						<font size='5'  color="#a4a4a4" >Add Booking</font>
						</td></tr></table>
                    </div>
                </div>
			 <?php	
			}
	 ?>

<!--Set Time Notification-->
				<div id="setNoti" class="popSetup" style="display: none; float: right; margin-top: -180;margin-right:  120px;">
					<form action="insertnoti.php" method="POST" >
						<input type="int" name="staff_id" id="staff_id" style="display: none;" />
						<input type="int" name="medicine_id" id="medicine_id" style="display: none;" />
						<input type="int" name="partient_id" id="partient_id" style="display: none;" />
						<input type="int" name="remaining_time" id="remaining_time" style="display: none;" />
						<input type="text" name="status_Noti" id="status_Noti"  style="display: none;" />
	<!--Set Time To Take -->
				<div  style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px; margin-bottom: 50px; "> 
						<div style="float: left;height: 345px;width: 1050px;">
						<!--Morning-->
							<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top:20;margin-left: 100;"> 
								<img src="./img/sunrise (2).png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
								<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Morning"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:405;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>

								<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 296;"> <div style="float: right;"><input type="text" name="hmorn" id="hmorn"value="08"  style="display: none;" /><font id="h_morn" size='5' color="#828282"><?php echo "08"; ?></font></div></div>
								<div  style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 405;"> <div style="float: right;"><input type="text" name="mmorn" id="mmorn" value="00" style="display: none;" /><font id="m_morn" size='5' color="#828282"><?php echo "00"; ?></font></div></div>
									<div class="triangle-up" onclick="clicked(1,h_morn)" style="margin-left: 360;margin-top: -70;"></div>
									<div class="triangle-down" onclick="clicked(-1,h_morn)" style="margin-left: 360;margin-top: -40;"></div>
									<div class="triangle-up" onclick="clicked(1,m_morn)" style="margin-left:469;margin-top: -70;"></div>
									<div class="triangle-down" onclick="clicked(-1,m_morn)" style="margin-left: 469;margin-top: -40;"></div>
						<!--Evenning-->
							<div style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 30;margin-left: 100;"> 
								<img src="./img/sunset.png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
								<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Evening"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:405;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 296;"><div style="float: right;"><input type="text" name="heven" id="heven" value="18" style="display: none;" /><font id="h_even" size='5' color="#828282"><?php echo "18"; ?></font></div> </div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 405;"> <div style="float: right;"><input type="text" name="meven" id="meven" value="00" style="display: none;" /><font id="m_even" size='5' color="#828282"><?php echo "00"; ?></font></div></div>
										<div class="triangle-up" onclick="clicked(1,h_even)" style="margin-left: 360;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1,h_even)" style="margin-left: 360;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1,m_even)" style="margin-left:469;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1,m_even)" style="margin-left: 469;margin-top: -40;"></div>
						<!--Sun-->
							<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: -305;margin-left: 550;"> 
								<img src="./img/sun (1).png" style="width:95px; margin-top: 10px; margin-left: 20px;" >
								<div style="margin-left:50;"><font size='5' color="#828282"><?php echo "Noon"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:750;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:855;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 750;"> <div style="float: right;"><input type="text" name="hsun" id="hsun" value="12" style="display: none;" /><font id="h_sun" size='5' color="#828282"><?php echo "12"; ?></font></div></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 859;"><div style="float: right;"><input type="text" name="msun" id="msun" value="00" style="display: none;" /><font id="m_sun" size='5' color="#828282"><?php echo "00"; ?></font></div> </div>
										<div class="triangle-up" onclick="clicked(1,h_sun)" style="position: absolute;margin-left: 814;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1,h_sun)" style="position: absolute;margin-left: 814;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1,m_sun)" style="position: absolute;margin-left: 923;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1,m_sun)" style="position: absolute;margin-left: 923;margin-top: -40;"></div>
						<!--Night-->
							<div style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 25;margin-left: 550;"> 
								<img src="./img/sleep.png"  style="width:85px; margin-top: 13px; margin-left: 30px;" >
								<div style="margin-top: 5;margin-left:50;"><font size='5' color="#828282"><?php echo "Night"; ?></div>
								</div>
								<div style="position: absolute; margin-top: -100;margin-left:750;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:855;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 750;"> <div style="float: right;"><input type="text" name="hnight" id="hnight" value="21" style="display: none;" /><font id="h_night" size='5' color="#828282"><?php echo "21"; ?></font></div></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 859;"><div style="float: right;"><input type="text" name="mnight" id="mnight" value="00" style="display: none;" /><font id="m_night" size='5' color="#828282"><?php echo "00"; ?></font></div> </div>
										<div class="triangle-up" onclick="clicked(1,h_night)" style="margin-left: 814;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1,h_night)" style="margin-left: 814;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1,m_night)" style="margin-left: 923;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1,m_night)" style="margin-left: 923;margin-top: -40;"></div>
						</div>
				</div>
						
<!--Infomation Noti-->
				<div id="infoMedic" style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px;"> 
	<!--Infomation Noti Left Side-->
					<div><img src="./img/pills.png" style="width:130px; margin-top: 35px; margin-left: 30px;">	
						<div style="width:500px;margin-top: -120px; margin-left: 190px"><font id="name" size='7' color="#828282" >
                              	  &nbsp;&nbsp;&nbsp;</font></div>
						<div style="margin-top: 20px; margin-left: 190;width:500px;"><font id="times" size='6' color="#828282" >  
								  &nbsp;&nbsp;&nbsp;</font></div>
						<div style="margin-top: -38px; margin-left: 400;width:500px;"><font id="loop" size='6' color="#828282" >  
								  &nbsp;&nbsp;&nbsp;</font></div>
					</div>	
			
	<!-- Detail Bottom -->
					<div>
						<div  id="Before" style="border: 2px solid #D5D5D5; height: 55px;width: 120px; background-color: whitesmoke;border-radius: 5px; margin-left: 210px;margin-top: 40px;"> 
									<div id="Before" style="margin-left: 25;margin-top: 8"><font id="BeforeFont" size='6' color="#828282">
									<?php echo "Before"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
						</div>
						<div id="After" style="border: 2px solid #D5D5D5; height: 55px;width: 120px; background-color: whitesmoke;border-radius: 5px; margin-left: 360px;margin-top: -59px;"> 
									<div  style="margin-left: 35;margin-top: 8"><font id="AfterFont"size='6' color="#828282">
									<?php echo "After"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
						</div>
				  				<img src="./img/breakfast.png"  style="width:90px; margin-top: -100px; margin-left: 530px;" >	
								<div style="width: 120px;margin-left:545;margin-top: 0"><font size='6' color="#828282">
									 <?php echo "Meals"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
					</div>
	<!--Time Noti Right Side-->
						<div style="float: right; width: 350px; height: 320px;margin-top: -281px">
							<!--Morning-->
								<div id="Morn" style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; 		 margin-top: 15;"> 
									<img src="./img/sunrise (2).png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
									<div style="margin-top: -12;margin-left:40;"><font id="FMorn" size='5'><?php echo "Morning"; ?></font></div>
								</div>
							<!--Noon-->
								<div id="Noon" style="border: 2px solid #D5D5D5;height: 135px; width: 135px; background-color: whitesmoke;border-radius: 5px; margin-left: 		160;margin-top: -138;"> 
									<img src="./img/sun (1).png" style="width:95px; margin-top: 10px; margin-left: 20px;" >
									<div style="margin-left:50;"><font id="FNoon" size='5'><?php echo "Noon"; ?></font></div>
								</div>
							<!--Evening-->
								<div  id="Even"style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 10;"> 
									<img src="./img/sunset.png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
									<div style="margin-top: -12;margin-left:40;"><font id="FEven" size='5'><?php echo "Evening"; ?></font></div>
								</div>
							<!--Night-->
								<div  id="Night" style="border: 2px solid #D5D5D5;height: 135px; width: 135px; background-color: whitesmoke;border-radius: 5px; 	  margin-left: 160;margin-top: -138;"> 
									<img src="./img/sleep.png"  style="width:85px; margin-top: 13px; margin-left: 30px;" >
									<div style="margin-top: 5;margin-left:50;"><font id="FNight" size='5'><?php echo "Night"; ?></font></div>
								</div>
						</div>
				</div>
									<!--Botton-->
									<div>
										<div  id="closeNoti" class="closeNoti" href="#close" onclick="closeForm()"> 
							<div  style="margin-left: 30;margin-top: 7"><font size='6px' color="#475254"><?php echo "CLOSE"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
										</div>
											<input  type="submit" class="confirmNoti" value="SAVE" style="color: white;font-size: 22px;"/>
									</div>	
				</form>
			</div>
<!-- Title Medicine  -->
			 <div class="notimenu" style="font-size: 30px; ">Medicine</div>
<!-- Queue Medicine -->			            
			<?php
            $mysql_qry2 = "SELECT s.bookingdate,s.staff_id ,hi.times, m.medicine_id, m.medicine_timetake, m.medicine_timeloop, m.meal_status, s.status, m.medicine_name FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id AND s.patient_id =$userid AND s.status LIKE 'Complete'";
            $result2 = mysqli_query($Connect, $mysql_qry2);
			//Count pills in history medicine.
			$mysql_qryCount1="SELECT COUNT(*) AS count FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id AND s.patient_id =$userid";
			$countResult = mysqli_query($Connect, $mysql_qryCount1);
			$count = $countResult->fetch_assoc();
				if ($count['count']!=0) {?>
				 		<div style=" border: 2px solid #e3e7e7; margin-left: 150px;margin-top: 15px;margin-bottom: 10px;width: 463px;">
						<div style="margin-top: 10px;margin-bottom: 10px;"> <?php 
				while ($medic =  $result2->fetch_assoc()) {  ?>
				
                <div class="column">
                    <div class="pills" id="<?php echo $medic['medicine_id'];?>" onclick="openForm('<?php echo $medic['medicine_id']; ?>','<?php echo $medic['medicine_name']; ?>','<?php echo $medic['times']; ?>','<?php echo $medic['medicine_timetake']; ?>','<?php echo $medic['meal_status']; ?>','<?php echo $medic['medicine_timeloop']; ?>','<?php echo $medic['medicine_id']; ?>','<?php echo $medic['staff_id']; ?>','<?php echo $userid; ?>')">
                        <img src="./img/pills.png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
       
                            <p>
                         			 <div style="margin-bottom: 10px;margin-top: -110px;margin-left: 100px;"> <font size="6px" color="#47b6c7"> &nbsp;
										  Time to take <?php echo $medic['medicine_name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 5px;margin-left: 100px;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $medic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 15px;"> 
							<!-- Queue time alart of that pill and show -->
							  <?php $medicid = $medic['medicine_id'];
									$mysql_qry3 = "SELECT * FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id JOIN notification n ON n.medicine_id= $medicid AND n.patient_id = $userid ORDER BY n.notification_time";
									$result3 = mysqli_query($Connect, $mysql_qry3);
									$noti = $result3->fetch_assoc();
									if ($noti['notification_time']!=NULL) {echo date('H:i a',strtotime($noti['notification_time']));echo "."; }?>
								</font></div> &nbsp;&nbsp;
             			 	</p>
							<p style="margin-top: -50px;">
								<font size='4' color="#a4a4a4" style="float: left;margin-left: 100px;">
									<?php
											if($noti['status']=="1"){
									?>
									<input type="checkbox" name="statusNoti" id="statusNoti" onClick="changeNotiAlert(this,'<?php echo $medicid; ?>','<?php echo $userid; ?>')" value=1 checked>
									<?php
											}
									?>
									<?php
											if($noti['status']!="1"){
									?>
									<input type="checkbox" name="statusNoti" id="statusNoti" onClick="changeNotiAlert(this,'<?php echo $medicid; ?>','<?php echo $userid; ?>')" value=0>
									<?php
											}
									?>
									&nbsp;Notification</font>
								<?php if($noti['remaining_time']!=NULL && $noti['remaining_time']>0){ ?>
         						 	<font size='4' color="#a4a4a4" style="float: right;margin-right: 15px;"> &nbsp; <?php echo $noti['remaining_time']; ?> times </font><?php } ?>
                            </p>
                        </div>
                    </div>	
      
	 		<?php } ?> 						
			</div>
		 </div>
	<?php } ?>
 <!-- If pills is empty -->
          <?php   if ($count['count']==0){ ?>
				 <div class="column"  style="width: 500px;">
                    <div class="card" style="height: 150px; background-color: #E9E9E9;border-radius: 5px; margin-top: 30px;margin-bottom: 30px; margin-left: 160px;">    
     
						<br><table width="420" height="110"> <tr align="center" valign="middle"> <td>
						<font size='6'  color="#a4a4a4" >Don't have medicine.</font>
						</td></tr></table>
                    </div>
                </div>
		  <?php } ?>


									
<script type="text/javascript">
		var pillid = 0;
		var firstTimePill = 0;
		function openForm(id,name, times, daytime, status, loop, medicid, staffid, userid) {
		if(firstTimePill == 0){
			pillid = id;
			firstTimePill++;
		}	
		if(firstTimePill != 0&& pillid != id){
			document.getElementById(pillid).style.backgroundColor = "#E9E9E9";
			pillid = id;
		}	
		document.getElementById(id).style.backgroundColor = "#fafafa";
		status_Noti.value = 1;
		staff_id.value  = staffid;
		partient_id.value  = userid;
		remaining_time.value  = times;
		medicine_id.value  = medicid;
	
		document.getElementById("Before").style.backgroundColor = "f5f5f5";
		document.getElementById("After").style.backgroundColor = "f5f5f5";
		document.getElementById("BeforeFont").style.color = "#828282";
		document.getElementById("AfterFont").style.color = "#828282";
		document.getElementById("Morn").style.backgroundColor = "f5f5f5";document.getElementById("FMorn").style.color = "828282";
		document.getElementById("Even").style.backgroundColor = "f5f5f5";document.getElementById("FEven").style.color = "#828282";
		document.getElementById("Noon").style.backgroundColor = "f5f5f5";document.getElementById("FNoon").style.color = "#828282";
		document.getElementById("Night").style.backgroundColor = "f5f5f5";document.getElementById("FNight").style.color = "#828282";
		//Set up back
		
  		document.getElementById("setNoti").style.display = "block";
		document.getElementById("name").innerHTML = 'NAME: '+name;
		document.getElementById("times").innerHTML = 'Times: '+times+' times';
		if(loop!=0){
		document.getElementById("loop").innerHTML = 'Period: '+loop+' Hour';
		}
		if(loop==0){
		document.getElementById("loop").innerHTML = 'Period: - Hour';
		}
		if(status=="Before"){
			document.getElementById("Before").style.backgroundColor = "#5cc6d6";
			document.getElementById("BeforeFont").style.color = "white";
		}
		if(status=="After"){
			document.getElementById("After").style.backgroundColor = "#5cc6d6";
			document.getElementById("AfterFont").style.color = "white";
		}
		if(daytime==1000||daytime==1100||daytime==1110||daytime==1111||daytime==1001||daytime==1011||daytime==1010||daytime==1101){
			document.getElementById("Morn").style.backgroundColor = "#f57988";
			document.getElementById("FMorn").style.color = "white";
		}
		if(daytime==0100||daytime==1100||daytime==1110||daytime==1111||daytime==0110||daytime==0111||daytime==0101||daytime==1101){
			document.getElementById("Even").style.backgroundColor = "#f57988";
			document.getElementById("FEven").style.color = "white";
		}
		if(daytime==0010||daytime==1010||daytime==1110||daytime==1111||daytime==0011||daytime==1010||daytime==1011||daytime==0110){
			document.getElementById("Noon").style.backgroundColor = "#f57988";
			document.getElementById("FNoon").style.color = "white";
		}
		if(daytime==0001||daytime==1001||daytime==1101||daytime==1111||daytime==0101||daytime==0111||daytime==0011||daytime==1011){
			document.getElementById("Night").style.backgroundColor = "#f57988";
			document.getElementById("FNight").style.color = "white";
		}
	}
	function closeForm() {
		document.getElementById(pillid).style.backgroundColor = "#E9E9E9";
		document.getElementById("setNoti").style.display = "none";
	}
	function selectPill(id){
		document.getElementById(id).style.backgroundColor = "#ffffff";
	}
//Set Up Time
	var daytime = new Array("h_morn", "h_sun" ,"h_even" ,"h_night", "m_morn" ,"m_sun" ,"m_even" ,"h_night");
	var firstTime = 0;
	function clicked(n,time){
		if(firstTime==0){	 
			daytime[0] = 8;
			daytime[1] = 12;
			daytime[2] = 18;
			daytime[3] = 21;
			daytime[4] = 0;
			daytime[5] = 0;
			daytime[6] = 0;
			daytime[7] = 0;
			firstTime++;
		}
	//Set Up First Time
		switch(time){
				case h_morn:
					i=daytime[0];
					if(i<22&&i){}
					i = i + n;
					daytime[0]=i;
				hmorn.value  = i;
				break;
				case h_sun:
					i=daytime[1];
					i = i + n;
					daytime[1]=i;
				hsun.value  = i;
				break;
				case h_even:
					i=daytime[2];
					i = i + n;
					daytime[2]=i;
				heven.value  = i;
				break;
				case h_night:
					i=daytime[3];
					i = i + n;
					daytime[3]=i;
				hnight.value  = i;
				break;
				case m_morn:
					i=daytime[4];
					i = i + n;
					daytime[4]=i;
				mmorn.value  = i;	
				break;
				case m_sun:
					i=daytime[5];
					i = i + n;
					daytime[5]=i;
				msun.value  = i;	
				break;
				case m_even:
					i=daytime[6];
					i = i + n;
					daytime[6]=i;
				meven.value  = i;	
				break;
				case m_night:
					i=daytime[7];
					i = i + n;
					daytime[7]=i;
				mnight.value  = i;	
				break;
			}
	//Result Time
			time.innerHTML = i;
	};
	
	function changeNotiAlert(checkbox,medicid,userid){
			var xhttp;
			xhttp = new XMLHttpRequest();
		 if(checkbox.checked){
            xhttp.open("GET", "checkBoxNoti.php?status=1&medicid="+medicid+"&userid="+userid, true);
            xhttp.send();
    }
    //If it has been unchecked.
    else{ 
			xhttp.open("GET", "checkBoxNoti.php?status=0&medicid="+medicid+"&userid="+userid, true);
            xhttp.send();
    }
		
	}
	window.onclick;	
	</script>
		
</body>

    
</html>