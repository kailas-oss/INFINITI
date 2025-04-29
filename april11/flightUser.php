<?php
include 'config.php';
$a=$_REQUEST;
$source=$a["source"];
$destination=$a["destination"];
$date=$a["date"];
$query = "SELECT source, destination, date, basefare, airlinecode, airlinename FROM data WHERE source = '$source' AND destination = '$destination' AND date = '$date';";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0'>
            <tr>
                <th>Source</th>
                <th>Destination</th>
                <th>Date</th>
                <th>Base Fare</th>
                <th>Airline Code</th>
                <th>Airline Name</th>
                <th>Save</th>
            </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>{$row['source']}</td>
        <td>{$row['destination']}</td>
        <td>{$row['date']}</td>
        <td>{$row['basefare']}</td>
        <td>{$row['airlinecode']}</td>
        <td>{$row['airlinename']}</td>
        <td>
            <form action='flightuserData.php' method='post'>
                <button type='submit'>Book</button>
            </form>
        </td>
    </tr>";
    
    }
    echo "</table>";
    echo '<a href="userFlight.html">back</a>';
} else {
    echo "No data found.";
}
?>