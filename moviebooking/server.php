<?php
    include 'configuration/config.php';
    $action = $_POST['action'];

    $headers = getallheaders();

    $key = isset($headers['API-KEY']) ? $headers['API-KEY'] : null;
    if($key=="showlist"){
        if($action=="search"){
            // $res =  search($connect);
            // var_dump($res);
            // echo $res;
            $output = [];
            $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m on b.r_movie_id = m.movie_id  inner join theater as t on b.r_theater_id = t.theater_id  
            inner join login as l on b.r_user_id = l.user_id inner join payment as p on b.r_payment = p.payment_id;");
            $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($output["datas"]);
        }
    }else if($key=="price"){
        if($action=="price"){
            $output = [];
            $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m on b.r_movie_id = m.movie_id inner join theater as t on b.r_theater_id = t.theater_id  
            inner join login as l on b.r_user_id = l.user_id inner join payment as p on b.r_payment = p.payment_id order BY b.price ASC;");
            $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($output["datas"]); 
        }
    }else if($key=="status"){
        if($action=="status"){
            $output = [];
            $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m ON b.r_movie_id = m.movie_id  
            inner join theater as t ON b.r_theater_id = t.theater_id inner join login as l ON b.r_user_id = l.user_id inner join payment as p ON b.r_payment = p.payment_id where p.status = 'success';");
            $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($output["datas"]); 
        }
        
    }else if($key=="update"){
        if($action=="update"){
            echo update($_POST['data_id']);
        }
        
    }else if($key=="updateVal"){
        if($action=="updateVal"){
            // echo "update value";
            $datas = json_decode($_POST['datas'], true); 
            // echo print_r($datas);
            $movie = $datas[0]['movie'];
            $user_id = $datas[0]['user_id'];
            $theater = $datas[0]['theater'];
            $price = $datas[0]['price'];
            $payment = $datas[0]['payment'];

            $output = [];
            $booking_id = $_POST['data_id'];
            $stat = $connect->query("select * from booking where booking_id='$booking_id'");
            $output["datas"] = $stat->fetchAll(PDO::FETCH_ASSOC);
            // print_r($output["datas"]);
            $status = $output['datas'][0]['status'];
            $id = $output['datas'][0]['booking_id'];
            // echo $status; 
            $upd = "
                update booking set r_movie_id = :movie, r_user_id = :user_id,r_theater_id = :theater,price = :price,
                r_payment = :payment,status = :status where booking_id = :id
            ";
            
            $updateQuery = $connect->prepare($upd);
            $updateQuery->bindParam(':movie',$movie);
            $updateQuery->bindParam(':user_id',$user_id);
            $updateQuery->bindParam(':theater',$theater);
            $updateQuery->bindParam(':price',$price);
            $updateQuery->bindParam(':payment',$payment);
            $updateQuery->bindParam(':status',$status);
            $updateQuery->bindParam(':id',$id);
            $updateQuery->execute();
            echo "succ";
            // echo "<script>alert(INSERTED SUCCESSFULLY)</script>";
        }
    }
    else if($key=='delete'){
        if($action=='delete'){
            $data_id = $_POST['data_id'];
            $del = "delete from booking where booking_id = :id";

            $del = $connect->prepare($del);
            $del->bindParam(':id',$data_id);
            $del->execute();
            echo "deleted";
        }
    }
    else if($key=="add"){
        if($action=="add"){
            $datas = $_POST['datas'];
            $output = json_decode($datas,true);
            $movie = $output['movie'];
            $userId = $output['userId'];
            $theater = $output['theater'];
            $price = $output['price'];
            $payment = $output['payment'];
            $status = $output['status'];

            $add = "insert into booking (r_movie_id,r_user_id,r_theater_id,price,r_payment,status) values (?,?,?,?,?,?)";
            $adding = $connect->prepare($add);
            $adding->bindParam(1,$movie);
            $adding->bindParam(2,$userId);
            $adding->bindParam(3,$theater);
            $adding->bindParam(4,$price);
            $adding->bindParam(5,$payment);
            $adding->bindParam(6,$status);

            if($adding->execute()){
                echo "success";
            }else{
                echo "not success";
            }
            
        }
    }

    function update($data_id){
        include 'configuration/config.php';
        $output = [];
        $sel = $connect->query("select * from booking where booking_id='$data_id';");
        $output["datas"] = $sel->fetch(PDO::FETCH_ASSOC);
        echo json_encode($output["datas"]);
    }
    // function search($connect){
    //     include 'configuration/config.php';
        // $output = [];
        // $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m on b.r_movie_id = m.movie_id  inner join theater as t on b.r_theater_id = t.theater_id  
        // inner join login as l on b.r_user_id = l.user_id inner join payment as p on b.r_payment = p.payment_id;");
        // $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
        // return json_encode($output["datas"]);
    // }
?>
