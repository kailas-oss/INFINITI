<?php
$conn=mysqli_connect("localhost","root","","form_practice");
$a=$_REQUEST;
// if(!$conn){
//     die("db not connected");
// }else{
//     echo "db connected";
// }
$source=$a["sourcePlace"];
$destination=$a["destinationPlace"];
$date=$a["dateTravel"];
$que="insert into trip_details (source,destination,date) values ('$source','$destination','$date');";
$res=mysqli_query($conn,$que);
$que1="select * from trip_details;";
$res1=mysqli_query($conn,$que1);
$retrieved=mysqli_fetch_all($res1,MYSQLI_ASSOC);
print_r($retrieved)
// if($res){
//     echo "inserted";
// }else{
//     echo "not";
// }
?>