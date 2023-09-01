<?php
$servername = "localhost";
$username = "root";
$password = "Password";
$dbname = "webapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['column'])) {
    $column = $conn->real_escape_string($_POST['column']);
    
    $sql = "SELECT data FROM hrdash where dataType='$column'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maleData = $row['data'];
        echo $maleData;
    } else {
        echo "No data found for the specified column";
    }
}

$conn->close();
?>
