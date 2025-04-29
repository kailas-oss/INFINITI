<?php
echo "<pre>";

$flights = file_get_contents("flights.json");
$flights = json_decode($flights, 1);

$ans = [[], [], []];

foreach ($flights as $i => $values) {
    if (isset($values["stops"]) && isset($values["via_flights"][0]["airline_name"])) {
        if ($values["stops"] == 0) {
            array_push($ans[0], $values["via_flights"][0]["airline_name"]);
        }
        if ($values["stops"] == 1) {
            array_push($ans[1], $values["via_flights"][0]["airline_name"]);
        }
        if ($values["stops"] == 2) {
            array_push($ans[2], $values["via_flights"][0]["airline_name"]);
        }
    }
}
$a = [0, 0, 0];
foreach ($ans as $key => $values) {
    $a[$key] = count(array_unique($values));
}

print_r($a);
?>
