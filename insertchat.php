<?php
require "condb.php";
$describe = $_POST["describe"];
$long = $_POST["long"];
$unitlong = $_POST["unitlong"];
$often = $_POST["often"];
$CardNumber1 = $_POST["CardNumber1"];
$CardNumber2 = $_POST["CardNumber2"];
$CardNumber3 = $_POST["CardNumber3"];
$CardNumber4 = $_POST["CardNumber4"];
$CardNumber4 = $_POST["CardNumber4"];
$MonthExpired = $_POST["MonthExpired"];
$YearExpired = $_POST["YearExpired"];
$CVV = $_POST["CVV"];
$staffid = $_POST["staffid"];
$CardNumber = $CardNumber1 . $CardNumber2 . $CardNumber3 . $CardNumber4;
$target_dir = "C:\AppServ\www\SE2\uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    $newname = rand(0, 9999);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir .  $newname  . $imageFileType)) {
        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
    $namefile = $newname . "." . $imageFileType;
}
$sql = "INSERT INTO `Consult` (`consult_id`, `staff_id`, `patient_id`, `consult_detail`, `howlong`, `unitlong`, `often`, `CardNumber`, `CVV`, `MonthExpired`, `YearExpired`, `img`, `star`, `answer`)  
	VALUES (NULL,'$staffid','1','$describe','$long','$unitlong','$often','$CardNumber','$CVV','$MonthExpired','$YearExpired','$namefile','0','')";
if ($Connect->query($sql) === TRUE) {
    // header("location: car.php");
} else {
    echo "Error: " . $sql . "<br>" . $Connect->error;
}
?>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            margin-top: 170px;
            border: 1px solid #888;
            width: 35%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        
        .buttonconfirm {
            background-color: #47b6c7;
            border: none;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 4px 2px;
            cursor: pointer;
            font-family: Agency FB;
            border-radius: 5px;
            height: 5%;
            width: 8%;
        }
    </style>
</head>
<script>
    function myFunction() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
    }
</script>

<body onload="myFunction()">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="chat.php" method="POST">
            <p>    &nbsp;&nbsp;&nbsp;<font size='6' color="#a4a4a4" face="Agency FB"> Success Financial Transactions.</font></p>
            &nbsp;&nbsp;&nbsp;<input type="submit" class="buttonconfirm" value="OK" >
        </div>
    </div>

    <script>
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            window.open('chat.php', "_self");
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                window.open('chat.php', "_self");
            }
        }
    </script>

</body>

</html>