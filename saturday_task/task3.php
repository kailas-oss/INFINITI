<?php
echo "<pre>";

$flights = file_get_contents("flights.json");
$flights = json_decode($flights, true);

$ans = [['0' => ''], ['1' => ''], ['2' => '']];

foreach ($flights as $i => $values) {
    if (isset($values["stops"]) && $values["stops"] == 0) {
        array_push($ans[0], "flight$i");
    }
    if (isset($values["stops"]) && $values["stops"]==1) {
        array_push($ans[1],"flight$i");
    }
    if (isset($values["stops"]) && $values["stops"]==2){
        array_push($ans[2],"flight$i");
    }
}

print_r($ans);
?>
