<?php
// Database details
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Extract the data sent from the AJAX request
$userIDValue = $_POST['userID'];
$flagName = $_POST['flag'];

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Update the 'lang' column in the 'logins' table
$sql = "UPDATE logins SET lang = '$flagName' WHERE userID = '$userIDValue'";

if ($conn->query($sql) === TRUE) {
  echo "Lang updated successfully";
} else {
  echo "Error updating lang: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
