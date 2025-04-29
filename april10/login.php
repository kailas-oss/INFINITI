<?php
$a = $_REQUEST;

$conn = mysqli_connect("localhost", "root", "", "form_practice");

// if(!$conn){
//     die("db not connected");
// }else{
//     echo "db connected";
// }

$mobile_no = $a["mobile_no"];
$password = $a["Password"];
$query = "SELECT mobileNo,password FROM register_form WHERE mobileNo = '$mobile_no' AND Password = '$password'";

$result = mysqli_query($conn, $query);
$retrieve = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($retrieve["0"]["mobile_no"] == $mobile_no && $retrieve["0"]["password"]!=$password) {
    echo "wrong password";
}else{
    header("Location:flightSearch.html");
    exit();
}

// if ($mobile_no) {
//     // login success
//     header("Location: flightSearch.html");
//     exit();
// } else {
//     // login fail
//     echo "wrong";
// }
?>
