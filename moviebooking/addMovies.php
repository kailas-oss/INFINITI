
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assert/css/addMovies.css">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid cuscontainer">
        <nav class="navbar navbar-inverse cusnav">
          <div class="container-fluid">
            <div class="navbar-header header cusheader">
              <a class="navbar-brand" href="#">Movie booking</a>
            </div>
            <form class="navbar-form navbar-right btnsett cusinput" action="searchpage.html">
              <!-- <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div> -->
              <!-- <button class="cusbtn" type="submit" class="btn btn-default cusbtn">Search</button> -->
            </form>
          </div>
        </nav>
    </div>

    <div class="forms">
        <form action="" method="POST">
            <label for="">Movie Name :</label><br>
            <input name="movie" type="text" required><br>
            <label for="">Description :</label><br>
            <input name="description" type="text" required><br>

            <label for="">Duration :</label><br>
            <input name="duration" type="time" required><br>

            <label for="">Movie Type :</label><br>
            <input name="moveType" type="text" required><br>

            <label for="">Support Language :</label><br>
            <input name="suppLang" type="text" required><br>

            <label for="">Release Date :</label><br>
            <input name="releaseDate" type="date" required><br>

            <label for="">Caste :</label><br>
            <input name="caste" type="text" required><br>

            <label for="">Image :</label><br>
            <input enctype ="multipart/form-data"  name="image" type="file" required><br>
            <input type="submit">
        </form>
    </div>
</body>
</html>
<?php
    include 'configuration/curl.php';
    $movie = $_POST['movie'];
    $description = isset($_POST['description'])?$_POST['description']:'';
    $duration = isset($_POST['duration'])?$_POST['duration']:'';
    $movieType = isset($_POST['moveType'])?$_POST['moveType']:'';
    $suppLang = isset($_POST['suppLang'])?$_POST['suppLang']:'';
    $releaseDate = isset($_POST['releaseDate'])?$_POST['releaseDate']:'';
    $caste = isset($_POST['caste'])?$_POST['caste']:'';
    $image = isset($_POST['image'])?$_POST['image']:'';
    // echo $movie;
    $apiKey = "addmovies123";
    $addMovies = [];
    $addMovies["details"] =json_encode([
      "movie" => $movie,
      "description"=>$description,
      "duration"=>$duration,
      "movieType"=>$movieType,
      "suppLang"=>$suppLang,
      "releaseDate"=>$releaseDate,
      "caste"=>$caste,
      "image"=>$image
    ]);
    $addMovies["action"] = "addMovies";
    $responce = curl($apiKey,$addMovies);
    // print_r($responce);    
?>