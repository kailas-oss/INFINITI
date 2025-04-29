<?php
    $arr=['car0'=>'Audi','car1'=>'BMW','car2'=>'KIA','car3'=>'Honda'];
    $a= json_encode($arr);
    $b=json_decode($a);//the decoded format will be in object form if we give 1 it can be acced as array
    print_r ($b['car0']);//or print_r ($b->'car1')
?>