<?php
$servername = "localhost"; // Usually localhost
$username = "root"; // Default XAMPP MySQL username
$password = ""; // Default XAMPP MySQL password is usually empty
$dbname = "gig"; // Your database name (make sure it exists)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
