<?php
    
    include 'config.php';
    
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$a = $_REQUEST;
$source = $a["source"];
$destination = $a["destination"];
$date = $a["Date"];
$basefare = $a["baseFare"];
$airline_code = $a["airlineCode"];
$airline_name = $a["airlineName"];

$query = "INSERT INTO data (source, destination, date, basefare, airlinecode, airlinename) VALUES ('$source', '$destination', '$date', $basefare, '$airline_code', '$airline_name');";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Insertion</title>
    <style>
        body {
            background: white;
            padding: 20px;
            text-align: center;
        }
        h2 {
            color: #00bcd4;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid;
        }
        th {
            background-color: #00bcd4;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00bcd4;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: 0.3s;
        }
        a:hover {
            background-color: #00bcd4;
        }
    </style>
</head>
<body>
        
<?php
if ($result) {
    echo "<h2>Data Inserted Successfully!</h2>";

    $selectQuery = "SELECT * FROM data ORDER BY data_id ASC";
    $selectResult = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($selectResult) > 0) {
        echo "<table>
                <tr>
                    <th>S.No</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Date</th>
                    <th>Base Fare</th>
                    <th>Airline Code</th>
                    <th>Airline Name</th>
                </tr>";
        
        while ($row = mysqli_fetch_assoc($selectResult)) {
            echo "<tr>
                    <td>{$row['data_id']}</td>
                    <td>{$row['source']}</td>
                    <td>{$row['destination']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['basefare']}</td>
                    <td>{$row['airlinecode']}</td>
                    <td>{$row['airlinename']}</td>
                  </tr>";
        }
        echo "</table>";
        echo '<a href="main.html">Back to Main</a>';
    } else {
        echo "<p>No data found.</p>";
    }
} else {
    echo "<h2 style='color: red;'>Error inserting data!</h2>";
}

mysqli_close($conn);
?>

</body>
</html>
