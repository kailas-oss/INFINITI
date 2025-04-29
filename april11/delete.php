<?php
    include 'config.php';
    $a=$_REQUEST;
    $id=$a["id"];
    $query="delete from data where data_id=$id;";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
    echo "<h2>Data deleted successfully!</h2><br>";

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
?>