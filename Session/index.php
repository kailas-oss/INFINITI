<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method ="post">
            <label for="">User Name :</label> <br>
            <input type="text" name = "userName"><br>

            <label for="">Password :</label> <br>
            <input type="password" name = "password"><br>

            <input type="submit">
        </form>
    </div>
</body>
</html>

<?php

class Register{
    public $name;
    public $pass;
    function __construct($userName,$password){
        $this->name = $userName;
        $this->pass = $password;
    }
}

$userName = $_POST['userName'];
$password = $_POST['password'];


$user= [
    new Register("kailas","kailas12."),
    new Register("reshmi","reshmi@2002"),
    new Register("johin","aquagirl"),
];


foreach($user as $key=>$value){
    echo $value->name;
}

?>