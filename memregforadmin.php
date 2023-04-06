<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    <?php
    include 'adminnav.php';
    include "connection.php";
    ?>

    <section class="emplo-reg">
    <div id="emp_reg" class="text">Member Panel</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center">Registered  Members</div>
        </br></br>
            <div class="container-fluid">
                <form action="" method="post">
                    <div class="row">
                        <div class="container">
                            <div class="container col-md-8" >
                            	<div class="row card" style="background-color: #d5dff7; border-radius: 1vh;">
                            	    <hr class="opacity-0">
                                	<table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>MBR ID</th>
                                                <th>Registered Date</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * from tblusers WHERE uAlter = 'Yes'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                            <tr>
                                                <td data-label="MBR ID"><?php echo $row['uID'];?></td>
                                                <td data-label="Registered Date"><?php echo $row['uRegDate']; ?></td>
                                                <td align="center">  
                                                    <a class="btn-primary btn my-1" href="viewmemforadm.php?uID=<?php echo $row['uID']; ?>">Information</a>
                                                    <a class="button_green btn my-1" href="viewmwmaccdetforadm.php?uID=<?php echo $row['uID']; ?>" >Account Details</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <hr class="opacity-0">
                            	</div>
                            </div>
                        </div>
                    </div> 
                </form>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
    $('#example').DataTable({
        scrollX: true,
        scrollY: true,
        searching: true,
        ordering: true,
        paging: true,
        info: false,
        lengthMenu: [
            [10, 20, 50, 100, 150],
            [10, 20, 50, 100, 150],
        ],
    });
    </script>
</body>
</html>

<?php 
                        if(isset($_POST['insert'])){
                            
                            $hdate = $_POST['hdate'];
                              $fname = $_POST['fname'];
                                $mname = $_POST['mname'];
                                  $lname = $_POST['lname'];
                                    $cnum = $_POST['cnum'];
                                     $username = $_POST['username'];
                                       $password = $_POST['password'];
                                       $user = $_POST['usertype'];
                                       $uID = $_POST['uID'];
                                       
                
                        $sql = "INSERT INTO tblemployee (empID, empHDate)
                       VALUES ('$uID', '$hdate')";    
                       
                       $sql2 = "INSERT INTO tblusers (uID, uUserType, uUsername, uPassword, uFName, uMName, uLName, uContactNum )
                       VALUES ('$uID','$user', '$username', '$password', '$fname', '$mname', '$lname', '$cnum')";    
                       
    
    
                       if($conn->query($sql2) === TRUE){
                           echo "<script type= 'text/javascript'>
                           alert('New Record Created Successfully');
                           </script>";
                        echo "<script>window.open('emploreg.php','_self') </script>"; 
                           
                       } 
                       
                       
                       if($conn->query($sql) === TRUE){
                           
                       } 
                       else { }
                       
                       
                         $conn->close();
                       
                        }
                     
                       ?> 