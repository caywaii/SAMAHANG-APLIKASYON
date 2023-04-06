<?php
include ('connection.php');

    $id=$_GET['uID'];
    $sql = "UPDATE tblusers SET uBio = '' WHERE uID  = '$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
     echo "Error updating record: " . $conn->error;
    }
    
	header('location:employeeprof.php');
?>
