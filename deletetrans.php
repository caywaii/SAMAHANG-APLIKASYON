<?php
include ('connection.php');
    $user = $_SESSION["uID"];
    $reason=$_POST['arcReason'];
    $id=$_GET['tdNum'];
    $sql = "UPDATE tblarchive SET aArchive = '1', uDeletedBy ='$user', arcReason= '$reason' WHERE tdNum  = '$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
     echo "Error updating record: " . $conn->error;
    }
    
	header('location:recordforemp.php');
?>