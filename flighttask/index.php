<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method = "post">
            <label for="">Source :</label>  <br>
            <input type="text" name = "source"> <br>

            <label for="">Destination :</label> <br>
            <input type="text" name = "destination"> <br>

            <label for="">TravelDate :</label> <br>
            <input type="date" name = "date"> <br>

            <input type="submit">
        </form>
    </div>
</body>
</html>

<?php
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $apiKey = "index";

    $userVal = [];
    $userVal["datas"] =  json_encode(["source"=>$source,"destination"=>$destination]);
    $userVal["action"] = "search";
    $cl = curl_init();
    curl_setopt_array($cl,[
        CURLOPT_URL => "http://localhost/practicephp/flighttask/server.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $userVal,
        CURLOPT_HTTPHEADER => 
            ["API-KEY: $apiKey"]
    ]);
    $arr = [];
    $responce = curl_exec($cl);
    $finalVal = json_decode($responce,true);
    // var_dump($finalVal);
    echo "
        <table border='1' cellpadding ='10' cellspacing='0'>
            <tr>
                <th>Source</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Base Fare</th>
                <th>Airline Code</th>
                <th>Airline Name</th>
                <th>action</th>
            </tr>
        ";
        foreach($finalVal as $key=>$value){
            // print_r($value);
            echo "
                <tr>
                    <td>{$value['source']}</td>
                    <td>{$value['destination']}</td>
                    <td>{$value['date']}</td>
                    <td>{$value['basefare']}</td>
                    <td>{$value['airlinecode']}</td>
                    <td>{$value['airlinename']}</td>
                    <td>
                        <a href='update.php?update_id={$value['data_id']}'><button>update</button></a>
                        <a href='delete.php?delete_id={$value['data_id']}'><button>delete</button></a>                        
                    </td>
                </tr>
            ";
        }

?>

<!-- <a class='update' href='update.php?update_id={$data['booking_id']}'>Update</a> -->
