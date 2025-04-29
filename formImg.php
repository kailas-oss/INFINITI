<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
    <label>Upload File:</label>
    <input type="file" name="img" id="fileimg" required><br><br>
    <button type="submit">Submit</button>
</form> ?
<?php
    move_uploaded_file($_FILES["img"]["tmp_name"],"C:/xampp/htdocs/practicephp/".$_FILES["img"]["name"]);
?>
</body>
</html>