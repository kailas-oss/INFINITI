<?php
$a=1;
    function add(){
        print_r($GLOBALS['a']);
        global $b;
        $b= 5;
        // global $b;
        // $c=$a+$b;
        // echo $c;
    }
    add();
    echo ($b);
    // add();
?>