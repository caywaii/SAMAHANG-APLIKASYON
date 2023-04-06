<?php
include ('connection.php');
   $user = $_SESSION["uID"];
   $id=$_GET['uID'];
   $sql = "UPDATE tblarchive SET aArchive = '0', uDeletedBy ='$user', uRetriveBy ='$user', arcReason='none' WHERE uID  = '$id'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
     echo "Error updating record: " . $conn->error;
    }
    
	header('location:deleteduseremployee.php');
?>
