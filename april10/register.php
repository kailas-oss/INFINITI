<?php
// $a=($_GET);
// $connector=mysqli_connect("localhost","root","","form_practice");
// if(!$connector){
//     die("db not connected");
// }else{
//     echo "db connected";
// }
// $u_name=$a["User_name"];
// $u_mobile=$a["Mobile_No_"];
// $u_age=$a["Age"];
// $u_password=$a["Password"];
// $ans=mysqli_query($connector,"insert into register_form (user_name,mobileNo,age,password) values('$u_name','$u_mobile','$u_age','$u_password');");
$a=($_POST);
$connector=mysqli_connect("localhost","root","","form_practice");
// if(!$connector){
//     die("db not connected");    
// }else{
//     echo "db connected";
// }
$u_name=$a["User_name"];
$u_mobile=$a["Mobile_No_"];
$u_age=$a["Age"];
$u_password=$a["Password"];
$ans=mysqli_query($connector,"insert into register_form (user_name,mobileNo,age,password) values('$u_name','$u_mobile','$u_age','$u_password');");
if($ans){
    //echo "inserted";
    header('Location: flightSearch.html');
}
else{
    echo "not inserted";
}
?>