<?php
    echo "1.Thalapakatti".PHP_EOL;
    echo "2.SS biriyani".PHP_EOL;
    echo "3.salem RR".PHP_EOL;
    echo "4.Palm shore".PHP_EOL;

    echo "Enter your choice: ";
    $choice = readline();

    switch ($choice) {
        case 1:
            meals();
            $choice = readline();
            if ($choice == 1) {
                Biryani();
            } elseif ($choice == 2) {
                rotti();
            } elseif ($choice == 3) {
                echo "AVAILABLE IN THALAPAKATTI".PHP_EOL;
            } elseif ($choice == 4) {
                echo "NOT AVAILABLE IN THALAPAKATTI".PHP_EOL;
            }
            break;
        case 2:
            meals();
            $choice = readline();
            if ($choice == 1) {
                Biryani();
            } elseif ($choice == 2) {
                rotti();
            } elseif ($choice == 3) {
                echo "NOT AVAILABLE IN SS Hyderabad".PHP_EOL;
            } elseif ($choice == 4) {
                thanduri();
            }
            break;
        case 3:
            meals();
            $choice = readline();
            if ($choice == 1) {
                Biryani();
            } elseif ($choice == 2) {
                rotti();
            } elseif ($choice == 3) {
                echo "NOT AVAILABLE in Salem RR".PHP_EOL;
            } elseif ($choice == 4) {
                thanduri();
            }
            break;
        case 4:
            meals();
            $choice = readline();
            if ($choice == 1) {
                Biryani();
            } elseif ($choice == 2) {
                rotti();
            } elseif ($choice == 3) {
                echo "NOT AVAILABLE in Palm Shore".PHP_EOL;
            } elseif ($choice == 4) {
                thanduri();
            }
            break;
        default:
            echo "----Thank you, welcome again----".PHP_EOL;
            break;
    }

    function thanduri() {
        $thanduri = "thanduri";
        $name = "thanduri";
        $price = "420";
        date_default_timezone_set("Asia/Calcutta");

        $orderTime = date("Y-m-d H:i:s");
        $deliveryTime = date("Y-m-d H:i:s", strtotime("+20 minutes"));
        $arr = [
            $thanduri => [
                "name" => $name,
                "price" => $price,
                "order_time" => $orderTime,
                "delivery_time" => $deliveryTime
            ]
        ];

        echo "Order Time: " . $arr[$thanduri]["order_time"] . PHP_EOL;
        echo "Order will be delivered by " . $arr[$thanduri]["delivery_time"] . PHP_EOL;

    }

    function meals() {
        echo "1. Biryani".PHP_EOL;
        echo "2. Roti".PHP_EOL;
        echo "3. Non-Veg Meals".PHP_EOL;
        echo "4. Thanduri".PHP_EOL;
        echo "Enter your choice: ";
    }

    function Biryani() {
        $biryani = "biryani";
        $name = "Biryani";
        $price = "120";

        date_default_timezone_set("Asia/Calcutta");

        $orderTime = date("Y-m-d H:i:s");
        $deliveryTime = date("Y-m-d H:i:s", strtotime("+30 minutes"));

        $arr = [
            $biryani => [
                "name" => $name,
                "price" => $price,
                "order_time" => $orderTime,
                "delivery_time" => $deliveryTime
            ]
        ];

        echo "Order Time: " . $arr[$biryani]["order_time"] . PHP_EOL;
        echo "Order will be delivered by " . $arr[$biryani]["delivery_time"] . PHP_EOL;
    }

    function rotti() {
        echo "Butter Naan / Butter Chicken".PHP_EOL;
        echo "Garlic Naan / Pepper Chicken".PHP_EOL;
        echo "Naan / Egg Tikka".PHP_EOL;

        $rotti = "rotti";
        $name = "Rotti";
        $price = "80";

        date_default_timezone_set("Asia/Calcutta");

        $orderTime = date("Y-m-d H:i:s");
        $deliveryTime = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        $arr = [
            $rotti => [
                "name" => $name,
                "price" => $price,
                "order_time" => $orderTime,
                "delivery_time" => $deliveryTime
            ]
        ];

        echo "Order Time: " . $arr[$rotti]["order_time"] . PHP_EOL;
        echo "Order will be delivered by " . $arr[$rotti]["delivery_time"] . PHP_EOL;
    }
    // $food_booking=array(thalapakatti=>array(
    //     "biriyani"=> array(
    //         "chicken biriyani"=> array(
    //             "price"=> "120",
    //             "waiting time"=> "30 mins",
    //         ),
    //         "mutton biriyani"=> array(
    //             "price"=> "250",
    //             "waiting time"=> "30 mins",
    //         ),
    //         "beef biriyani"=> array(
    //             "price"=> "200",
    //             "waiting time"=> "30 mins",
    //         ),
    //     ),
    //  )
    
?>
