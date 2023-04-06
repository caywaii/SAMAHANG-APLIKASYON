<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Account Details</title>
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
    include 'employeenav.php';
    include "connection.php";
    
                            $sql = "SELECT * FROM tblaccdetails ORDER BY uID DESC LIMIT 1";
	                        $query = mysqli_query($conn, $sql);
	                        $row = mysqli_fetch_array($query);
    ?>

    <section class="emplo-reg">
    <div id="emp_reg" class="text">Account Details</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center">Members Account Details</div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <button type="button" class="btn button_blue my-4" data-bs-toggle="modal" data-bs-target="#new" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square icon"> </i>New</button>
                        </br>
                        <!--New Button-->
                        <form action="" method="POST">
                            <div class="modal fade" id="new" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Insert Account Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                             <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="adNum" value="<?php echo $row['adNum']; ?>" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Account ID</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="uID" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member ID</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="sharecap" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Share Capital</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="savedep" class="form-control" id="savedep" placeholder="#" required>
                                                    <label for="savedep">Saving Deposit</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="loans" class="form-control" id="loans" placeholder="#" required>
                                                    <label for="loans">Loans</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="timedeposit" class="form-control" id="timedeposit" placeholder="#" required>
                                                    <label for="timedeposit">Time Deposit</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="dividend" class="form-control" id="dividend" placeholder="#" required>
                                                    <label for="dividend">Dividend</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="patref" class="form-control" placeholder="#" required>
                                                    <label for="dividend">Patronage Refund</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Register</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="row">
                        <div class="container col-8">
                            	<div class="row card " style="background-color: #d5dff7; border-radius: 1vh;">
                            	    <hr class="opacity-0">
                                	<table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>MBR ID</th>
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
                                                <td ><?php echo $row['uID'];?></td>
                                                <td align="center"> 
                                                    <div class="col-md-12">
                                                        <a class="button_green btn my-1" href="viewmemaccdetails.php?uID=<?php echo $row['uID']; ?>" >View</a>
                                                        <a class="button_blue_two btn my-1" href="updateaccdetails.php?uID=<?php echo $row['uID']; ?>" >Update</a>
                                                        <!--<a class="button_red btn" href="deletemem.php?uID=<?php echo $row['uID']; ?>">Delete</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <hr class="opacity-0">
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
                             
                          $adNum = $_POST['adNum'];
                            $uID = $_POST['uID'];
                              $sharecap = $_POST['sharecap'];
                                $savedep = $_POST['savedep'];
                                  $loans = $_POST['loans'];
                                    $timedeposit = $_POST['timedeposit'];
                                     $dividend = $_POST['dividend'];
                                       $patref = $_POST['patref'];
                                      
                                       
                                      
                                       
                                       
                                       
                                       
                
                          
                       
                       $sql2 = "INSERT INTO tblaccdetails (adNum, uID, mSCapital, mSavingDep, mTimeDep, mLoans, mDiv, mPatRef )
                       VALUES ('$adNum','$uID', '$sharecap', '$savedep ', '$timedeposit ', '$loans', '$dividend', '$patref')";    
                       
    
    
                       if($conn->query($sql2) === TRUE){
                           echo "<script type= 'text/javascript'>
                           alert('New Record Created Successfully');
                           </script>";
                        echo "<script>window.open('accdetails.php','_self') </script>"; 
                           
                       } 
                       
                       
                       
                         $conn->close();
                       
                        }
                     
                       ?> 