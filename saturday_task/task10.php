<?php
echo "<pre>";

function my_sort($a, $b) {
    return $a['fare'] - $b['fare'];
}

$flights = file_get_contents("flights.json");
$flights = json_decode($flights, true);

$ans = [];
foreach ($flights as $key => $value) {
    $ans[] = [
        "airline_name" => $value["via_flights"][0]["airline_name"],
        "fare" => $value["base_fare"] + $value["tax"]
    ];
}

usort($ans, "my_sort");

print_r($ans);
?>
