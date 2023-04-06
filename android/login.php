<?php

require "connection.php";

$getUsername = $_POST["username"];
$getPassword = $_POST["password"];

$sql = "SELECT * FROM tblusers WHERE uUsername = '$getUsername' AND uPassword = '$getPassword' AND uUserType = '3' AND uAlter = 'Yes'";
$result = $conn->query($sql);


if($_SERVER['REQUEST_METHOD'] === "POST"){
    
    
    if(!empty($getUsername) && !empty($getPassword)){
        if ($result->num_rows > 0) {

          $row = $result->fetch_assoc();
            echo json_encode($row, JSON_PRETTY_PRINT);
          
        } else {
          echo "Incorrect username and/or password";
        }
    }
    
    else{
        echo "All fields required!";
    }
    
    
    
}else{
    echo "No data submitted";
}



?>