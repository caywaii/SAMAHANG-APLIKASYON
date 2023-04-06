<?php
	include('connection.php');
 
	$id = $_GET['uID'];
	$updatepass= $_POST['updatepass'];
	mysqli_query($conn,"UPDATE tblusers SET uPassword='$updatepass' WHERE uID ='$id'");
    header('location:memberprof.php');
?>