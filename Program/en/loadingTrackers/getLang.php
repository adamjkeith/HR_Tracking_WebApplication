<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Retrieve userIDValue from AJAX request
if (isset($_POST['userIDValue'])) {
    $userIDValue = $_POST['userIDValue']; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query
    $sql = "SELECT lang FROM logins WHERE userID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userIDValue);
    $stmt->execute();
    $result = $stmt->get_result();

    // Process the result
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $lang = $row["lang"];
            // Echo the notification value back to JavaScript
            echo $lang;
        }
    } else {
        // If no data is found for the given userIDValue
    }

    $stmt->close();
    $conn->close();
}
?>
