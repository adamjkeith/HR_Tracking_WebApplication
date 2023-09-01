<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Function to sanitize user inputs
function sanitizeInput($input)
{
    return htmlspecialchars(strip_tags(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from Ajax request
    $userID = sanitizeInput($_POST['userID']);
    $oldPassword = sanitizeInput($_POST['oldPassword']);
    $newPassword = sanitizeInput($_POST['newPassword']);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user exists in the database
    $sql = "SELECT password FROM logins WHERE userID = '$userID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        if ($oldPassword === $storedPassword) {
            // Old password is correct, proceed with updating the password
            $sql = "UPDATE logins SET password = '$newPassword' WHERE userID = '$userID'";

            if ($conn->query($sql) === true) {
                // Password updated successfully
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update password.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Old password is incorrect.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    $conn->close();
}
?>
