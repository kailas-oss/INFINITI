<?php
  $output=[];
  $output["data"] = $_POST['data'];
  $val = json_encode($output);
  print_r($val);
?>