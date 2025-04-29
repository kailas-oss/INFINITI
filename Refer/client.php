<?php
/*
* Author : Muthukannan
* Process : Client process
*/


//Input values
$origin = "MAA";
$Destination = "DEL";
$travelDate = "27-08-2025";
$action = "FlightSearch";
$apiKey = "testUser123";

//Final data
$data = array(
    "origin" => $origin,
    "destination" => $Destination,
    "travelDate" => $travelDate
);


//Post Value
$finalRequest = array();
$finalRequest["data"] = json_encode($data);
$finalRequest["action"] = $action;




//Curl process
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost/practicephp/Refer/server.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POSTFIELDS => $finalRequest,
  CURLOPT_HTTPHEADER => array(
    "API-KEY: $apiKey"
  ),
));

$response = curl_exec($curl);

curl_close($curl);


//response decode
$decodeResponse = json_decode($response,1);
var_dump($decodeResponse);


//Data decode
// $responseData = json_decode($decodeResponse["data"],1);

// echo($responseData["origin"]);