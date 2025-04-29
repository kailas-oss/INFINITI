<?php
session_start();
$flights = file_get_contents("flights.json");
$flights = json_decode($flights, 1);
$one=$_SESSION["first"];
$two=$_SESSION["second"];
print_r("Onward->".$flights["$one"]["origin_airport_name"]."<br>");
print_r("Return->".$flights["$two"]["dest_airport_name"]);

?>