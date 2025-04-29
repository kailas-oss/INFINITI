<?php
$conn=mysqli_connect("localhost","root","123456789","flight_project");
$a=$_REQUEST;
$mobile_no=$a['mobile_no'];
$password=$a['password'];
$query = "SELECT mobileNo,password FROM user WHERE mobileNo = '$mobile_no' AND password = '$password'";
$result = mysqli_query($conn, $query);
$retrieve = mysqli_fetch_assoc($result);
if(isset($retrieve["mobileNo"],$retrieve["mobileNo"])){
    if ($retrieve["mobileNo"] == $mobile_no && $retrieve["password"]==$password) {
    header("Location:main.html");
    }
}else{
    echo "field is empty or wrong password";
}
?>