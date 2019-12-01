  <html>
  <body bgcolor="#0f5a66">
  <?php require "condb.php"; ?>
    <?php
    $mysql_qry1 = "SELECT * FROM `consult` WHERE  patient_id ='1'";
    $result1 = mysqli_query($Connect, $mysql_qry1);
    $rowcount = mysqli_num_rows($result1);
    if ($rowcount == 0) {
        ?>
            <img src="./img/back.jpg" style="width:100px; padding-left: 5px; float: left;" onclick="backadd()">
       
    <?php
    } else {
        ?>
        
            <img src="./img/back.jpg" style="width:100px; padding-left: 5px; float: left;" onclick="backconsult()">
  
    <?php } ?>
    <img src="./img/consult.jpg" style="width:100px; padding-right: 5px; float: right;" onclick="consult()">
  </body>
  </html>