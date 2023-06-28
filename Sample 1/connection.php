<?php
// MySQL database credentials
$host = 'localhost';      // Replace with your host name
$user = 'root';  // Replace with your MySQL username
$password = '1sepjkbday';  // Replace with your MySQL password
$database = 'vitb';  // Replace with your MySQL database name

// Create a new MySQLi instance
$connection = new mysqli($host, $user, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
