<?php 


	function conPDO(){
		try{
	    $pdo = new PDO('mysql:host=127.0.0.1;dbname=projectdead','root','');
	    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
		    echo $e->getMessage();
		    die();
		}
		return $pdo;
	}


	function PDOfetchAll($sql) {
		$pdo = conPDO();
		$stmt = $pdo->query($sql);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	/*function listfetchAll($sql){
		$sql = "SELECT * FROM Branch WHERE CompanyID=".$CompanyID ." ORDER BY BranchID";
                $result = $pdo->prepare();
                $result->execute();
                while($objResuut = $result->fetch()){
                    echo print_r($objResuut);


$query_select = "SELECT * FROM shouts ORDER BY id DESC LIMIT 8;";
$result_select = mysql_query($query_select) or die(mysql_error());
$rows = array();
while($row = mysql_fetch_array($result_select))
    $rows[] = $row;
foreach($rows as $row){ 
    $ename = stripslashes($row['name']);
    $eemail = stripcslashes($row['email']);
    $epost = stripslashes($row['post']);
    $eid = $row['id'];

	}*/


/*	function mysql_fetch_all($result) {
		   $rows = array();
		   while ($row = mysql_fetch_array($result)) {
		    	 $rows[] = $row;
		   }
		   return $rows;
	}*/
?>