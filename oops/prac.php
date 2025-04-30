<?php
    // class Student{
    //     public $rollNo;
    //     public $name;
    //     function method(){
    //         $this->rollNo = 232108;
    //         $this->name = "kailas";
    //         return "$this->rollNo,$this->name";
    //     }


    // }
    // $obj = new Student();
    // echo $obj->method();

            // CONSTRUCTOR

    // class Student{
    //     public $name;
    //     function __construct($name,$age){
    //         $this->name = $name;

    //     }
    //     function get(){
    //         return $this->name;
    //     }
    // }
    // $name = "kailas";
    // $age = 21;
    // $obj = new Student($name,$age);
    // echo $obj->get();

        //DESTRUCTOR

        // class Student{
        //     public $name;
        //     function __construct($name,$age){
        //         // $this->name = $name;
    
        //     }
        //     function __destruct(){
        //         echo $this->name;
        //     } 
        // }
        // $name = "kailas";
        // $age = 21;
        // $obj = new Student($name,$age);

    // class Student{
    //     static function get(){
    //         echo "kailas";
    //     }
    //     function __construct(){
    //         self::get();
    //     }

    // }
    // $obj = new Student();
    // Student::get();

    // NAME SPACE

// Library A
// namespace Monolog;

// class Logger {
//     public function log() {
//         echo "Logging with Monolog";
//     }
// }

// // Library B
// namespace MyFramework;

// class Logger {
//     public function log() {
//         echo "Logging with MyFramework";
//     }
// }

// // Your application
// namespace App;

// use Monolog\Logger as MonologLogger;
// use MyFramework\Logger as FrameworkLogger;

// $log1 = new MonologLogger();
// $log1->log(); 

// $log2 = new FrameworkLogger();
// $log2->log();

// namespace zerodha;
// class loginer{
//     function log(){
//         echo "this is zerodha loginer log";
//     }
// }

// namespace angel;
// class loginer{
//     function log(){
//         echo "this is angel loginer log";
//     }
// }
// use zerodha\loginer as broker1;
// $log1 = new broker1();
// $log1->log();
// echo "<br>";
// use angel\loginer as broker2;
// $log2 = new broker2();
// $log2->log();


$file = $_FILES['image'];
// print_r($file);
$tempName = $file['tmp_name'];
$name = $file['name'];
$destination = "C:/xampp/htdocs/practicephp/oops/images/".basename($name);
if (move_uploaded_file($tempName, $destination)) {
    echo "File uploaded successfully to $destination";
}
// echo $destination;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="prac.php" method="post" enctype="multipart/form-data">
    <input type="file" name = "image">
    <input type="submit" name = "submit">
</form>
</body>
</html>
