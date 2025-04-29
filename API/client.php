<?php
    $source = $_POST["source"];
    $destination = $_POST["destination"];
    $date = $_POST["date"];
    echo $source;

    

    // $data = [
    //     "source" => "MAD",
    //     "destination"  => "HYD",
    //     "travelDate" => "27-08-2024"
    // ];
    
    // $encData["data"] = json_encode($data);
    // // print_r($encData);
    // // var_dump($encData);
    // $cl = curl_init();
    // CURL_SETOPT_ARRAY($cl,[
    //     CURLOPT_URL => 'http://localhost/practicephp/API/server.php',
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_POSTFIELDS => $encData,
    // ]
    // );

    // $res = curl_exec($cl);
    // curl_close($cl);
    // $val = json_decode($res,1);
    // $val["data"] =json_decode($val["data"],1);
    // var_dump($val);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="client.php" method="post">
        <label for="">souce :</label> <br>
        <input type="text" name ="source">
        <br>
        <label for="">destination :</label> <br>
        <input type="text" name = "destination">
        <br>
        <label for="">travelDate :</label> <br>
        <input type="date" name = "date">

        <input type="submit">
    </form>
</body>
</html>