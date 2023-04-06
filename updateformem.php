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
	
	 $street = $_POST['street'];
     $baranggay = $_POST['baranggay'];
     $city = $_POST['city'];
     $province = $_POST['province'];
     $zipcode= $_POST['zipcode'];
     $birthdate = $_POST['birthdate'];
     $maritalstatus = $_POST['maritalstatus'];
     $occupation = $_POST['occupation'];
     $regdate = $_POST['regdate'];
 
	mysqli_query($conn,"UPDATE tblusers SET uUsername='$username', uPassword='$password', uFName = '$fname', uMName='$mname', uLName='$lname', uContactNum='$cnum' WHERE uID ='$id'");
	mysqli_query($conn,"UPDATE tblusers SET uStreet='$street', uBarangay='$baranggay', uCity='$city', uProvince='$province', uZipCode='$zipcode', uBirthDate='$birthdate', uMaritalStatus='$maritalstatus', mOccupation='$occupation', uRegDate='$regdate' WHERE uID ='$id'");
	header('location:memregforemplo.php');
?>