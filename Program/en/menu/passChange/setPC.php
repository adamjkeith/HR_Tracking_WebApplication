<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Get the userID from the AJAX request
if (isset($_POST['userID'])) {
  $userID = $_POST['userID'];
} else {
  echo "userID parameter is missing.";
  exit;
}

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL update query
$sql = "UPDATE logins SET passChange = 1 WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);

if ($stmt->execute()) {
  echo "Successfully updated passChange for userID: " . $userID;
} else {
  echo "Error updating passChange: " . $conn->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
