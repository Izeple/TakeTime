<?php
date_default_timezone_set('Asia/Bangkok');

require "condb.php";
$timeNow = date('H');
$timeNowMinute = date('i');
$timeNowtest = date('H:i:s');
$count = 0;
	$qryAlertMedic = "SELECT * FROM `notification`n JOIN medical m ON n.medicine_id = m.medicine_id AND patient_id = 5 AND status = 1 WHERE TIME(notification_time) <= TIME(NOW()) ORDER BY n.notification_time";
            $resultAlertMedic = mysqli_query($Connect, $qryAlertMedic);
			$row_cnt = mysqli_num_rows( $resultAlertMedic);
						while ($alertMedic =  $resultAlertMedic->fetch_assoc()) {  
						$time = date('H',strtotime($alertMedic['notification_time']));
						$timeminute = date('i',strtotime($alertMedic['notification_time']));
						$difftime = $timeNow-$time;
						$difftime = $difftime*60;
						$difftimeminute = ($timeNowMinute-$timeminute)+$difftime;
						if($difftimeminute <=59){?>
<script type="text/javascript">
	change = countAlert.value;
	change = change+1;
	countAlert.value = change;
</script>
				 <div class="column">
                    <div class="alert" ><a href="Notification.php">
                        <img src="./img/pills.png" alt="Avatar" style="width:60px; margin-top: 15px; margin-left:20px;" class="img2">
                            <p>
                         			 <div style="margin-bottom: 10px;margin-top: -85px;margin-left: 90px;"> <font size="5px" color="#47b6c7"> &nbsp;
										  Time to take <?php echo $alertMedic['medicine_name']; ?>&nbsp;!</font></div>
                               		 <div style="margin-bottom: 5px;margin-left: 90px;"> <font size='5' color="#a4a4a4"> &nbsp; 
										  <?php echo $alertMedic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   
										  <font size='5' color="#a4a4a4" style="float: right;margin-right: 30px;"> 
							<!-- Queue time alart of that pill and show -->
							  <?php echo date('H:i a',strtotime($alertMedic['notification_time']));echo "."; ?>
											</font>
									</div> &nbsp;&nbsp;
             			 	</p>

					 </div>
					 </a>
                    </div>	
      							<input type="int" name="countAlert" id="countAlert" />
	<?php $count++; } ?> 
	 		<?php } ?> 
			<?php if($count==0){?>
						<div style="margin-bottom: 10px;margin-left: 50px;"><font size='6' color="#a4a4a4" >Notification is empty </font></div>
				<?php }?>
			<?php if($count<=5&&$count>0){?>
						<div style="position: absolute; width: 320px;height: 0.5%;background-color: #c3c9cb;margin-top: -15px;"></div>
						<div style="margin-top: -10px;margin-bottom: -25;"><font size="5" color="#a4a4a4" style="margin-left: 120;">Notifications</font></div>	
				<?php }?>	
			<?php if($count>5){?>
					<div style="position: absolute; width: 320px;height: 0.2%;background-color: #c3c9cb;margin-top: -15px;">
						</div>
						<div style="margin-top: -10px;margin-bottom: -25;"><font size="5" color="#a4a4a4" style="margin-left: 130;">See more</font></div>
<?php }?>

