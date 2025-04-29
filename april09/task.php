<?php
echo "<pre>";
$connector=mysqli_connect("localhost","root","","via_flight_details");
if(!$connector){
    die("db not connected");
}
else{
    {echo "db connected";}
}
$flights = file_get_contents("flights.json");
$flights = json_decode($flights, true);
$i=1;
foreach ($flights as $key => $flight) {
    foreach ($flight["via_flights"] as $key1 => $flight1) {
        $id=$i;
        $origin = $flight1["origin_airport_code"]."-".$flight1["origin_airport_name"];
        $destination = $flight1["dest_airport_code"]."-".$flight1["dest_airport_name"];
        $departure_datetime = $flight1["departure_date"]." ".$flight1["time_departure"];
        $arrival_datetime = $flight1["arrival_date"]." ".$flight1["time_arrival"];
        $layover_time = $flight1["layover_time"];
        $airline_code = $flight1["airline_code"];
        $flight_no = $flight1["flight_number"];
        $travel_time = $flight1["travel_time"];
        $arr[] = "('$id','$origin','$destination','$departure_datetime','$arrival_datetime','$layover_time','$airline_code','$flight_no','$travel_time')";
        $i++;
    }
}
// $a="insert into via_flights (id,origin,destination,departure_datetime,arrival,layover_time,airline_code,flight_number,travel_time) values ".implode(",", $arr).";";
// $a="update via_flights set origin='Norway',flight_number=1505 where flight_number=2828";
// $a="delete from via_flights where flight_number=8702";
$a="select * from via_flights";
$result=mysqli_query($connector,$a);
$a=mysqli_fetch_all($result, MYSQLI_ASSOC);
print_r($a);
// $result=mysqli_query($connector,$a);
// $ans=mysqli_affected_rows($connector);
mysqli_close($connector);
// print_r($arr);
