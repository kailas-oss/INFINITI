<?php

class Register{
    protected $userName;
    protected $password;
    protected $role;
    function __construct($userName,$password,$role){
        $this->userName = $userName;
        $this->password = $password;
        $this->role = $role;
    }
}

echo "Register 1".PHP_EOL;
echo "login 2".PHP_EOL;

echo "Enter your choice : ";
$choice = fgets(STDIN);

$arr = [];

switch($choice){
    case 1 :
        echo "user name : ";

        $userName = fgets(STDIN);

        echo "password: ";

        $password = fgets(STDIN);

        echo "Role : ";
        $role = fgets(STDIN);
         
        $arr[] = new Register($userName,$password,$role);
}

print_r($arr);

// $file = fopen("user.XML","a+");
// $text  = "my name is kailas\n";
// if($file){
//     fwrite($file ,$text);   
//     fclose($file);
//     echo "file opended successfully";
// }
// else{
//     echo "not file open ";
// }

?>