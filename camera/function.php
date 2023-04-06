<?php
$servername = "localhost";
$username = "u666422188_cayfeatures";
$password = "Root12345";
$database = "u666422188_camera";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpName = $_FILES["webcam"]["tmp_name"]; //temporaryName
    $imageName = date("Y.m.d") . " SPCB " . date("h.i.sa") . ' .jpeg'; //ImageName once Downloaded
    $filePath = "/cameraregister/img/" . $imageName; //DATABASE NAME
    move_uploaded_file($tmpName, 'img/' . $imageName);//File Path when Saved. Pictures' Destination

    $date = date("Y/m/d") . " & " . date("h:i:sa");
    $query = "INSERT INTO tblimage VALUES('','$imageName', '$filePath','$date')"; //INSERTION
    mysqli_query($conn, $query);
}
// Check connection

?>