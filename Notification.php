<html>
<head>
    <title>Notification</title>
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
		  <?php
			session_start();
			$userid = $_SESSION["userid"];
			require "condb.php"; ?>
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./script/clickNav.js"></script>

</head>
<body>

    <div id="main">
        <ul>
       <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
       <li><a href="Homepage.php"><img src="./img/nametag.png" height="15"></a></li>
       <li style="float:right"><button class="btn" id="btn">Sign up</button></li>
       <li style="float:right"><button class="btn2" id="btn2">Log in</button></li>
        </ul>

        <section><img src="./img/Banner.png" style="width:100%">
        <div class="ab" align="center">
            <div id="sidenav" class="sidenav">
                    <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
                    <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                    <div class="sidein"><a href="booking.php"><img src="img/time.png" height="30"></a></div>
                    <div class="sidein"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>
        </div>
        </section>
    </div>    

    
    <h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 40;
        text-align: center;margin-top: -50px;margin-bottom: 40px">Booking Doctor</h1>

		   <div class="notimenu" style="margin-top: -10px; font-size: 30px">Next Booking</div>
            <?php
            $mysql_qry1 = "SELECT st.staff_id,st.name,st.surname,h.hospital_name,COUNT(*) AS count,MAX(bookingdate) AS bookingdate FROM `schedule`s JOIN staff st ON st.staff_id = s.staff_id AND s.patient_id=$userid  JOIN hospital h ON h.hospital_id = st.hospital_id";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($doc =  $result1->fetch_assoc()) {
                if ($doc['count']!=0) {
                    ?>
              
                <div class="column">
                    <div class="card" style="height: 135px; background-color: #E9E9E9;border-radius: 5px; margin-top: 30px;margin-bottom: 30px; margin-left: 100px;">
                        <img src="./img/doctor (2).png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
                        <div class="side left" align="left">
                            <p>
                                <div style="margin-bottom: 10px;margin-top: -5px;"> <font size="6px" color="#47b6c7"> &nbsp;Dr.<?php echo $doc['name']; ?>&nbsp;<?php echo $doc['surname']; ?></font></div>
                               <div style="margin-bottom: 5px;"> <font size='5' color="#a4a4a4">
                                &nbsp; At <?php echo $doc['hospital_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   <font size='5' color="#a4a4a4" style="float: right;margin-right: 15px;"> 
								   <?php echo date('d/m/Y',strtotime($doc['bookingdate'])); ?> </font></div> &nbsp;&nbsp;
              </p><p style="margin-top: -40px;">
								<font size='4' color="#a4a4a4" style="float: left;"><input type="checkbox" name="vehicle3" value=1 checked> &nbsp;Notification</font>
                                <font size='4' color="#a4a4a4" style="float: right;margin-right: 15px;"> &nbsp; <?php echo date('H:i a',strtotime($doc['bookingdate'])); ?>. </font>
                            </p>
                        </div>
                    </div>
                </div>

	 <?php } ?>
            <?php    
			if ($doc['count']==0){
				?>
				<div class="column">
                    <div class="card" style="height: 150px; background-color: #E9E9E9;border-radius: 5px; margin-top: 30px;margin-bottom: 30px; margin-left: 100px;">    
                     <a href="booking.php"><img src="./img/add.jpg" alt="Add" style="width:80px; margin-top: 15px; margin-left: 170px; border-radius: 60px;box-shadow: 3px 3px 3px #888888;" ></a>
						<br><table width="420" height="50"> <tr align="center" valign="middle"> <td>
						<font size='5'  color="#a4a4a4" >Add Booking</font>
						</td></tr></table>
                    </div>
                </div>
			 <?php	
			}
		} ?>

 
			 <div class="notimenu" style="font-size: 30px">
			 Medicine
			 </div>
	
	
			 		<div style=" border: 2px solid #e3e7e7; margin-left: 90px;margin-top: 30px;margin-bottom: 10px;width: 463px;">
						<div style="margin-top: 10px;margin-bottom: 10px;">
			            <?php
			$patient_id	= 1;
            $i = 0;
            $mysql_qry1 = "SELECT * FROM `medical`m";
            $result2 = mysqli_query($Connect, $mysql_qry1);
           while ($medic =  $result2->fetch_assoc()) {
                if ($i % 2 == 0 && $i != 0) {
                    ?>
		
        <?php
            } ?>
                <div class="column">
                    <div class="card" style="height: 135px; background-color: #E9E9E9;border-radius: 5px; margin-top: 0px; margin-left: 10px;">
                        <img src="./img/pills.png" alt="Avatar" style="width:80px; margin-top: 25px; margin-left: 15px;" class="img2">
                        <div class="side left" align="left">
                            <p>
                                <div style="margin-bottom: 10px;margin-top: -5px;"> <font size="6px" color="#47b6c7"> &nbsp;Time to take <?php echo $medic['medicine_name']; ?>&nbsp;!</font></div>
                               <div style="margin-bottom: 5px;"> <font size='5' color="#a4a4a4">
                                &nbsp; <?php echo $medic['medicine_name']; ?>  &nbsp;&nbsp;&nbsp;</font>   <font size='5' color="#a4a4a4" style="float: right;margin-right: 15px;"> 
								   <?php echo date('d/m/Y',strtotime(medic['bookingdate'])); ?> </font></div> &nbsp;&nbsp;
              </p><p style="margin-top: -40px;">
								<font size='4' color="#a4a4a4" style="float: left;"><input type="checkbox" name="vehicle3" value=1 checked> &nbsp;Notification</font>
                                <font size='4' color="#a4a4a4" style="float: right;margin-right: 15px;"> &nbsp; <?php echo date('H:i a',strtotime($medic['bookingdate'])); ?>. </font>
                            </p>
                        </div>
                    </div>
                </div>

	 <?php } ?>
            <?php   $i++;?>
		 </div>
		 </div>

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
			 
    <script>
            function clickNav(){
                console.log(document.getElementById("sidenav").style.width);
                if(document.getElementById("sidenav").style.width == "250px")
                {
                    document.getElementById("sidenav").style.width = "0%";
                }
                else
                {
                    document.getElementById("sidenav").style.width = "250px";
                }
            }

                
    </script>
		
</body>

    
</html>
