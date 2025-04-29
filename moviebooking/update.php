<?php
include 'configuration/curl.php';

if (isset($_GET['update_id'])){
  $apiKey = "update";
  $updateArr = [];
  $updateArr["data_id"] = $_GET['update_id'];
  $updateArr["action"] = "update";
  $responce = curl($apiKey,$updateArr);
  $finalVal = json_decode($responce,true);
}
  $movie = '';
  $user_id = '';
  $theater = '';
  $price = '';
  $payment = '';
  $status = '';
  $id = '';

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
    $responce = curl($apiKey,$updateArr);
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
