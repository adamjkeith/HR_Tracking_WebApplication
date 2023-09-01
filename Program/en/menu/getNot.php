<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Retrieve userIDValue from AJAX request
if (isset($_POST['userIDValue'])) {
    $userIDValue = $_POST['userIDValue']; // Make sure to sanitize and validate the data here!

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query
    $sql = "SELECT notification FROM logins WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userIDValue);
    $stmt->execute();
    $result = $stmt->get_result();

    // Process the result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $notification = $row["notification"];
            // Echo the notification value back to JavaScript
            echo $notification;
        }
    } else {
        // If no data is found for the given userIDValue
        echo "No notification found for the given userID.";
    }

    $stmt->close();
    $conn->close();
}
?>
