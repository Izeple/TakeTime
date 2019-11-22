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
?>