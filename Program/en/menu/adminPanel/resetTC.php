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
$sql = "UPDATE logins SET acceptedTerms = '0'";

if ($conn->query($sql) === TRUE) {
    echo "Terms & Conditions reset successfully.";
} else {
    echo "Error resetting Terms & Conditions: " . $conn->error;
}

$conn->close();
?>
