<?php
ini_set('display_errors',1);
error_reporting(-1);

$servername = "localhost";
$username = "PHPUser";
$password = "@asurion1!";
$database = "wirkdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
