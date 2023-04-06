<?php
include ('connection.php');
    $user = $_SESSION["uID"];
    $id=$_GET['tdNum'];
    $sql = "UPDATE tblarchive SET aArchive = '0', uRetriveBy ='$user', arcReason= 'none' WHERE tdNum  = '$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
     echo "Error updating record: " . $conn->error;
    }
    
	header('location:deletedreports.php');
?>