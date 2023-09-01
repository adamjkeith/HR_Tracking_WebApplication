<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Function to sanitize user inputs
function sanitizeInput($input)
{
    if (isset($input) && is_string($input)) {
        return htmlspecialchars(strip_tags(trim($input)));
    }
    return null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from Ajax request
    $usernamed = sanitizeInput($_POST['username']);
    $newPassword = sanitizeInput($_POST['newPassword']);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user exists in the database
    $sql = "SELECT password FROM logins WHERE username = '$usernamed'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        // Old password is correct, proceed with updating the password
        $sql = "UPDATE logins SET password = '$newPassword' WHERE username = '$usernamed'";

        if ($conn->query($sql) === true) {
            // Password updated successfully
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    $conn->close();
}
?>
