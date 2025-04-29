<?php
    function curl($key,$details){
        $cl = curl_init();
        curl_setopt_array($cl,[
        CURLOPT_URL=>"http://localhost/practicephp/moviebooking/server.php",
        CURLOPT_RETURNTRANSFER=>false,
        CURLOPT_POSTFIELDS=>$details,
        CURLOPT_HTTPHEADER=>
        ["API-KEY: $key"]
        ]);
        // return $responce = 
        curl_exec($cl);
    }
?>