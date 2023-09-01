<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the AJAX request
$surname = $_POST['surname'];
$firstname = $_POST['firstname'];
$startDate = $_POST['startDate'];

// Convert the date to the desired format "dd/mm/yyyy"
$formattedStartDate = date('d/m/Y', strtotime($startDate));

// Prepare and execute the SQL query to insert data into the flights table
$stmt = $conn->prepare("INSERT INTO flights (dataFName, dataSName, dataSDate, dataFO, dataFB, firstDay, placeFrom, placeTo) VALUES (?, ?, ?, ' ', ' ', ' ', ' ', ' ')");
$stmt->bind_param("sss", $firstname, $surname, $formattedStartDate);
$stmt->execute();

// Close the statement and the database connection
$stmt->close();
$conn->close();

// Send a response back to the AJAX request (optional)
echo "Data inserted successfully!";
?>
