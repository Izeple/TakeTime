<?php  
session_start();
 $host = "localhost";  
 $email = "root";  
 $password = "";  
 $database = "projectdead";  
 $message = "";  
 try  
 {  
      
      $connect = new PDO("mysql:host=$host; dbname=$database", $email, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM patient WHERE email = :email AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["email"] = $_POST["email"];  
                     $_SESSION["success"]=1;
                     header("location:Homepage.php"); 
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                     $_SESSION["success"]=-1;
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  

 ?>


