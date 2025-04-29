<?php
$var = "HeLlow my name is rejin<br>";
$a=strlen($var);
print_r($a."<br>");
$b=strtolower($var);
print_r($b."<br>");
$c=str_replace("rejin","regin",$var);
print_r($c."<br>");
$d=strstr($var,"my");
print_r($d."<br>");
$e=strtr($var,"m","r");
print_r($e);
?>