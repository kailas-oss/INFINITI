<?php
echo "<pre>";
$flights = file_get_contents("flights.json");
$flights = json_decode($flights, 1);

$ans = [
    "source" => [],
    "destination" => [],
    "departure_time" => [],
    "arrival_time" => [],
    "total_travel_time" => [],
    "airline" => [],
    "stops" => [],
    "number_of_stops" => [],
    "total_fare" => []
];

foreach ($flights as $key => $value) {
    if (isset($value["origin_airport_code"])) {
        $ans["source"][] = $value["origin_airport_code"];
    } else {
        $ans["source"][] = null;
    }
}

print_r($ans);
?>
