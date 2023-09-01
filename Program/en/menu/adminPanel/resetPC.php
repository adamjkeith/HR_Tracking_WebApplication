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

// SQL query to update the acceptedTerms column in the logins table
$sql = "UPDATE logins SET passChange = '0'";

if ($conn->query($sql) === TRUE) {
    echo "Password Request Reset successfully.";
} else {
    echo "Error resetting Password Request: " . $conn->error;
}

$conn->close();
?>
