<?php

/*
* Author : Muthukannan
* Process : Server process
*/


//Output
$output = array();
$output["data"] = $_POST["data"];
$origin = json_decode($_POST["data"],1);

//Update the status
if($origin["origin"] == "MAA")
{
    $output["status"] = "success";
}
else
{
    $output["status"] = "failed";
}

//Response the output
$finalOutput = json_encode($output);
print_r($finalOutput);


