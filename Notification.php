<html>
<head>
	<STYLE>A {text-decoration: none;} </STYLE>
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

</head>
	
<body>
<!-- Menubar -->
    <div id="main">
        <ul>
       	<li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
       	<li><a href="Homepage.php"><img src="./img/nametag.png" height="15"></a></li>
 	 	<li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
			    <li style="float:right">
            <?php if(isset($_SESSION["email"])) {  
                echo "<p class='usern'style='padding: 14px 16px; margin:0; color:#4e707e;' onclick=location.replace('./profile.php');>Hi, ".$result_User["name"]."</p>"; 
            }?>
            </li>        
      	<li style="float:right"><button class="btn4" id="btn4" ><img src="./img/bell.png" height="25"></button></li>
        </ul>
		

            
<!-- Head picture -->
        <section><img src="./img/Banner.png" style="width:100%"  >
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

<!-- Title Notification  -->
    <h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 40;
        text-align: center;margin-top: -50px;margin-bottom: 40px">Notification</h1>
<!-- Title Next Booking -->
		   <div class="notimenu" style="margin-top: -10px; font-size: 30px">Next Booking</div>
            
<!-- Queue next date meeting doctor -->
			<?php 
            $mysql_qry1 = "SELECT st.staff_id,st.name,st.surname,h.hospital_name,COUNT(*) AS count,MIN(bookingdate) AS bookingdate FROM `schedule`s JOIN staff st ON st.staff_id = s.staff_id AND s.patient_id=$userid AND s.status LIKE 'G%' JOIN hospital h ON h.hospital_id = st.hospital_id";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($doc =  $result1->fetch_assoc()) {
                if ($doc['count']!=0) {
                    ?>
<!-- Show next booking -->
                <div class="column" style="width: 500px;"><a href="#doctor">
                    <div class="pills"  style="margin-top: 30px;margin-bottom: 30px; margin-left: 160px;">
                        <img src="./img/doctor (2).png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
                        <div class="side left" align="left">
                            <p>
                                <div style="margin-bottom: 10px;margin-top: -100px;margin-left: 100;"> <font size="6px" color="#47b6c7"> &nbsp;Dr.<?php echo $doc['name']; ?>&nbsp;<?php echo $doc['surname']; ?></font></div>
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
	 <?php } ?>
	
<!-- If booking is empty.  -->
            <?php   
			if ($doc['count']==0){
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
		} ?>

<!--Set Time Notification-->
			<div id="setNoti" class="popSetup" style="display: none;float: right; margin-top: -100;margin-right:  120px;">
				<form>
	<!--Set Time To Take -->
				<div  style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px; margin-bottom: 50px; "> 
						<div style="float: left;height: 345px;width: 1050px;">
						<!--Morning-->
							<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 20;margin-left: 100;"> 
								<img src="./img/sunrise (2).png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
								<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Morning"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:405;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
								<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 296;"> <div style="float: right;"><font id="<?php $htime="hour_mornning" ?>"size='5' color="#828282"><?php echo "8"; ?></font></div></div>
								<div  style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 405;"> <div style="float: right;"><font id="minute" size='5' color="#828282"><?php echo "00"; ?></font></div></div>
									<div class="triangle-up" onclick="clicked(1,HOUR)" style="position: absolute;margin-left: 360;margin-top: -70;"></div>
									<div class="triangle-down" onclick="clicked(-1,hour)" style="position: absolute;margin-left: 360;margin-top: -40;"></div>
									<div class="triangle-up" onclick="clicked(1,minute)" style="position: absolute;margin-left:469;margin-top: -70;"></div>
									<div class="triangle-down" onclick="clicked(-1,minute)" style="position: absolute;margin-left: 469;margin-top: -40;"></div>
						<!--Evenning-->
							<div style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 30;margin-left: 100;"> 
								<img src="./img/sunset.png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
								<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Evening"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:405;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 296;"> </div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -60;margin-left: 405;"> </div>
										<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 360;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 360;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left:469;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 469;margin-top: -40;"></div>
						<!--Sun-->
							<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: -305;margin-left: 550;"> 
								<img src="./img/sun (1).png" style="width:95px; margin-top: 10px; margin-left: 20px;" >
								<div style="margin-left:50;"><font size='5' color="#828282"><?php echo "Noon"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:750;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:855;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 750;"> </div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 859;"> </div>
										<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 814;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 814;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 923;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 923;margin-top: -40;"></div>
						<!--Night-->
							<div style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 25;margin-left: 550;"> 
								<img src="./img/sleep.png"  style="width:85px; margin-top: 13px; margin-left: 30px;" >
								<div style="margin-top: 5;margin-left:50;"><font size='5' color="#828282"><?php echo "Night"; ?></div>
							</div>
								<div style="position: absolute; margin-top: -100;margin-left:750;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:855;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 750;"> </div>
									<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 859;"> </div>
										<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 814;margin-top: -70;"></div>
										<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 814;margin-top: -40;"></div>
											<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 923;margin-top: -70;"></div>
											<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 923;margin-top: -40;"></div>
						</div>
				</div>
						
<!--Infomation Noti-->
				<div id="infoMedic"style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px;"> 
	<!--Infomation Noti Left Side-->
					<div><img src="./img/pills.png" style="width:130px; margin-top: 35px; margin-left: 30px;">	
							 <div style="width:500px;margin-top: -120px; margin-left: 190px"><font id="name" size='7' color="#828282" >
                              	  &nbsp;&nbsp;&nbsp;</font></div>
					</div>	
							<div style="margin-top: 20px; margin-left: 190;width:500px;"><font id="times" size='6' color="#828282" >  
								  &nbsp;&nbsp;&nbsp;</font></div>
	<!-- Detail Bottom -->
					<div >
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
							<div  style="margin-left: 33;margin-top: 7"><font size='6' color="#475254"><?php echo "Close"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
										</div>
											<div  class="confirmNoti" href="#confirm"> 
							<div style="margin-left: 36;margin-top: 7"><font size='6' color="white"><?php echo "Save"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
											</div>
									</div>
								
				</form>
			</div>
<!-- Title Medicine  -->
			 <div class="notimenu" style="font-size: 30px; ">Medicine</div>
<!-- Queue Medicine -->			            
			<?php
            $mysql_qry2 = "SELECT s.bookingdate ,hi.times, m.medicine_id, m.medicine_timetake, m.medicine_timeloop, m.meal_status, s.status, m.medicine_name FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id AND s.patient_id =$userid";
            $result2 = mysqli_query($Connect, $mysql_qry2);
			//Count pills in history medicine.
			$mysql_qryCount1="SELECT COUNT(*) AS count FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON hi.schedule_id = s.schedule_id AND s.patient_id =$userid";
			$countResult = mysqli_query($Connect, $mysql_qryCount1);
			$count = $countResult->fetch_assoc();
				if ($count['count']!=0) {?>
				 		<div style=" border: 2px solid #e3e7e7; margin-left: 150px;margin-top: 15px;margin-bottom: 10px;width: 463px;">
						<div style="margin-top: 10px;margin-bottom: 10px;"> <?php 
				while ($medic =  $result2->fetch_assoc()) { ?>
                <div class="column" >
                    <div class="pills" onclick="openForm('<?php echo $medic['medicine_name']; ?>','<?php echo $medic['times']; ?>','<?php echo $medic['medicine_timetake']; ?>','<?php echo $medic['meal_status']; ?>')">
                        <img src="./img/pills.png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
       
                            <p>
                         			 <div style="margin-bottom: 10px;margin-top: -110px;margin-left: 100px;"> <font size="6px" color="#47b6c7"> &nbsp;
										  Time to take <?php echo $medic['medicine_name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 5px;margin-left: 100px;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $medic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 15px;"> 
							<!-- Queue time alart of that pill and show -->
							  <?php $medicid = $medic['medicine_id'];
									$mysql_qry3 = "SELECT * FROM `medical`m JOIN history_medicine hi ON m.medicine_id = hi.medicine_id JOIN schedule s ON 	hi.schedule_id = s.schedule_id AND s.patient_id =5 JOIN notification n ON n.medicine_id= $medicid;";
									$result3 = mysqli_query($Connect, $mysql_qry3);
									$noti = $result3->fetch_assoc();
									if ($noti['notification_time']!=NULL) {echo date('H:i a',strtotime($noti['notification_time']));echo "."; }?>
								</font></div> &nbsp;&nbsp;
             			 	</p>
							<p style="margin-top: -50px;">
								<font size='4' color="#a4a4a4" style="float: left;margin-left: 100px;"><input type="checkbox" name="vehicle3" value=1 checked> &nbsp;Notification</font>
								<?php if($noti['remaining_times']!=NULL && $noti['remaining_times']>0){ ?>
         						 	<font size='4' color="#a4a4a4" style="float: right;margin-right: 15px;"> &nbsp; <?php echo $noti['remaining_times']; ?> times </font><?php } ?>
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


									
<script >
	
	function openForm(name, times, daytime, status) {
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
		document.getElementById("setNoti").style.display = "none";
	}
	</script>
		
</body>

    
</html>