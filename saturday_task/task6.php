<?php
$flights = file_get_contents("flights.json");
$flights = json_decode($flights, 1);
$ans = [];
    foreach($flights as $key => $values){
        foreach($values as $key1=>$value1){
            if(is_array($value1)){
                foreach($value1 as $key2 => $value2){
                    if(isset($value2['airline_code'])){
                        if(array_key_exists($value2['airline_code'],$ans)){
                            $a = $value2['airline_code'];
                            $b = $value2['airline_name'];
                            array_push($ans[$a],$b);
                        }else{
                            $ans[$value2['airline_code']]=[$value2['airline_name']];
                        }
                    }
                }
            }
        }
    }
    print_r($ans);
?>
