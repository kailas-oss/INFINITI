<?php
    include 'configuration/config.php';
    if (isset($_GET['update_id'])){
        // echo $_GET['update_id'];
        $apiKey = "update";
        $updateArr = [];
        $updateArr["data_id"] = $_GET['update_id'];
        $updateArr["action"] = "update";
        $cl = curl_init();
        curl_setopt_array($cl,[
            CURLOPT_URL=>"http://localhost/practicephp/flighttask/server.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $updateArr,
            CURLOPT_HTTPHEADER => 
            ["API-KEY: $apiKey"]
        ]);
        $responce = curl_exec($cl);
        // var_dump($responce);
        $finalVal = json_decode($responce,true);
        // print_r($finalVal);
    }

    $source = isset($_POST['source'])?$_POST['source']:'';
    $destination = isset($_POST['destination'])?$_POST['destination']:'';
    $date = isset($_POST['date'])?$_POST['date']:'';
    $basefare = isset($_POST['basefare'])?$_POST['basefare']:'';
    $airlineCode = isset($_POST['airlineCode'])?$_POST['airlineCode']:'';
    $airlineName = isset($_POST['airlineName'])?$_POST['airlineName']:'';
    $apiKey = "UPDATEVALUES";
    // echo $source;
    $cl = curl_init();
    $data = [
        "source" => $source,
        "destination" => $destination,
        "date" => $date,
        "basefare" => $basefare,
        "airlineCode" => $airlineCode,
        "airlineName" => $airlineName
    ];
    $updateArr = [];
    $updateArr["datas"] = json_encode($data);
    // var_dump($updateArr);
    $updateArr["action"] = "updateValues";
    curl_setopt_array($cl,[
        CURLOPT_URL => "http://localhost/practicephp/flighttask/server.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => 
            ["API-KEY: $apiKey"]
    ]);
    $responce = curl_exec($cl);

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Source :</label> <br>
        <input name = 'source' type="text" value="<?PHP echo $finalVal['source'];?>"> <br>

        <label for="">Destination :</label> <br>
        <input name = 'destination' type="text" value="<?PHP echo $finalVal['destination'];?>"> <br>

        <label for="">Date :</label> <br>
        <input name = 'date' type="date" value="<?PHP echo $finalVal['date'];?>"> <br>

        <label for="">Base Fare :</label> <br>
        <input  name = 'basefare' type="text" value="<?PHP echo $finalVal['basefare'];?>"> <br>

        <label for="">Airline Code :</label> <br>
        <input name = 'airlineCode' type="text" value="<?PHP echo $finalVal['airlinecode'];?>"> <br>

        <label for="">Airline Name :</label> <br>
        <input name = 'airlineName' type="text" value="<?PHP echo $finalVal['airlinename'];?>"> <br>

        <input type="submit">
    </form>
</body>
</html>