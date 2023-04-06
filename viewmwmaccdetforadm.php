<?php
include'connection.php';
 
	$id = $_GET['uID'];
    $sql = "SELECT * FROM tblaccdetails WHERE uID = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
?>
<?php
 
	$id = $_GET['uID'];
    $sql = "SELECT * from tblusers WHERE uID = '$id'";
	$query = mysqli_query($conn, $sql);
	$rowu = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Account Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="update.css">
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
<body style="background: #E4E9F7;">
    <section class="member-reg">
    </br>
        <!--Share Capital-->
        <form action="" method="post">
            <div class="modal fade" id="sharecap" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Share Capital</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="datatable" class="table table-active table-bordered table-responsive">
                                <thead>
                                    <?php 
                                            $position = 	$id;
                                            $sqlmember = "SELECT tdCredit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='1'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                    <tr>
                                        <th>Balance</th>
                                        <th>Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         <td><?php echo $row2["tdCredit"];?></td>
                                         <td><?php echo $row2["transDate"];?></td>
                                    </tr>
                                </tbody>
                                <?php 
                                            }
                                       }
                                            ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!--Saving Deposit-->
        <form action="" method="post">
            <div class="modal fade" id="savedep" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Saving Deposit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="datatable2" class="table table-active table-bordered table-responsive">
                                <thead>
                                     <?php 
                                            $position = $id;
                                            $sqlmember = "SELECT tdCredit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='2'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                    <tr>
                                        <th>Balance</th>
                                        <th>Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row2["tdCredit"];?></td>
                                        <td><?php echo $row2["transDate"];?></td>
                                    </tr>
                                </tbody>
                                <?php 
                                            }
                                       }
                                            ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        <!--Loans-->
        <form action="" method="post">
            <div class="modal fade" id="loans" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel3">Loans</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="datatable3" class="table table-active table-bordered table-responsive">
                                <thead>
                                    <?php 
                                            $position = $id;
                                            $sqlmember = "SELECT tdDebit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='5'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                    <tr>
                                        <th>Balance</th>
                                        <th>Date and Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                                    <td><?php echo $row2["tdDebit"];?></td>
                                                    <td><?php echo $row2["transDate"];?></td>
                                    </tr>
                                </tbody>
                                 <?php 
                                            }
                                       }
                                            ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div id="mem_reg" class="text" style="color: #554977;">Member Panel</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Account Details</div>
            <div class="container">
            </br></br>
                    <div class="col-md-11">
                        <a href="memregforadmin.php"><button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                    </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="fullname" class="form-control" value="<?php echo $rowu['uFName']," ", $rowu['uMName']," ", $rowu['uLName'];?>"  id="fullname" value="0" readonly>
                            <label for="fullname">Full Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="contactnum" class="form-control" value="<?php echo $rowu['uContactNum'];?>" id="contactnum" value="0" readonly>
                            <label for="contactnum">Contact No.</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="sharecap" class="form-control" value="<?php echo $row['mSCapital']; ?>"  id="sharecap" value="0" readonly>
                            <label for="sharecap">Share Capital</label>
                        </div>
                    </div>
                    <div class="col-1 py-4">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sharecap" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="savedep" class="form-control" value="<?php echo $row['mSavingDep']; ?>" id="savedep" value="0" readonly>
                            <label for="savedep">Saving Deposit</label>
                        </div>
                    </div>
                    <div class="col-1 py-4">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#savedep" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="loans" class="form-control" value="<?php echo $row['mLoans']; ?>" id="loans" value="0" readonly>
                            <label for="loans">Loans</label>
                        </div>
                    </div>
                    <div class="col-1 py-4">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loans" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="timedeposit" class="form-control" value="<?php echo $row['mTimeDep']; ?>"  id="timedeposit" value="0" readonly>
                            <label for="timedeposit">Time Deposit</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="dividends" class="form-control" value="<?php echo $row['mDiv']; ?>" id="dividends" value="0" readonly>
                            <label for="dividends">Dividends</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="patref" class="form-control" value="<?php echo $row['mPatRef']; ?>"   id="patref" value="0" readonly>
                            <label for="patref">Patronage Refund</label>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#datatable').DataTable({
    });
        $('#datatable2').DataTable({
    });
        $('#datatable3').DataTable({
    });
    </script>
</body>
</html>