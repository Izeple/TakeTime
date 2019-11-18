<?php 
require "condb.php"; 

 $mysql_qry1 = "SELECT * FROM `staff`";
 $result1 = mysqli_query($Connect, $mysql_qry1);
 while ($row12 =  $result1->fetch_assoc()) 
     {
        echo "555";
     }

?>