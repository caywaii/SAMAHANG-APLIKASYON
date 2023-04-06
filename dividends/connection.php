<?php
$servername = "localhost";
$username = "u666422188_caressa";
$password = "11011971Lex";
$database = "u666422188_spcbdbtest";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully";
?>