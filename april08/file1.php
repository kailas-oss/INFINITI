<?php
    // $flights=include("flight_det.json");
    // print_r($flights)
    $data=fopen("test.csv","a+");
    $a[0]=["regin","sxcce"];
    $a[1]=["regin","99478567"];
    $a[2]=["rein","luyfytk"];
    fputcsv($data,$a["0"]);
    fputcsv($data,$a["1"]);
    fputcsv($data,$a["2"]);
    fclose($data);
?>