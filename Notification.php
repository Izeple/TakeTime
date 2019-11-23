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
		
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">
    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <script type="text/javascript" src="./script/clickNav.js"></script>

</head>
<body>
    <?php require "condb.php"; ?>
    <div id="main">
    <ul>
        <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
        <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
        <li style="float:right"><a class="active" href="#about">Sign up</a></li>
        <li style="float:right"><a class="active" href="#about">Log in</a></li>
    </ul>
         </div>   

<section style="margin-top: 0px;"><img src="./img/Banner.png" style=" width:100%; height:fixed;"></section>
		
<h1 style="position: relative; width: 15%; color: white; background-color: #47B6C7; padding: 15px; font-size: 50;
		text-align: center;margin-top: -50px;">Notification</h1>

		   <div class="notimenu" style="margin-top: -10px;">
				 Booking
	</div>
	 
			 


            <?php
            $i = 0;
            $mysql_qry1 = "SELECT * FROM `staff`s JOIN hospital h ON s.hospital_id = h.hospital_id JOIN schedule b ON s.staff_id = b.staff_id AND b.patient_id=1";
            $result1 = mysqli_query($Connect, $mysql_qry1);
            while ($row12 =  $result1->fetch_assoc()) {
                if ($i % 2 == 0 && $i != 0) {
                    ?>
              
                <div class="row">
                <?php } ?>
                <div class="column" onclick="myFunction('<?php echo $row12['price']; ?>')">
                    <div class="card" style="background-color: #E9E9E9;border-radius: 5px; margin-top: 30px;margin-bottom: 30px; margin-left: 100px;">
                        <img src="./img/doctor (2).png" alt="Avatar" style="width:80px; margin-top: 30px; margin-left: 15px;" class="img2">
                        <div class="side left" align="left">
                            <p>
                                <font size='6' color="#47b6c7"> &nbsp;Dr.<?php echo $row12['name']; ?>&nbsp;<?php echo $row12['surname']; ?></font><br>
                                <font size='5' color="#a4a4a4">
                                    &nbsp; At <?php echo $row12['hospital_name']; ?>  &nbsp;&nbsp;&nbsp;    <?php echo $row12['bookingdate']; ?></font><br>
                                &nbsp;&nbsp;
                                <?php
                                    for ($j = 0; $j < 5; $j++) {
                                        $star = $row12['star'];
                                        if ($j < $star) 
                                            {
                                                echo "<span class='fa fa-star checked'></span>";
                                            } 
                                            else 
                                            {     
                                                echo "<span class='fa fa-star'></span>";
                                            }
                                    }
                                    ?><br>
                                <font size='4' color="#85c06a" style="float: right;"> &nbsp;<?php echo $row12['price']; ?> Baht&nbsp;&nbsp;</font>
                                <img src="./img/coin.png" style="width:20px; float: right;" align="top">
                            </p>
                        </div>
                    </div>
                </div>
            <?php   $i++;   } ?>

				  
				  
			 <div class="notimenu">
			 Medicine
			 </div>
			 		
			 Medicine
		  	
			 


        <div id="sidenav" class="sidenav">
            <div class="sidein"><a href="homepage.php"><img src="img/user.png" height="30"></a></div>
            <div class="sidein"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
            <div class="sidein"><a href="booking.php"><img src="img/time.png" height="30"></a></div>
            <div class="sidein"><a href="test.php"><img src="img/noti.png" height="30"></a></div>
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
