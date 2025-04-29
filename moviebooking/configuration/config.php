<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'moviebooking';
    $port = 3306;

    try{
        $connect = new PDO("mysql:host=$host;dbname=$dbname;port=3306",$user,$pass);    
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "connected successfully";

    }catch(PDOException $e){
        echo "connection fails".$e->getMessage();
    }
?>