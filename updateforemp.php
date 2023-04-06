<?php
	include('connection.php');
 
	$id = $_GET['uID'];
	$hdate = $_POST['hdate'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$cnum = $_POST['cnum'];
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	mysqli_query($conn,"UPDATE tblusers SET uUsername='$username', uPassword='$password', uFName = '$fname', uMName='$mname', uLName='$lname', uContactNum='$cnum' WHERE uID ='$id'");
	mysqli_query($conn,"UPDATE tblemployee SET uRegDate='$hdate' WHERE uID ='$id'");
	header('location:emploreg.php');
?>