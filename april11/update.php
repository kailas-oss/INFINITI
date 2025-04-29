<?php
$conn=mysqli_connect("localhost","root","123456789","flight_project");
$a = $_REQUEST;
$dataId=$a["dataId"];
$source = $a["source"];
$destination = $a["destination"];   
$date = $a["Date"];
$basefare = $a["baseFare"];
$airline_code = $a["airlineCode"];
$airline_name = $a["airlineName"];
$query="update data set source='$source',destination='$destination',date='$date',basefare=$basefare,airlinecode='$airline_code',airlinename='$airline_name' where data_id=$dataId";
$result=mysqli_query($conn,$query);
if ($result) {
    echo "<h2>Data updated successfully!</h2><br>";

    $selectQuery = "SELECT * FROM data ORDER BY data_id ASC";
    $selectResult = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($selectResult) > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0'>
                <tr>
                    <th>SNo.</th>
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
        echo '<a href="main.html">back</a>';
    } else {
        echo "No data found.";
    }
} else {
    echo "Error" ;
}

mysqli_close($conn);
?>