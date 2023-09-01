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

// Query to fetch the flag value where ID is 1
$query = "SELECT flag FROM hrdash WHERE ID = 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array('flag' => $row['flag']);
    echo json_encode($response);
} else {
    echo 'No results';
}

$conn->close();
?>
