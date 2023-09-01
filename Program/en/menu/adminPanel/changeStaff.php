<?php

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data from the request
    $newStaff = $_POST["staff"];
    $password = $_POST["password"];
    $userID = $_POST["userID"];

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "Password";
    $dbname = "webapp";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the input data to prevent SQL injection
    $newStaff = $conn->real_escape_string($newStaff);
    $password = $conn->real_escape_string($password);
    $userID = $conn->real_escape_string($userID);

    // Check if the username exists in the table logins
    $sqlCheckUsername = "SELECT * FROM logins WHERE username = '$newStaff'";
    $result = $conn->query($sqlCheckUsername);

    if ($result) {
        if ($result->num_rows > 0) {
            // Username exists, so remove the row
            $sqlDelete = "DELETE FROM logins WHERE username = '$newStaff'";
            if ($conn->query($sqlDelete) === TRUE) {
                // Successful deletion
                echo json_encode(array("success" => true, "message" => "Staff member deleted."));
            } else {
                // Error handling for deletion
                echo json_encode(array("success" => false, "message" => "Error deleting the user."));
            }
        } else {
            // Username does not exist, so add a new row
            $sqlInsert = "INSERT INTO logins (username, password, userID) VALUES ('$newStaff', '$password', '$userID')";
            if ($conn->query($sqlInsert) === TRUE) {
                // Successful insertion
                echo json_encode(array("success" => true, "message" => "Staff member added."));
            } else {
                // Error handling for insertion
                echo json_encode(array("success" => false, "message" => "Error adding the new user."));
            }
        }
    } else {
        // Error handling for SELECT query
        echo json_encode(array("success" => false, "message" => "Database error."));
    }

    // Close the database connection
    $conn->close();
} else {
    // Return an error response if the request method is not POST
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
