<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
$userid = $_SESSION["userid"];;
require "condb.php";
$timeNow = date('H');
$timeNowMinute = date('i');
$date1=date_create(date('Y-m-d'));
$count = $_REQUEST['count'];
$i = 0;

// Alert Notificaiton
	$qryAlertMedic = "SELECT * FROM `notification`n JOIN medical m ON n.medicine_id = m.medicine_id AND patient_id = $userid AND status = 1 WHERE TIME(notification_time) <= TIME(NOW()) ORDER BY n.notification_time";
            $resultAlertMedic = mysqli_query($Connect, $qryAlertMedic);
			$medic_cnt = mysqli_num_rows( $resultAlertMedic);
						while ($alertMedic =  $resultAlertMedic->fetch_assoc()) {  
						$time = date('H',strtotime($alertMedic['notification_time']));
						$timeminute = date('i',strtotime($alertMedic['notification_time']));
						$difftime = $timeNow-$time;
						$difftime = $difftime*60;
						$difftimeminute = ($timeNowMinute-$timeminute)+$difftime;
						if($difftimeminute <=59){ $i++;?>
				 <div class="column">
                    <div class="alert" ><a href="Notification.php" style="">
                        <img src="./img/pills.png" alt="Avatar" style="width:15%; margin-top: 7%; margin-left:6%;" class="img2">
                            <p>
                         			 <div style="margin-bottom: 2%;margin-top: -23%;margin-left: 23%;"> <font size="5px" color="#47b6c7"> &nbsp;
										  Time to take <?php echo $alertMedic['medicine_name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 2%;margin-left: 23%;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $alertMedic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 2%;"> 
							  <?php echo date('H:i a',strtotime($alertMedic['notification_time']));echo "."; ?>
											</font>
									</div> &nbsp;&nbsp;
             			 	</p>

					 </div>
					 </a>
                    </div>	
      							
                    </div>	
			<?php } ?> 
	<?php } 

// Alert Booking
			$qryAlertDoc = "SELECT * FROM `schedule`s JOIN staff st ON st.staff_id = s.staff_id AND s.patient_id=$userid AND s.status LIKE 'Ongoing' JOIN hospital h ON h.hospital_id = st.hospital_id AND s.notification = 1 WHERE DATE(bookingdate) >= DATE(NOW()) ORDER BY `bookingdate`";
			$resultAlertDoc = mysqli_query($Connect, $qryAlertDoc);
			$booking_cnt = mysqli_num_rows( $resultAlertDoc);
			while ($alertBooking =  $resultAlertDoc->fetch_assoc()) { 
						$date2=date_create(date('Y-m-d',strtotime($alertBooking['bookingdate'])));
						$tmp = date_diff($date1,$date2);
						$diffday = $tmp->format("%a");
// Show Booking that in 3 day.
						if($diffday<=3&&$diffday>=0){?> 	
				<div class="column">
                    <div class="alert" ><a href="Notification.php">
                        <img src="./img/doctor (2).png" alt="Avatar" style="width:15%; margin-top: 7%; margin-left:6%;" class="img2">
                            <p>
                         			 <div style="margin-bottom: 2%;margin-top: -23%;margin-left: 23%;"> <font size="5px" color="#47b6c7"> &nbsp;
										  Time to see doctor <?php echo $alertBooking['name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 2%;margin-left: 23%;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $alertBooking['hospital_name']; ?>  &nbsp;&nbsp;&nbsp;</font> 
										 
							<?php if($diffday==0){ ?>
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 2%;"> 
							  <?php echo date('H:i a',strtotime($alertBooking['bookingdate']));echo "."; ?>
											</font>
									</div> &nbsp;&nbsp;
						      				<?php  } ?> 
								<?php if($diffday>0){ ?>
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 2%;"> 
							  <?php echo $diffday." Days left" ?>
											</font>
									</div> &nbsp;&nbsp;
						      				<?php  } ?> 
             			 	</p>

					 </div>
					 </a>
                    </div>	
      				<?php  } ?> 
			<?php  } ?> 



<!--Close Title-->
			<?php if($medic_cnt==0&&$booking_cnt==0){?>
						<div style="margin-top: -3%;margin-bottom: -5%;"><font size='6' color="#a4a4a4" >Notification is empty </font></div>
				<?php }
					else if($medic_cnt<=5&&$booking_cnt<=5){?>
						<div style="position: absolute;  width: 84%;height: 0.2%;background-color: #c3c9cb;;"></div>
						<div style="margin-top: 3%;margin-bottom: -5%;"><font size="5" color="#a4a4a4" style="margin-left: 38%;">Notifications</font></div>	
				<?php }	
					else if($medic_cnt>5||$booking_cnt>5){?>
					<div style="position: absolute; width: 84%;height: 0.2%;background-color: #c3c9cb;">
						</div>
						<div style="margin-top: 3%;margin-bottom: -5%;"><font size="5" color="#a4a4a4" style="margin-left: 38%;">See more</font></div>
<?php }?>

