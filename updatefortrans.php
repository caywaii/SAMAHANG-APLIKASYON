<?php
	include('connection.php');
 
	$id = $_GET['tdNum'];
	$tdnum= $_POST['tdnum'];
	$mbrid = $_POST['mbrid'];
	$trniden = $_POST['trniden'];
	$trndate = $_POST['trndate'];
	$acccode= $_POST['acccode'];
	$credit = $_POST['credit'];
	$debit = $_POST['debit'];

	mysqli_query($conn,"UPDATE tbltransdetails SET tdNum='$tdnum', uID='$mbrid ', transIden='$trniden', transDate='$trndate', accID='$acccode', tdCredit='$credit', tdDebit='$debit' WHERE tdNum ='$id'");
	header('location:recordforemp.php');
?>