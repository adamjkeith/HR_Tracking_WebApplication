<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the values of rfName and rsName from cookies
$rfName = $_COOKIE['rfName'];
$rsName = $_COOKIE['rsName'];

// Fetch data from the rosters table
$sql = "SELECT dates, hEntitlement, sEntitlement, manager, rosterS FROM rosters WHERE fName = '$rfName' AND sName = '$rsName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Convert the result to an associative array and encode it as JSON
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(null); // If no data found, return null
}

$conn->close();
?>
