<?php
// Database connection parameters
$host = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if any)
$database = "shop_db"; // Your database name

// Create a new mysqli connection
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    // Output a detailed error message
    die("Connection failed: " . htmlspecialchars($conn->connect_error));
}

// Optional: Uncomment the following line to check if the connection is successful
// echo "Connected successfully";

// Close the connection when done (optional, as it will close automatically at the end of the script)
// $conn->close();
?>