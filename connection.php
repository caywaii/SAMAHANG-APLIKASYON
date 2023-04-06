<?php
session_start();
$servername = "localhost";
$username = "u235219407_spcbtest";
$password = "1Z+]eebLd";
$dbname = "u235219407_spcbtest";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>