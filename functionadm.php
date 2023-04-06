
<?php
   include "connection.php";

if(isset($_FILES["webcam"]["tmp_name"])){
    $id = $_GET['uID'];

    
    $tmpName = $_FILES["webcam"]["tmp_name"]; //temporaryName
    $imageName = date("Y.m.d").date("h.i.sa").'.jpeg'; //ImageName once Downloaded
    $filePath = "img/".$imageName; //DATABASE NAME
    move_uploaded_file($tmpName,'img/'.$imageName);//File Path when Saved. Pictures' Destination

    $date = date("Y/m/d")."&".date("h:i:sa");
    $query = "UPDATE tblusers SET uCamCap = '$filePath' WHERE uID = '$id'"; //INSERTION
    mysqli_query($conn, $query);
}
// Check connection

?>

