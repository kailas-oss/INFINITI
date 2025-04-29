<?php
echo "<pre>";
$flights = file_get_contents("flight_min.json");
$flights = json_decode($flights, associative: true);

foreach ($flights as $key => $value) {
    foreach ($value as $key1 => $value1) {
        $a = strtotime($value1["via_flights"][0]["departure_date"] . " " . $value1["via_flights"][0]["time_departure"]);
        $b = strtotime($value1["via_flights"][1]["arrival_date"] . " " . $value1["via_flights"][1]["time_arrival"]);
        $c = $b - $a;
        echo $c;
    }
}
?>
