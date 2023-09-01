<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the data from the AJAX request
$rfName = $_POST['rfName'];
$rsName = $_POST['rsName'];
$datesJSON = $_POST['datesJSON'];

// Find the corresponding row in the rosters table
$stmt = $conn->prepare("UPDATE rosters SET dates = ? WHERE fName = ? AND sName = ?");
$stmt->bind_param("sss", $datesJSON, $rfName, $rsName);

if ($stmt->execute()) {
  // Send a success response back to the AJAX request
  $response = array('success' => true, 'message' => 'Dates added successfully.');
  echo json_encode($response);
} else {
  // Send an error response back to the AJAX request
  $response = array('success' => false, 'message' => 'Error: ' . $conn->error);
  echo json_encode($response);
}

// Close the connection
$stmt->close();
$conn->close();
?>
