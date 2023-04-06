<?php
	include('connection.php');
 
	$id = $_GET['uID'];
	$bio = $_POST['bio'];
	mysqli_query($conn,"UPDATE tblusers SET uBio='$bio' WHERE uID ='$id'");
    header('location:memberprof.php');
?>