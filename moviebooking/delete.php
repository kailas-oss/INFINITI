<?php
include 'configuration/curl.php';
if (isset($_GET['delete_id'])) {
  $booking_id = $_GET['delete_id'];
  $apiKey = "delete";
  $updateArr = [];
  $updateArr["data_id"] = $_GET['delete_id'];
  $updateArr["action"] = "delete";

  $responce = curl($apiKey,$updateArr);
  if($responce=="deleted"){
    header("location:showlist.php");
  }

}
?>
