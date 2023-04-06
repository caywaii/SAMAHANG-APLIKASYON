<?php
$servername = "localhost";
$username = "u666422188_five";
$password = "Root12345";
$database = "u666422188_fivefeatures";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully";
?>