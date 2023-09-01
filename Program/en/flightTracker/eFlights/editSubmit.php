<?php
// Retrieve the data sent from the Ajax request
$firstName = $_POST['firstName'];
$surname = $_POST['surname'];
$dataFO = $_POST['dataFO'];
$flightnumUp = $_POST['flightnumUp'];
$upTimeUp = $_POST['upTimeUp'];
$downTimeUp = $_POST['downTimeUp'];
$dataFB = $_POST['dataFB'];
$flightnumDown = $_POST['flightnumDown'];
$upTimeDown = $_POST['upTimeDown'];
$downTimeDown = $_POST['downTimeDown'];

// Database connection settings
$servername = 'localhost';
$username = 'root';
$password = 'Passwrod';
$dbname = 'webapp';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL statement to update the "flights" table
$sql = "UPDATE flights 
        SET dataFO = '$dataFO', flightnumUp = '$flightnumUp', upTimeUp = '$upTimeUp', downTimeUp = '$downTimeUp', 
            dataFB = '$dataFB', flightnumDown = '$flightnumDown', upTimeDown = '$upTimeDown', downTimeDown = '$downTimeDown' 
        WHERE dataFName = '$firstName' AND dataSName = '$surname'";

// Execute the SQL statement
if ($conn->query($sql) === TRUE) {
    echo 'Data updated successfully';
} else {
    echo 'Error updating data: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>
