<?php
if (isset($_GET['update_id'])){
  $apiKey = "update";
  $updateArr = [];
  $updateArr["data_id"] = $_GET['update_id'];
  $updateArr["action"] = "update";
  $cl = curl_init();
  curl_setopt_array($cl,[
      CURLOPT_URL=>"http://localhost/practicephp/moviebooking/server.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POSTFIELDS => $updateArr,
      CURLOPT_HTTPHEADER => 
      ["API-KEY: $apiKey"]
  ]);
  $responce = curl_exec($cl);
  $finalVal = json_decode($responce,true);
  // print_r($finalVal);
}


// $source = isset($_POST['source'])?$_POST['source']:'';
// $destination = isset($_POST['destination'])?$_POST['destination']:'';
// $date = isset($_POST['date'])?$_POST['date']:'';
// $basefare = isset($_POST['basefare'])?$_POST['basefare']:'';
// $airlineCode = isset($_POST['airlineCode'])?$_POST['airlineCode']:'';
// $airlineName = isset($_POST['airlineName'])?$_POST['airlineName']:'';
// $apiKey = "UPDATEVALUES";
// // echo $source;
// $cl = curl_init();
// $data = [
//     "source" => $source,
//     "destination" => $destination,
//     "date" => $date,
//     "basefare" => $basefare,
//     "airlineCode" => $airlineCode,
//     "airlineName" => $airlineName
// ];
// $updateArr = [];
// $updateArr["datas"] = json_encode($data);
// // var_dump($updateArr);
// $updateArr["action"] = "updateValues";
// curl_setopt_array($cl,[
//     CURLOPT_URL => "http://localhost/practicephp/flighttask/server.php",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_HTTPHEADER => 
//         ["API-KEY: $apiKey"]
// ]);
// $responce = curl_exec($cl);
//   include 'configuration/config.php';

  $movie = '';
  $user_id = '';
  $theater = '';
  $price = '';
  $payment = '';
  $status = '';
  $id = '';

// if (isset($_GET['update_id'])){
//     $id = $_GET['update_id'];
//     $query = "select * from booking where booking_id = :id";

    
//     $result = mysqli_query($connect, $query);

//     if ($result && mysqli_num_rows($result) > 0){
//         $row = mysqli_fetch_assoc($result);
//         $movie = $row['r_movie_id'];
//         $user_id = $row['r_user_id'];
//         $theater = $row['r_theater_id'];
//         $price = $row['price'];
//         $payment = $row['r_payment'];
//         $status = $row['status'];
//     } else{
//         echo "Booking not found!";
//         exit;
//     }
// }

if (isset($_POST['submit'])){
    $movie = $_POST['Movie'];
    $user_id = $_POST['User'];
    $theater = $_POST['theater'];
    $price = $_POST['price'];
    $payment = $_POST['payment'];

    $data[] = [
      "movie"=>$movie,
      "user_id"=>$user_id,
      "theater"=>$theater,
      "price"=>$price,
      "payment"=>$payment
    ] ;
    $apiKey = "updateVal";
    $updateArr = [];
    $updateArr["data_id"] = $_GET['update_id'];
    $updateArr["datas"] = json_encode($data);
    $updateArr["action"] = "updateVal";
    
    $cl = curl_init();
    curl_setopt_array($cl,[
        CURLOPT_URL=>"http://localhost/practicephp/moviebooking/server.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POSTFIELDS => $updateArr,
        CURLOPT_HTTPHEADER => 
        ["API-KEY: $apiKey"]
    ]);
    $responce = curl_exec($cl);
    if($responce=="succ"){
      header("Location:showlist.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assert/css/update.css">

    <title>Update page</title>
</head>

<body>
    <div class="container-fluid cuscontainer">
        <nav class="navbar navbar-inverse cusnav">
          <div class="container-fluid">
            <div class="navbar-header header">
              <a class="navbar-brand" href="#">Movie booking</a>
            </div>
            <form class="navbar-form navbar-right btnsett cusinput" action="/action_page.php">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default cusbtn">Search</button>
            </form>
          </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="headercontainer">
             <h3>Update Booking!</h3>
            </div>
            <div class="col-sm-12">
                <div class="addcontainer">
                    <form action="" method="post" class="add">
                      <label>Movie ID:</label><br>
                      <input name="Movie" type="text" value="<?php echo $finalVal['r_movie_id']; ?>"><br><br>

                      <label>User ID:</label><br>
                      <input name="User" type="text" value="<?php echo $finalVal['r_user_id']; ?>"><br><br>

                      <label>Theater ID:</label><br>
                      <input name="theater" type="text" value="<?php echo $finalVal['r_theater_id']; ?>"><br><br>

                      <label>Price:</label><br>
                      <input name="price" type="text" value="<?php echo $finalVal['price']; ?>"><br><br>
              
                      <label>Payment Type:</label><br>
                      <input name="payment" type="text" value="<?php echo $finalVal['r_payment']; ?>"><br><br>
              

                      <input name="submit" type="submit" value="Update Booking" class="btn btn-default cusbtn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
