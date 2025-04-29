<?php
// $a=rand(0,24);
// $b=rand(25,54);
// setcookie("first","$a",time()+3600,"/practicephp/practices/retrieve");
// setcookie("second","$b",time()+3600,"/practicephp/practices/retrieve");
// header(header: "Location:../retrieve/index.php");
session_start();
$a=rand(0,24);
$b=rand(25,54);
$_SESSION["first"]=$a;
$_SESSION["second"]=$b;
header(header: "Location:../retrieve/index.php");
?>