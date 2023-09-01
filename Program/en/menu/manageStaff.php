<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form data from the POST request
  $firstName = $_POST["firstName"];
  $surname = $_POST["surname"];
  $entitlement = $_POST["entitlement"];
  $roster = $_POST["roster"];

  // Replace with your database credentials
  $servername = "localhost";
  $username = "root";
  $password = "Password";
  $dbname = "webapp";

  // Create a new mysqli connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check if the connection was successful
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Check if the staff exists in the database
  $sql = "SELECT * FROM rosters WHERE fName = '$firstName' AND sName = '$surname'";
  $result = $conn->query($sql);

  if ($result->num_rows === 0) {
    // Staff doesn't exist, insert a new record
    $sql = "INSERT INTO rosters (fName, sName, hEntitlement, rosterS) VALUES ('$firstName', '$surname', '$entitlement', '$roster')";
    if ($conn->query($sql) === TRUE) {
      echo "New Staff Added!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    // Staff exists, delete the record
    $sql = "DELETE FROM rosters WHERE fName = '$firstName' AND sName = '$surname'";
    if ($conn->query($sql) === TRUE) {
      echo "Staff Removed";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  // Close the database connection
  $conn->close();
} else {
  echo "Invalid request";
}
?>
