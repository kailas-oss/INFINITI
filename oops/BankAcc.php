<?php
    class Bank{
        public $bal=0;
        function __construct($balance){
            $this->bal = $balance;
        }
        protected function get(){
            echo "The value is : ".$this->bal;
        }
    }
    class Account extends Bank{
        function acc(){
            echo "This is account extends bank "."<br>";
            $this->get();
        }
    }   
    $balance = 1000;
    $obj = new Account($balance);
    $obj->acc();
?>