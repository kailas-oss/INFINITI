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

    class Login{
        protected $userName;
        protected $password;
        function display(){
            echo "user name is : ".$this->userName."<br>";
            echo "password is : ".$this->password."<br>";
        }
    }
    class User extends Login{
        function __construct($userName,$password){
            echo "This is User "."<br>";
            $this->userName = $userName;
            $this->password = $password;
        }
    }

    class Admin extends Login{
        function __construct($userName,$password){
            echo "This is Admin "."<br>";
            $this->userName = $userName;
            $this->password = $password;
        }
    }

    class Guest extends Login{
        function __construct($userName,$password){
            echo "This is Guest "."<br>";
            $this->userName = $userName;
            $this->password = $password;
        }
    }

    $obj = new Guest("kailas","kaials12.");
    $obj->display();
?>