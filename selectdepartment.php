<?php 
$departmentname = $_REQUEST['departmentname'];
$hospitalname = $_REQUEST['hospitalname'];
require "condb.php";
echo "<div class='row' >";
$i = 0;
$mysql_qry3 = "SELECT * FROM `staff`s JOIN hospital h ON s.hospital_id = h.hospital_id JOIN department d ON s.department_id = d.department_id WHERE s.hospital_id ='" . $hospitalname  . "'  AND s.department_id= '" .$departmentname  . "'";
$result3 = mysqli_query($Connect, $mysql_qry3);
        while ($row12 =  $result3->fetch_assoc()) {
            if ($i % 2 == 0 && $i != 0) {
               echo"  </div>
               <center>
               <div class='row'>";
                
            }
            echo ' <div class="column" onclick="'; echo "myFunction(";  echo $row12['staff_id']; echo ",'";  echo $row12['name'];  echo "','";
            echo $row12['surname'];   echo "','";    echo $row12['department_name'];  echo "','";   echo $row12['hospital_name'];  echo "','";
            echo $row12['price']; 
            echo "')"; echo '">';
            echo " <div class='card'>
                <img src='./img/picdoc.jpg' alt='Avatar' style='width:140px;' class='img2'>
                <div class='side right' align='left'>
                    <p>
                        <font size='5' color='#47b6c7'> &nbsp;Dr."; echo $row12['name'];  echo "&nbsp;"; echo $row12['surname'];  echo"</font><br>
                        <font size='3' color='#a4a4a4'>&nbsp;&nbsp;Department : "; echo $row12['department_name'];  echo "<br>
                            &nbsp; Hospital : "; echo $row12['hospital_name'];  echo "</font><br>
                        &nbsp;&nbsp;";
                        for ($j = 0; $j < 5; $j++) {
                            $star = $row12['star'];
                            if ($j < $star) {
                                echo   "<span class='fa fa-star checked'></span>";
                            } else {
                                echo   " <span class='fa fa-star'></span>";
                            }
                        }           
                        echo "<br>
                        <font size='4' color='#85c06a' style='float: right;'> &nbsp;"; echo $row12['price'];  echo "Baht&nbsp;&nbsp;</font>
                        <img src='./img/coin.png' style='width:20px; float: right;' align='top'>
                    </p>
                </div>
            </div>
        </div>";
        $i++;
     }    
echo"  </div>
     </div>";
?>