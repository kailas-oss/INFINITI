<?php
    $dsn = "mysql:host=localhost;dbname=praceval;port=3306";
    try{
        $connect = new PDO($dsn,"root","");
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "connected successfully";
        
    }catch(PDOException $e){
        echo  "error message".$e->getMessage();
    }
?>