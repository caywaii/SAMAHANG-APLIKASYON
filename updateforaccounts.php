<?php
	include('connection.php');
 
	$id = $_GET['uID'];
	$sharecap = $_POST['sharecap'];
	$savedep = $_POST['savedep'];
	$loans = $_POST['loans'];
	$timedeposit = $_POST['timedeposit'];
	$dividend = $_POST['dividend'];
	$patref = $_POST['patref'];
 
	mysqli_query($conn,"UPDATE tblaccdetails SET mSCapital='$sharecap', mSavingDep='$savedep', mTimeDep='$timedeposit', mLoans='$loans', mDiv='$dividend', mPatRef='$patref' WHERE uID ='$id'");
	header('location:accdetails.php');
?>