<?php
    include 'configuration/config.php';
    $action = $_POST['action'];

    $headers = getallheaders();

    $key = isset($headers['API-KEY']) ? $headers['API-KEY'] : null;
    if($key=="showlist"){
        if($action=="search"){
            include 'configuration/config.php';
            // $connect = connect();x
            echo search($connect);
        }
    }else if($key=="price"){
        if($action=="price"){
            echo price($connect);
        }
    }else if($key=="status"){
        if($action=="status"){
            echo status($connect);
        }
        
    }else if($key=="update"){
        if($action=="update"){
            echo update($_POST['data_id'],$connect);
        }
        
    }else if($key=="updateVal"){
        if($action=="updateVal"){
            echo updateVal($connect);
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
            return add($connect);
        }
    }else if($key=="addmovies123"){
        if($action=="addMovies"){
            // echo "add Movies";
            $details = $_POST['details'];
            $output = json_decode($details,true);
            // print_r($output);
            $movie = $output['movie'];
            $description = $output['description'];
            $duration = $output['duration'];
            $movieType = $output['movieType'];
            $suppLang = $output['suppLang'];
            $releaseDate = $output['releaseDate'];
            $caste = $output['caste'];
            $image = $output['image'];

            $insert = "insert into movie (movie_name,description,duration,movie_type,supp_lang,release_date,r_caste)
            values(:movie,:description,:duration,:movieType,:suppLang,:release,:caste);";
            $inserting = $connect->prepare($insert);
            $inserting->bindParam(':movie',$movie);
            $inserting->bindParam(':description',$description);
            $inserting->bindParam(':duration',$duration);
            $inserting->bindParam(':movieType',$movieType);
            $inserting->bindParam(':suppLang',$suppLang);
            $inserting->bindParam(':release',$releaseDate);
            $inserting->bindParam(':caste',$caste);
            $inserting->execute();    
            
            $sql = "select movie_id from movie where movie_name = :movie and description = :description and duration = :duration and movie_type = :movieType and supp_lang = :suppLang and release_date = :release and r_caste = :caste";

            $sel = $connect->prepare($sql);
            $sel->bindParam(':movie', $movie);
            $sel->bindParam(':description', $description);
            $sel->bindParam(':duration', $duration);
            $sel->bindParam(':movieType', $movieType);
            $sel->bindParam(':suppLang', $suppLang);
            $sel->bindParam(':release', $releaseDate);
            $sel->bindParam(':caste', $caste);

            $sel->execute();
            $result = $sel->fetch(PDO::FETCH_ASSOC);

            $movie_id = $result['movie_id'];

            // $img = $_FILES['image'];
            // print_r($img);
            
        }
    }


                //ADD FUNCTION
    function add($connect){
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
                //SEARCH FUNCTION
    function search($connect){
        $output = [];
        $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m on b.r_movie_id = m.movie_id  inner join theater as t on b.r_theater_id = t.theater_id  
        inner join login as l on b.r_user_id = l.user_id inner join payment as p on b.r_payment = p.payment_id;");
        $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($output["datas"]);
    }
            
                // UPDATE FUNCTION
    function update($data_id,$connect){
        $output = [];
        $sel = $connect->query("select * from booking where booking_id='$data_id';");
        $output["datas"] = $sel->fetch(PDO::FETCH_ASSOC);
        echo json_encode($output["datas"]);
    }
                //UPDATEVAL FUNCTION
    function updateVal($connect){
        $datas = json_decode($_POST['datas'], true); 
        $movie = $datas[0]['movie'];
        $user_id = $datas[0]['user_id']; 
        $theater = $datas[0]['theater'];
        $price = $datas[0]['price'];
        $payment = $datas[0]['payment'];

        $output = [];
        $booking_id = $_POST['data_id'];
        $stat = $connect->query("select * from booking where booking_id='$booking_id'");
        $output["datas"] = $stat->fetchAll(PDO::FETCH_ASSOC);
        $status = $output['datas'][0]['status'];
        $id = $output['datas'][0]['booking_id'];
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
        return  "succ";
    }
            //PRICE FUNCTION
    function price($connect){
        $output = [];
        $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m on b.r_movie_id = m.movie_id inner join theater as t on b.r_theater_id = t.theater_id  
        inner join login as l on b.r_user_id = l.user_id inner join payment as p on b.r_payment = p.payment_id order BY b.price ASC;");
        $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
        return  json_encode($output["datas"]); 
    }
            //STATUS FUNCTION
    function status($connect){
        $output = [];
        $sel =$connect->query("select b.*, m.movie_name, t.theater_name, l.mobileNo as user_mobile, p.payment_type, p.status as payment_status from booking as b inner join movie as m ON b.r_movie_id = m.movie_id  
        inner join theater as t ON b.r_theater_id = t.theater_id inner join login as l ON b.r_user_id = l.user_id inner join payment as p ON b.r_payment = p.payment_id where p.status = 'success';");
        $output["datas"] = $sel->fetchAll(PDO::FETCH_ASSOC);
        return  json_encode($output["datas"]); 
    }
    
?>
