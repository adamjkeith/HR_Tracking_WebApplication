<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Establish the database connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitizeInput($input)
{
  return trim(htmlspecialchars($input));
}

// Check if the request contains the necessary query parameters
if (isset($_GET['firstname']) && isset($_GET['surname'])) {
  $firstName = sanitizeInput($_GET['firstname']);
  $surname = sanitizeInput($_GET['surname']);

  // Query to find all required data based on dataFName and dataSName
  $query = "SELECT dataFO, dataFB, flightnumUp, flightnumDown, upTimeUp, downTimeUp, upTimeDown, downTimeDown, flightnumDown, dataSDate FROM flights WHERE dataFName = '$firstName' AND dataSName = '$surname'";

  // Execute the query
  $result = mysqli_query($connection, $query);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      // Retrieve the data from the result set
      $row = mysqli_fetch_assoc($result);

      // Set cookies for each data field
      setcookie('dataFO', $row['dataFO'], time() + (86400 * 30), "/"); // 30 days
      setcookie('dataFB', $row['dataFB'], time() + (86400 * 30), "/"); // 30 days
      setcookie('flightnumUp', $row['flightnumUp'], time() + (86400 * 30), "/"); // 30 days
      setcookie('flightnumDown', $row['flightnumDown'], time() + (86400 * 30), "/"); // 30 days
      setcookie('upTimeUp', $row['upTimeUp'], time() + (86400 * 30), "/"); // 30 days
      setcookie('downTimeUp', $row['downTimeUp'], time() + (86400 * 30), "/"); // 30 days
      setcookie('upTimeDown', $row['upTimeDown'], time() + (86400 * 30), "/"); // 30 days
      setcookie('downTimeDown', $row['downTimeDown'], time() + (86400 * 30), "/"); // 30 days
      setcookie('flightnumDown', $row['flightnumDown'], time() + (86400 * 30), "/"); // 30 days
      setcookie('sStart', $row['dataSDate'], time() + (86400 * 30), "/"); // 30 days

      // Return success message
      echo json_encode(array('success' => 'Data stored in cookies.'));
    } else {
      // No matching record found
      echo json_encode(array('error' => 'No matching record found'));
    }
  } else {
    // Query execution error
    echo json_encode(array('error' => 'Error: Unable to fetch data from the database.'));
  }

  // Close the database connection
  mysqli_close($connection);
} else {
  // Required query parameters not provided
  echo json_encode(array('error' => 'Missing query parameters.'));
}
?>
