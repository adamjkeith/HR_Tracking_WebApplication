<?php
// Assuming you are using mysqli for database connection
// Check if the userIDValue is received via POST
if (isset($_POST['cookieID'])) {
    // Create a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "Password";
    $dbname = "webapp";
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Retrieve the userIDValue directly without sanitization
    $userIDValue = $_POST['userIDValue'];

    // Query the database to get the acceptedTerms value
    $query = "SELECT userID FROM logins WHERE userID = '$userIDValue'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "1";
    } else {
        // Handle database query error, if any
        echo "2";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Handle if userIDValue is not received properly
    echo "Invalid request. Please provide a valid userIDValue.";
}
?>
