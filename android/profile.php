<?php 
require 'connection.php';
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = array();
    if($conn){
        $sql = "SELECT * FROM tblusers WHERE uUsername='".$username."' AND uPassword='".$password."'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)!=0){
            $row = mysqli_fetch_assoc($res);
            $result = array(
                "status"=>"success", "message"=>"Data Fetched Successfully", "name"=>$row['uFName'], "id"=>$row['uID'], "bio"=>$row['uBio']
                );
        }else $result = array("status" => "failed", "message" => "Unauthorised Access");
    }else $result = array("status" => "failed", "message" => "Database Connection Failed");
}else $result = array("status" => "failed", "message" => "All Fields are Required");

echo json_encode($result, JSON_PRETTY_PRINT);
?>