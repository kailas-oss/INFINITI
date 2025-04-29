<?php


if (isset($_GET['delete_id'])) {
  $booking_id = $_GET['delete_id'];
  $apiKey = "delete";
  $updateArr = [];
  $updateArr["data_id"] = $_GET['delete_id'];
  $updateArr["action"] = "delete";
  $cl = curl_init();
  curl_setopt_array($cl,[
      CURLOPT_URL=>"http://localhost/practicephp/moviebooking/server.php",
      CURLOPT_RETURNTRANSFER => false,
      CURLOPT_POSTFIELDS => $updateArr,
      CURLOPT_HTTPHEADER => 
      ["API-KEY: $apiKey"]
  ]);
  $responce = curl_exec($cl);
  if($responce=="deleted"){
    header("location:showlist.php");
  }


    // $delete_booking = "delete from booking where booking_id = '$booking_id'";
    // $deleted = mysqli_query($connect,$delete_booking);

    // $row =  mysqli_affected_rows($connect);
    // if($row){
    //   header("Location: showlist.php"); 
    //   exit();
    // }
}
?>
