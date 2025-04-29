<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movie Booking</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assert/css/showlist.css">

</head>

<body>
  <div class="container-fluid cuscontainer">
    <nav class="navbar navbar-inverse cusnav">
      <div class="container-fluid">
        <div class="navbar-header header">
          <a class="navbar-brand" href="#">Movie booking</a>
        </div>
        <form class="navbar-form navbar-right btnsett cusinput" action="searchpage.html">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default cusbtn">Search</button>
        </form>
      </div>
    </nav>
  </div>

  <div class="dropdown" style="margin-left: 30px; margin-top: 20px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">price By
      <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="./showlist.php?price=price">Price</a></li>
      <li><a href="./showlist.php?status=status">Status</a></li>
    </ul>
  </div>

<?php
  $apiKey = "showlist";
  $userVal = [];
  $userVal["action"] = "search";
  $cl = curl_init();
  curl_setopt_array($cl,[
      CURLOPT_URL => "http://localhost/practicephp/moviebooking/server.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POSTFIELDS => $userVal,
      CURLOPT_HTTPHEADER => 
          ["API-KEY: $apiKey"]
  ]);
  $arr = [];
  $responce = curl_exec($cl);
  $finalVal = json_decode($responce,true);
  
  if (isset($_GET['price'])){
    $filter_by = $_GET['price'];
    $apiKey = "price";
    $userVal = [];
    $userVal["action"] = "price";
    $responce = curl($apiKey,$userVal);
    $finalVal = json_decode($responce,true);

  }else if (isset($_GET['status'])){
    $filter_by = $_GET['status'];
    $apiKey = "status";

    $userVal = [];
    $userVal["action"] = "status";
    $responce = curl($apiKey,$userVal);
    $finalVal = json_decode($responce,true);
  }


  echo "
    <div class='container-fluid cuslist'>
      <form method='post'>
        <div class='cusheading'>
          <h1>Booking details!</h1>
          <a href='eval_add.php'>Add</a>
        </div>
        <table border='1' class='table table-bordered'>
          <tr>
            <th width='150'>Movie name</th>
            <th width='100'>Theater</th>
            <th width='100'>Mobile No</th>
            <th width='180'>Price</th>
            <th width='180'>Payment Type</th>
            <th width='150'>Status</th>
            <th width='200'>Action</th>
          </tr>";

    foreach($finalVal as $data){
      echo "
          <tr>
            <td>{$data['movie_name']}</td>
            <td>{$data['theater_name']}</td>
            <td>{$data['user_mobile']}</td>
            <td>{$data['price']}</td>
            <td>{$data['payment_type']}</td>
            <td>{$data['payment_status']}</td>
            <td>
              <a class='update' href='update.php?update_id={$data['booking_id']}'>Update</a>
              <a class='delete' href='delete.php?delete_id={$data['booking_id']}'>Delete</a>
            </td>
          </tr>";
    }

  echo "
        </table>
      </form>
    </div>";
?>
</body>
</html>
