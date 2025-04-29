<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assert/css/eval_add.css">
    <title>Add page</title>
</head>
<body>
    <div class="container-fluid cuscontainer">
        <nav class="navbar navbar-inverse cusnav">
          <div class="container-fluid">
            <div class="navbar-header headercon">
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
             <h3>Add page!</h3>
            </div>
            <div class="col-sm-12">
                <div class="addcontainer">
                    <form action="" method="post" class="add">
                        <label >Movie_id : </label><br>
                        <input name="Movie" type="text"> <br>
                        <br>

                        <label >User_id : </label><br>
                        <input name="User" type="text"> <br>
                        <br>

                        <label >Theater_id : </label><br>
                        <input name ="theater" type="text"> <br>
                        <br>

                        <label >price : </label><br>
                        <input name="price" type="text"> <br>
                        <br>
                
                        <label >Payment Type : </label><br>
                        <input name="payment" type="text"> <br>
                        <br>
                
                        <label >Status : </label><br>
                        <input name="status" type="text"> <br>
                        <br>
                          <input name="submit" type="submit">
                         <br>
                  </form>
                </div>
            </div>
        </div>
    </div>
<?php

  
  // error_reporting(0);
  include 'configuration/curl.php';

  $movie   = isset($_POST['Movie'])? $_POST['Movie']:'';
  $userId  = isset($_POST['User'])? $_POST['User']: '';
  $theater = isset($_POST['theater'])? $_POST['theater']: '';
  $price   = isset($_POST['price'])? $_POST['price']: '';
  $payment = isset($_POST['payment'])? $_POST['payment']: '';
  $status  = isset($_POST['status'])? $_POST['status']: '';

  $apiKey = "add";
  $addArray = [];
  
  $addArray["datas"] = json_encode([
    "movie" => $movie,
    "userId" => $userId,
    "theater" => $theater,
    "price" => $price,
    "payment" => $payment,
    "status" => $status
  ]);
  $addArray["action"] = "add";
  $responce = curl($apiKey,$addArray);
  if($responce=="success"){
    echo "<script>alert('INSERTED SUCCESSFULLY');</script>";
    header("location:showlist.php");
  }
?>
</body>
</html>


