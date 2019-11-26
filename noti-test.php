	<!--Set time noti-->
					<div id="setNoti" class="popSetup">
						<form>
							<div class="popUp-container">
						<!--Set time noti eat-->
							<div  style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px; margin-bottom: 50px; "> 
								<div style="float: left;height: 345px;width: 1050px;">
									<!--Morning-->
							<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 20;margin-left: 100;"> 
									<img src="./img/sunrise (2).png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
									<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Morning"; ?></div>
								</div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:400;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
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
								<div style="position: absolute; margin-top: -100;margin-left:400;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
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
									<div style="position: absolute; margin-top: -100;margin-left:200;"><font size='5' color="#828282"><?php echo "Hour "; ?></font></div>
								<div style="position: absolute; margin-top: -100;margin-left:300;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
								</div>
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
								<div style="position: absolute; margin-top: -100;margin-left:850;"><font size='5' color="#828282"><?php echo "Minute "; ?></font></div>
								<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 750;"> </div>
								<div style="position: absolute;border: 2px solid #D5D5D5; height: 25px;width: 40px; background-color: whitesmoke;border-radius: 5px; margin-top: -63;margin-left: 859;"> </div>
								<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 814;margin-top: -70;"></div>
								<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 814;margin-top: -40;"></div>
								<div class="triangle-up" onclick="clicked(1)" style="position: absolute;margin-left: 923;margin-top: -70;"></div>
								<div class="triangle-down" onclick="clicked(-1)" style="position: absolute;margin-left: 923;margin-top: -40;"></div>
						</div>

					
					</div>
						
						<!--Infomation Noti-->
					<div style=" height: 345px;width: 1050px; background-color: #E9E9E9;border-radius: 5px;"> 
						<!--Infomation Noti Left Side-->
						 <div><img src="./img/pills.png" style="width:130px; margin-top: 35px; margin-left: 30px;">	
							 <div style="width:500px;margin-top: -120px; margin-left: 190px"><font size='7' color="#828282" >
                               <?php echo "NAME: Paracetamol"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
					</div>	
						<div style="margin-top: 20px; margin-left: 190;width:500px;"><font size='6' color="#828282" style="">
                               <?php echo "Times: 12 times"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
				<div >
						<div  style="border: 2px solid #D5D5D5; height: 55px;width: 120px; background-color: whitesmoke;border-radius: 5px; margin-left: 210px;margin-top: 40px;"> 
							<div style="margin-left: 25;margin-top: 8"><font size='6' color="#828282"><?php echo "Before"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
					</div>
						<div style="border: 2px solid #D5D5D5; height: 55px;width: 120px; background-color: whitesmoke;border-radius: 5px; margin-left: 360px;margin-top: -59px;"> 
							<div style="margin-left: 35;margin-top: 8"><font size='6' color="#828282"><?php echo "After"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
					</div>
				  <img src="./img/breakfast.png"  style="width:90px; margin-top: -100px; margin-left: 530px;" >	
					<div style="width: 120px;margin-left:545;margin-top: 0"><font size='6' color="#828282"><?php echo "Meals"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
					</div>
						<!--Time Noti Right Side-->
						<div style="float: right; width: 350px; height: 320px;margin-top: -281px">
								<!--Morning-->
								<div style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 15;"> 
									<img src="./img/sunrise (2).png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
									<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Morning"; ?></div>
								</div>
										<!--Noon-->
								<div  style="border: 2px solid #D5D5D5;height: 135px; width: 135px; background-color: whitesmoke;border-radius: 5px; margin-left: 160;margin-top: -138;"> 
									<img src="./img/sun (1).png" style="width:95px; margin-top: 10px; margin-left: 20px;" >
									<div style="margin-left:50;"><font size='5' color="#828282"><?php echo "Noon"; ?></div>
								</div>
										<!--Evening-->
								<div  style="border: 2px solid #D5D5D5; height: 135px;width: 135px; background-color: whitesmoke;border-radius: 5px; margin-top: 10;"> 
									<img src="./img/sunset.png"  style="width:110px; margin-top: 5px; margin-left: 10px;" >
									<div style="margin-top: -12;margin-left:40;"><font size='5' color="#828282"><?php echo "Evening"; ?></div>
								</div>
										<!--Night-->
								<div  style="border: 2px solid #D5D5D5;height: 135px; width: 135px; background-color: whitesmoke;border-radius: 5px; margin-left: 160;margin-top: -138;"> 
									<img src="./img/sleep.png"  style="width:85px; margin-top: 13px; margin-left: 30px;" >
									<div style="margin-top: 5;margin-left:50;"><font size='5' color="#828282"><?php echo "Night"; ?></div>
								</div>
						</div>
				</div>
									<!--Botton-->
									<div>
										<div  class="closeNoti" href="#close"> 
							<div  style="margin-left: 33;margin-top: 7"><font size='6' color="white"><?php echo "Close"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
										</div>
											<div  class="confirmNoti" href="#confirm"> 
							<div style="margin-left: 36;margin-top: 7"><font size='6' color="white"><?php echo "Save"; ?>  &nbsp;&nbsp;&nbsp;</font></div>
											</div>
									</div>
									</div>
				</form>
			</div>
 