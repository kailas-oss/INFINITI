<?php
    // class Bank{
    //     public $bal=0;
    //     function __construct($balance){
    //         $this->bal = $balance;
    //     }
    //     protected function get(){
    //         echo "The value is : ".$this->bal;
    //     }
    // }
    // class Account extends Bank{
    //     function acc(){
    //         echo "This is account extends bank "."<br>";
    //         $this->get();
    //     }
    // }   
    // $balance = 1000;
    // $obj = new Account($balance);
    // $obj->acc();

    //Bank Account Class

    // class Account{
    //     public $balance=0;
    //     // function __construct($amount){
    //     //     $this->balance = $amount;
    //     // }
    //     function deposite($amount){
    //         $this->balance += $amount;
    //     }
    //     function withdrawal($with){
    //         $this->balance -= $with;
    //     }
    //     function balance(){
    //         return $this->balance;
    //     }
    // }
    // $obj = new Account();
    // $obj->deposite(10000);
    // $amount = $obj->balance();
    // echo $amount."<br>";
    // $obj->withdrawal(5000);
    // $amount = $obj->balance();
    // echo $amount;

    // class Login{
    //     protected $userName;
    //     protected $password;
    //     function __construct($userName,$password){
    //         $this->userName = $userName;
    //         $this->password = $password;
    //     }
    //     function display(){
    //         echo "user name is : ".$this->userName."<br>";
    //         echo "password is : ".$this->password."<br>";
    //     }
    // }
    // class User extends Login{
    //     function __construct($userName,$password){
    //         echo "This is User "."<br>";
    //         parent::__construct($userName,$password);
    //     }
    // }

    // class Admin extends Login{
    //     function __construct($userName,$password){
    //         echo "This is Admin "."<br>";
    //         parent::__construct($userName,$password);
    //     }
    // }

    // $user = new User("reshmi","1234");
    // $user->display();


            //LEVEL - 3

class login{
    protected $userName;
    protected $password;

    function __construct($userName,$password){
        $this->userName = $userName;
        $this->password = $password;
    }

    function login($currUser,$currPass){
        if($this->userName===$currUser && $this->password===$currPass){
            echo "loged in successfully"."<br>";
        }else{
            echo "login failed"."<br>";
        }
    }

    function display(){
        echo "User name : ".$this->userName."<br>";
        echo "Password : *******"."<br>";
    }
}

class User extends login{
    function __construct($userName,$password){
        echo "This is User"."<br>";
        parent::__construct($userName,$password);
    }    
}

class Admin extends login{
    function __construct($userName,$password){
        echo "This is Admin"."<br>";
        parent::__construct($userName,$password);
    }    
}

    //Verifying 

$user = new User("kailas","12345");
$user->login("kailas","12345");
$user->display();




?>