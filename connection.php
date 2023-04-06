<?php
session_start();
$servername = "localhost";
$username = "u666422188_spcbfinal";
$password = "11011971Lex";
$dbname = "u666422188_spcb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>