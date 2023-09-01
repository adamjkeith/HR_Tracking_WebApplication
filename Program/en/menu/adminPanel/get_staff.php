<?php
// Database connection details
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

// Query to get staff members' usernames
$sql = "SELECT username FROM logins";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $staffMembers = array();
    while ($row = $result->fetch_assoc()) {
        $staffMembers[] = $row['username'];
    }

    echo json_encode($staffMembers);
} else {
    echo json_encode(array());
}

$conn->close();
?>
