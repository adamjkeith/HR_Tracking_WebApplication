<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch flights data from the database
$sql = "SELECT ID, dataFName, dataSName, dataSDate, dataFO, dataFB, country FROM flights";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $flightsData = array();
    // Fetch all rows from the database and store in an array
    while ($row = $result->fetch_assoc()) {
        $flightsData[] = $row;
    }
    // Return the data as JSON
    echo json_encode($flightsData);
} else {
    echo "0 results";
}
$conn->close();
?>
