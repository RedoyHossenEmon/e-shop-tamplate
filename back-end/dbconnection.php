<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-shop";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start a session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
