<?php 
    session_start();
    if(isset($_SESSION["email"]))
    {
        $email = $_SESSION["email"];
        require_once("connectPDO.php");
        $pdo = conPDO();
        $sql = "SELECT * FROM patient WHERE email = '".$email."'";
        $result_User = PDOfetchAll($sql)[0];
    }
    else
        header("location:Homepage.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script >
	    $(function () {
	        $('#datepicker').datepicker({
	            format: "dd/mm/yyyy",
	            todayHighlight: true,
		        showOtherMonths: true,
		        selectOtherMonths: true,
		        autoclose: true,
		        changeMonth: true,
		        changeYear: true,
                todayHighlight:true,
                endDate:"31/12/2020",
                startDate: 'd',
		        orientation: "button"
	        });

            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });
	    });
	</script>
    

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/home2.css">
    <link rel="stylesheet" type="text/css" href="./css/selectdoc.css">

    <link rel="stylesheet" type="text/css" href="http://allfont.net/allfont.css?fonts=agency-fb"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>

    <script src="js/index.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="./js/clickNav.js"></script>
    <?php require "condb.php"; ?>
    <title>Booking</title>

</head>
<body>

    <div id="main">
        <ul>
            <li><a class="active" href="#home" onclick="clickNav()"><img src="./img/menu.png" height="15"></a></li>
            <li><a href="homepage.php"><img src="./img/nametag.png" height="15"></a></li>
            <li style="float:right"><button class="btn2" id="btn3" onclick="location.replace('./logout.php');">Logout</button></li>
            <li style="float:right">
            <p class='usern' style='padding: 14px 16px; margin:0; color:#4e707e; ' onclick="location.replace('./profile.php')";>Hi,<?php echo $result_User["name"]; ?></p>
            </li>
            <li style="float:right"><button class="btn4" id="btn4"><img src="./img/bell.png" height="25"></button></li>
        </ul>

        <section><img src="./img/Banner.png" style="width:100%">
        <div class="ab" align="center"> 
        <div id="sidenav" class="sidenav">
                    <div class="sidein2" style="padding:16px;"><a href="profile.php"><img src="img/user.png" height="30"></a></div>
                    <div class="sidein2" style="padding:16px;"><a href="selectdoc.php"><img src="img/help.png" height="30"></a></div>
                    <div class="sidein2" style="padding:16px;"><a href="booking_0.php"><img src="img/time.png" height="30"></a></div>
                    <div class="sidein2" style="padding:16px;"><a href="Notification.php"><img src="img/noti.png" height="30"></a></div>
            </div>
        </div>
        </section>
    </div>    

    <div class="HeadModule"><font size='6' color="#ffffff" >Booking Doctor</font></div>

    <?php 
        if(!isset($_POST['myform'])){
            $id = $_POST['id'];
          }
        $_SESSION['staff_id'] = $id;
    ?>


    <div style="margin-left:250px;  width:70%;">

    <div style="padding-left: 35px; letter-spacing: 2px; display:inline-block;">
        
    <p style="font-size:30px">Select Date </p>    

<font face= "Roboto" >

<div>
   
        <div style="width:200px;">
             <form id="formid" action="booking_3.php" method="POST"><form>
                <div class="form-group">
                    <div class='input-group date' id='datepicker'>
                        <input type='text' required name="date" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            
        </div>
</div>
</font>
</div>

        <div style="padding-left: 35px; letter-spacing: 4px; display:inline-block;   line-height: 1.6;">
        <p style="font-size:30px">Select Time </p>    

        <font size="5">
                
                    <input type="radio" required name="times" value="08:30:00"> 08:30 - 09:00 <br>
                    <input type="radio" required name="times" value="09:30:00"> 09:30 - 10:00 <br>
                    <input type="radio" required name="times" value="10:30:00"> 10:30 - 11:00 <br>
                    <input type="radio" required name="times" value="11:30:00"> 11:30 - 12:00 <br>
                    <input type="radio" required name="times" value="12:30:00"> 12:30 - 13:00 <br>
                    <input type="radio" required name="times" value="13:30:00"> 13:30 - 14:00 <br>
                    </font>
                    <br>
                    <center><input type='submit' class="subm" value='Select' name='submit'></center>

                </from>
        </div>
    </div>
<?php //if($role!="Admin") echo "disabled" ?> 

</body>
</html>

