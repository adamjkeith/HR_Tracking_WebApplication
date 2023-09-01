<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Extract the data from the form
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$firstDay = $_POST['flightDay'];
$takeoffTimeFirst = $_POST['firstTakeoff'];
$landingTimeFirst = $_POST['firstLand'];
$flightNumberFirst = $_POST['firstNum'];

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
    $update_sql = "UPDATE flights
                   SET firstDay = '$firstDay',
                       firstTakeOff = '$takeoffTimeFirst',
                       firstLand = '$landingTimeFirst',
                       firstNum = '$flightNumberFirst'
                   WHERE dataFName = '$firstname' AND dataSName = '$surname'";

    if ($conn->query($update_sql) === TRUE) {
        echo "Flight data updated successfully";
    } else {
        echo "Error updating flight data: " . $conn->error;
    }
} else {
    // If no matching row exists, insert a new row
    $insert_sql = "INSERT INTO flights (dataFName, dataSName, dataFO, upTimeUp, downTimeUp, flightnumUp)
                   VALUES ('$firstname', '$surname', '$flightDateFO', '$takeoffTimeUp', '$landingTimeUp', '$flightNumberUp')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "New flight record created successfully";
    } else {
        echo "Error inserting new flight record: " . $conn->error;
    }
}

$conn->close();
?>
