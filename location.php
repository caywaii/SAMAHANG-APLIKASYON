<?php 
include "connection.php";
$username = $_POST['username'];
$password = $_POST['password'];
$arch = "0";

$sql = "SELECT * FROM tblusers INNER JOIN tblarchive ON tblarchive.uID = tblusers.uID WHERE uUsername= '$username' AND uPassword = '$password' AND aArchive = '0'";


$result = mysqli_query($conn, $sql); 


if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    
    if(is_array($row)){
        $_SESSION['uID'] = $row['uID'];
        $_SESSION['uAlter'] = $row['uAlter'];
        $_SESSION['aPosition'] = $row['aPosition'];
        $_SESSION['uCamCap'] = $row['uCamCap'];
        $_SESSION['aArchive'] = $row['aArchive'];
        $_SESSION['uUserType'] = $row['uUserType'];
        $_SESSION["uUsername"] = $row['uUsername'];
        $_SESSION["uPassword"] = $row['uPassword'];
        $_SESSION["uFName"] = $row['uFName'];
        $_SESSION["uLName"] = $row['uLName'];
         $_SESSION["uStreet"] = $row['uStreet'];
            $_SESSION["uBarangay"] = $row['uBarangay'];  
             $_SESSION["uCity"] = $row['uCity']; 
              $_SESSION["uProvince"] = $row['uProvince']; 
               $_SESSION["uZipCode"] = $row['uZipCode']; 
                $_SESSION["uBirthDate"] = $row['uBirthDate']; 
                 $_SESSION["uMaritalStatus"] = $row['uMaritalStatus']; 
                  $_SESSION["mOccupation"] = $row['mOccupation'];
    }
    else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }
    
    if($_SESSION['uUsername'] === $username && $_SESSION['uPassword'] === $password &&  $_SESSION['aArchive'] === $arch){
        if($_SESSION['uUserType'] == 3 && $_SESSION['aArchive'] == 0){
          $_SESSION['member'] = "member";
         header("Location:memberdash.php"); 
        }
        if($_SESSION['uUserType'] == 2 && $_SESSION['aArchive'] == 0){
             $_SESSION['employee'] = "employee";
         header("Location:employeedash.php"); 
         
        }
        if($_SESSION['uUserType'] == 1 && $_SESSION['aArchive'] == 0){
            $_SESSION['admin'] = "admin";
          header("Location:admindash.php"); 
        }
        if($_SESSION['aArchive'] == 1){
            header("Location:logininvalid.php");
        }
           
     }
    
}
else{
    header("Location:logininvalid.php");
}




// For Positon !!! 
/*$position = $_SESSION["uID"];
$sqladmin = "SELECT * FROM tbladmin WHERE aID = '$position'";

$resultadmin = mysqli_query($conn, $sqladmin);

if($resultadmin->num_rows > 0){
    while($row2 = $resultadmin->fetch_assoc()) {
         if(is_array($row2)){
           $_SESSION["aPosition"] = $row2['aPosition'];  
         }
    }
}*/
// ----------------------------------------------------------

// For Member Info 


/*$position = $_SESSION["uID"];
$sqlmember = "SELECT * FROM tblmembers WHERE mID = '$position'";

$resultmember = mysqli_query($conn, $sqlmember);

if($resultmember->num_rows > 0){
    while($row2 = $resultmember->fetch_assoc()) {
         if(is_array($row2)){
           $_SESSION["mStreet"] = $row2['mStreet'];
            $_SESSION["mBarangay"] = $row2['mBarangay'];  
             $_SESSION["mCity"] = $row2['mCity']; 
              $_SESSION["mProvince"] = $row2['mProvince']; 
               $_SESSION["mZipCode"] = $row2['mZipCode']; 
                $_SESSION["mBirthDate"] = $row2['mBirthDate']; 
                 $_SESSION["mMaritalStatus"] = $row2['mMaritalStatus']; 
                  $_SESSION["mOccupation"] = $row2['mOccupation']; 
                   
         }
    }
} */
//-----------------------------------------------------------------------------

// For Member Info 


/*$position = $_SESSION["uID"];
$sqlmember = "SELECT * FROM tblaccdetails WHERE mID = '$position'";

$resultmember = mysqli_query($conn, $sqlmember);

if($resultmember->num_rows > 0){
    while($row2 = $resultmember->fetch_assoc()) {
         if(is_array($row2)){
           $_SESSION["capital"] = $row2['mSCapital'];
            $_SESSION["savingdep"] = $row2['mSavingDep'];  
             $_SESSION["timedep"] = $row2['mTimeDep']; 
              $_SESSION["loans"] = $row2['mLoans']; 
              $_SESSION["div"] = $row2['mDiv']; 
               $_SESSION["patref"] = $row2['mPatRef']; 
              
               
                   
         }
    }
}*/






















/*$sqlmem = "SELECT * FROM tblmembers WHERE mUsername= '$username' AND mPassword = '$password' AND mID = '$id'";
$sqlemp = "SELECT * FROM tblemployee WHERE eUsername= '$username' AND ePassword = '$password' AND empID = '$id'";
$sqladm = "SELECT * FROM tbladmin WHERE aUsername= '$username' AND aPassword= '$password' AND aID = '$id'";


$resultmem = mysqli_query($conn, $sqlmem); 
$resultemp = mysqli_query($conn, $sqlemp);
$resultadm = mysqli_query($conn, $sqladm);

//Member
    if(mysqli_num_rows($resultmem) === 1){
    $rowmem = mysqli_fetch_assoc($resultmem);

    if(is_array($rowmem)){
        $_SESSION["mID"] = $rowmem['mID'];
        $_SESSION["mUsername"] = $rowmem['mUsername'];
        $_SESSION["mPassword"] = $rowmem['mPassword'];
        $_SESSION["mFName"] = $rowmem['mFName'];
        $_SESSION["mLName"] = $rowmem['mLName'];
    }else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }
     if($_SESSION['mUsername'] === $username && $_SESSION['mPassword'] === $password && $_SESSION['mID'] === $id){
     header("Location:memberdash.php");        
     }

 }
 
//Employee
    else if(mysqli_num_rows($resultemp) === 1){
    $rowemp = mysqli_fetch_assoc($resultemp);
    if(is_array($rowemp)){
        $_SESSION["empID"] = $rowemp['empID'];
        $_SESSION["eUsername"] = $rowemp['eUsername'];
        $_SESSION["ePassword"] = $rowemp['ePassword'];
        $_SESSION["eFName"] = $rowemp['eFName'];
        $_SESSION["eLName"] = $rowemp['eLName'];
    }else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }   
    
    if($rowemp['eUsername'] === $username && $rowemp['ePassword'] === $password && $rowemp ['empID'] === $id){
          header("Location:employeedash.php"); 
    }
 }


//Admin
else if(mysqli_num_rows($resultadm) === 1){
    $rowadm = mysqli_fetch_assoc($resultadm);
    if(is_array($rowadm)){
        $_SESSION["aID"] = $rowadm['aID'];
        $_SESSION["aUsername"] = $rowadm['aUsername'];
        $_SESSION["aPassword"] = $rowadm['aPassword'];
        $_SESSION["aFName"] = $rowadm['aFName'];
        $_SESSION["aLName"] = $rowadm['aLName'];
    }else{
        echo'<script type ="text/javascript">';
        echo'alert ("Invalid Input");';
        echo'window.location href ="index.php"';
        echo"</script>";
    }   
    if($rowadm['aUsername'] === $username && $rowadm['aPassword'] === $password && $rowadm ['aID'] === $id){
         header("Location:admindash.php"); 
    }   
}
else{
    header("Location:logininvalid.php");
}
*/
?>