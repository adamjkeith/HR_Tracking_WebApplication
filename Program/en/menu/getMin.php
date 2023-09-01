<?php
// Assuming you are using mysqli for database connection
// Check if the userIDValue is received via POST
if (isset($_POST['userIDValue'])) {
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
    $query = "SELECT admin FROM logins WHERE userID = '$userIDValue'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Assuming the userID is unique and will return only one row
        $row = mysqli_fetch_assoc($result);
        $admin = $row['admin'];

        // Return the acceptedTerms value as plain text
        echo $admin;
    } else {
        // Handle database query error, if any
        echo "Error retrieving data from the database: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Handle if userIDValue is not received properly
    echo "Invalid request. Please provide a valid userIDValue.";
}
?>
