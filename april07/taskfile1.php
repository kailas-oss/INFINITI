<?php

$flights = file_get_contents("flight_detail.json");
$flights = json_decode($flights, true);

// $ans = [];
// foreach ($flights as $key=>$value) {
//     foreach ($value["passengers"] as $key=>$passenger) {
//         $firstName = $passenger["first_name"];
//         $lastName = $passenger["last_name"];
//         $ans[] = $firstName . " " . $lastName;
//     }
// }
// $file=fopen("ans.csv","w");
// fputcsv($file, $ans);



// $age = [];
// foreach ($flights as $flight) {
//     foreach ($flight["passengers"] as $passenger) {
//         $birthYear = date("Y", strtotime($passenger["date_of_birth"]));
//         $currentYear = date("Y");
//         $calculatedAge = $currentYear - $birthYear;
//         $age[] = $calculatedAge;
//     }
// }
// $ans=0;
// foreach ($age as $ages){
//     if ($ages>35) {
//         $ans++;
// } }
// echo $ans;
// $ans=[];
// foreach ($flights as $key => $flight) {
//     foreach ($flight["passengers"] as $key2 => $flight2) {
//         $ans[]=$flight["airline_code"]."".$flight2["ticket_number"];
//     }
// }
// print_r($ans);
// $ans = [];
// foreach ($flights as $flight) {
//     $route = $flight["departure_airport"] . '-' . $flight["arrival_airport"];
//     foreach ($flight["passengers"] as $passenger) {
//         $ans[$route][] = $passenger["first_name"] . ' ' . $passenger["last_name"];
//     }
// }
// print_r($ans);
// foreach ($flights as $key => &$value) {
//     $value["departure_time"] = date("Y-m-d H:i:s", strtotime($value["departure_time"]));
// }
// print_r($flights);
// $flightNumbers = [];
// foreach ($flights as $flight) {
//     $flightNumbers[] = $flight["airline_code"] . '-' . substr($flight["flight_number"],2,3);
// }
// print_r($flightNumbers);
// $travelTime=[];
// foreach ($flights as $flight) {
//     $travelTime[]=
// }
// $messages = [];
// foreach ($flights as $flight) {
//     foreach ($flight["passengers"] as $passenger) {
//         $messages[]= "Dear {$passenger['first_name']} {$passenger['last_name']}, Your flight is scheduled with {$flight['airline_code']} on the flight {$flight['flight_number']}, which is scheduled for departure on {$flight['departure_time']}, Your PNR is {$flight['pnr']} and your ticket number is {$passenger['ticket_number']}. Thank you for flying with us.<br>";
//     }
// }
// $file=fopen("ans.txt","w");
// fputs($file, json_encode( $messages));
// foreach ($flights as $key => &$value) {
//     $dep_time_stamp = strtotime($value["departure_time"]);
//     $arr_time_stamp = strtotime($value["arrival_time"]);
//     $time_diff = $arr_time_stamp - $dep_time_stamp; 
//     $hr = floor($time_diff / 3600);
//     $mins = floor(($time_diff % 3600) / 60);
//     $value["total_travel_time"] = "$hr.hr.$mins.mins";
// }
// print_r($flights);
// foreach ($flights as $key => &$value) {
//     $dep_time_stamp = strtotime($value["departure_time"]);
//     $arr_time_stamp = strtotime($value["arrival_time"]);
//     $time_diff = $arr_time_stamp - $dep_time_stamp; 
//     $hr = floor($time_diff / 3600);
//     $mins = floor(($time_diff % 3600) / 60);
//     $value["total_travel_time"] = "$hr.hr.$mins.mins";
// }
// $ans=[];
// foreach($flights as $key => $values){
//     $ans[$key] = $values["total_travel_time"];
// }
// $file=fopen("ans9.json","w");
// fputs($file, json_encode($ans));
// $airlines=file_get_contents("flight_min_det.json");
// $airlines = json_decode($airlines, true);
// foreach ($flights as &$flight) {  
//     if (isset($airlines[$flight['airline_code']])) {
//         $flight['airline_code'] = $airlines[$flight['airline_code']];
//     }
// }
// $a=json_encode($flights);
// $file = fopen('ans.json', 'w');
// fputs($file, $a);

?>