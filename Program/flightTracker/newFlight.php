<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Retrieve the data sent by Ajax
$data = json_decode(file_get_contents('php://input'), true);

// Extract the data
$firstname = $data['firstname'];
$surname = $data['surname'];
$flightDateFO = $data['flightDateFO'];
$flightDateFB = $data['flightDateFB'];
$takeoffTimeUp = $data['takeoffTimeUp'];
$landingTimeUp = $data['landingTimeUp'];
$flightNumberUp = $data['flightNumberUp'];
$takeoffTimeDown = $data['takeoffTimeDown'];
$landingTimeDown = $data['landingTimeDown'];
$flightNumberDown = $data['flightNumberDown'];

// Update data in the flights table in the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a row with the given "firstname" and "surname" exists
$check_sql = "SELECT * FROM flights WHERE dataFName = '$firstname' AND dataSName = '$surname'";
$result = $conn->query($check_sql);

if ($result->num_rows > 0) {
    // If a matching row exists, update the existing data

    // Fetch existing data
    $row = $result->fetch_assoc();
    $existingFlightDateFO = $row['dataFO'];
    $existingFlightDateFB = $row['dataFB'];
    $existingTakeoffTimeUp = $row['upTimeUp'];
    $existingLandingTimeUp = $row['downTimeUp'];
    $existingTakeoffTimeDown = $row['upTimeDown'];
    $existingLandingTimeDown = $row['downTimeDown'];
    $existingFlightNumberUp = $row['flightnumUp'];
    $existingFlightNumberDown = $row['flightnumDown'];

    // Append new data
    $updatedFlightDateFO = $existingFlightDateFO ? $existingFlightDateFO . ' ' . $flightDateFO : $flightDateFO;
    $updatedFlightDateFB = $existingFlightDateFB ? $existingFlightDateFB . ' ' . $flightDateFB : $flightDateFB;
    $updatedTakeoffTimeUp = $existingTakeoffTimeUp ? $existingTakeoffTimeUp . ' ' . $takeoffTimeUp : $takeoffTimeUp;
    $updatedLandingTimeUp = $existingLandingTimeUp ? $existingLandingTimeUp . ' ' . $landingTimeUp : $landingTimeUp;
    $updatedTakeoffTimeDown = $existingTakeoffTimeDown ? $existingTakeoffTimeDown . ' ' . $takeoffTimeDown : $takeoffTimeDown;
    $updatedLandingTimeDown = $existingLandingTimeDown ? $existingLandingTimeDown . ' ' . $landingTimeDown : $landingTimeDown;
    $updatedFlightNumberUp = $existingFlightNumberUp ? $existingFlightNumberUp . ' ' . $flightNumberUp : $flightNumberUp;
    $updatedFlightNumberDown = $existingFlightNumberDown ? $existingFlightNumberDown . ' ' . $flightNumberDown : $flightNumberDown;

    // Update the row with the new data
    $update_sql = "UPDATE flights
                   SET dataFO = '$updatedFlightDateFO',
                       dataFB = '$updatedFlightDateFB',
                       upTimeUp = '$updatedTakeoffTimeUp',
                       downTimeUp = '$updatedLandingTimeUp',
                       upTimeDown = '$updatedTakeoffTimeDown',
                       downTimeDown = '$updatedLandingTimeDown',
                       flightnumUp = '$updatedFlightNumberUp',
                       flightnumDown = '$updatedFlightNumberDown'
                   WHERE dataFName = '$firstname' AND dataSName = '$surname'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Flight data updated successfully";
    } else {
        echo "Error updating flight data: " . $conn->error;
    }
} else {
    // If no matching row exists, insert a new row
    $insert_sql = "INSERT INTO flights (dataFName, dataSName, dataFO, dataFB, upTimeUp, downTimeUp, upTimeDown, downTimeDown, flightnumUp, flightnumDown)
                   VALUES ('$firstname', '$surname', '$flightDateFO', '$flightDateFB', '$takeoffTimeUp', '$landingTimeUp', '$takeoffTimeDown', '$landingTimeDown', '$flightNumberUp', '$flightNumberDown')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New flight record created successfully";
    } else {
        echo "Error inserting new flight record: " . $conn->error;
    }
}

$conn->close();
?>
