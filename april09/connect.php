<?php
$connector=mysqli_connect("localhost","root","","mbs");
// if(!$connector){
//     die("db not connected");
// }
// else{
//     {echo "db connected";}
// }
// print_r(value: $connector);
// $result=mysqli_query($connector,"SELECT * FROM users");
// // print_r( mysqli_num_rows($result));
// if(mysqli_num_rows($result)> 0){
//     $row=mysqli_fetch_all($result,MYSQLI_NUM);
//         print_r($row);

// }else{
//     echo "empty";
// }
// print_r($result);
$result=mysqli_query($connector,"INSERT INTO users  VALUES ('','Sanjay', 'sanjay123@gmail.com', '9123456789', 23)");
echo mysqli_affected_rows($connector);

mysqli_close($connector);
?>