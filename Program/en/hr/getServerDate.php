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

$query = "SELECT CURDATE() AS serverDate"; // Query to get the current date
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array('serverDate' => $row['serverDate']);
    echo json_encode($response);
} else {
    echo 'No results';
}

$conn->close();
?>
