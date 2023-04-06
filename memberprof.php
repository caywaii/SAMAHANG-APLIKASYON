<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'membernav.php';
    ?>
    <section class="transac">
        <div id="profile" class="text">Profile</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div class="container">
            </br>
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                <div class="card" style="background-color: #d5dff7; border-radius: 1vh;">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <hr class="opacity-0">
                        <img src="<?php echo $_SESSION["uCamCap"];?>" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                        <h4><?php echo  $_SESSION["uFName"] . " ".  $_SESSION["uLName"];?></h4>
                        <p class="text-secondary mb-1">SPCB Member</p>
                        <p class="text-muted font-size-sm"><?php echo $_SESSION["uID"];?></p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card mt-3" style="background-color: #d5dff7; border-radius: 1vh;">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
        						<h6 class="mb-0">Bio</h6>
        				    </div>
        				    <?php
	                         $id = $_SESSION["uID"];
	                         $sql = "SELECT * FROM tblusers WHERE uID = '$id'";
	                         $query = mysqli_query($conn, $sql);
	                         $row = mysqli_fetch_array($query);
	                         ?>
        					<div class="col-sm-9 text-secondary">
        						<p><?php echo $row['uBio']; ?></p>
        					</div>
        					<div class="col-md-12" align="center">
                                <a class="button_blue_two btn my-1" href="memberprofupdate.php?uID=<?php echo $row['uID']; ?>">Update</a>
                            </div>
        				</div>
                    </div>
                </div>
                <div class="col-md-11">
                        <!-- Modal 1 -->
                        <form action="" method="POST">
                            <div class="modal fade" id="sharecapital" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Share Capital</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable" class="table table-active table-bordered table-responsive">
                                            <?php 
                                            $position = $_SESSION["uID"];
                                            $sqlmember = "SELECT tdCredit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='1'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                            <thead>
                                                <th>Balance</th>
                                                <th>Date and Time</th>
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
                                            <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Modal 2 -->
                        <form action="" method="POST">
                            <div class="modal fade" id="savingdeposit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Saving Deposit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable2" class="table table-active table-bordered table-responsive">
                                             <?php 
                                            $position = $_SESSION["uID"];
                                            $sqlmember = "SELECT tdCredit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='2'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                            <thead>
                                                <th>Balance</th>
                                                <th>Date and Time</th>
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
                                            <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Modal 3 -->
                        <form action="" method="POST">
                            <div class="modal fade" id="loans" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Loans</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable3" class="table table-active table-bordered table-responsive">
                                              <?php 
                                            $position = $_SESSION["uID"];
                                            $sqlmember = "SELECT tdDebit, transDate FROM tbltransdetails WHERE uID = '$position' AND  accID='5'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                                            <thead>
                                                <th>Balance</th>
                                                <th>Date and Time</th>
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
                                            <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                <div class="card mt-3" style="border-radius: 1vh;">
                     <?php 
                                            $position = $_SESSION["uID"];
                                            $sqlmember = "SELECT * FROM tblaccdetails WHERE uID = '$position'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
                    <ul class="list-group list-group-flush" >
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <h6 class="mb-0">Account Details</h6><hr class="opacity-0">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-4">
    							   <h6 class="mb-0">Share Capital</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mSCapital"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#sharecapital" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button></p>
    						</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-4">
    							   <h6 class="mb-0">Saving Deposit</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mSavingDep"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#savingdeposit" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button></p>
    						</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-4">
    							   <h6 class="mb-0">Loans</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mLoans"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#loans" data-bs-whatever="@getbootstrap"><i class="bi bi-chevron-double-right"></i></button></p>
    						</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-4">
    							   <h6 class="mb-0">Time Deposit</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mTimeDep"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#loans" data-bs-whatever="@getbootstrap" hidden><i class="bi bi-chevron-double-right" hidden></i></button></p>
    						</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-4">
    							   <h6 class="mb-0">Dividends</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mDiv"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#loans" data-bs-whatever="@getbootstrap" hidden><i class="bi bi-chevron-double-right" hidden></i></button></p>
    						</div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="background-color: #d5dff7;">
                            <div class="col-5">
    							   <h6 class="mb-0">Patronage Refund</h6>
    						</div>
    						<div class="col-6 text-secondary">
    							<p><?php echo $row2["mPatRef"];?><button class="btn button_to_green" data-bs-toggle="modal" data-bs-target="#loans" data-bs-whatever="@getbootstrap" hidden><i class="bi bi-chevron-double-right" hidden></i></button></p>
    						</div>
    						<?php 
                                            }
                                       }
                                            ?>
                        </li>
                    </ul>
                </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="card-body">
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Username</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uUsername"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Password</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    								     <?php 
                                            $position = $_SESSION["uID"];
                                            $sqlmember = "SELECT * FROM tblusers WHERE uID = '$position'";

                                            $resultmember = mysqli_query($conn, $sqlmember);

                                            if($resultmember->num_rows > 0){
                                            while($row2 = $resultmember->fetch_assoc()) {
                        
                                         
                                            ?>
    									<p>
    									    <input type="password" name="password" id="password" value="<?php echo $row2["uPassword"];?>" style="border:none; background:none;" disabled/>
                                            <button class="btn btn-success" id="togglePassword"> show</button><a class="button_blue_two btn mx-1" href="memprofupdatepass.php?uID=<?php echo $row['uID']; ?>">Update</a>
                                        </p>
                                        	<?php 
                                            }
                                       }
                                            ?>
    								</div>
    							</div>
                                <hr>
    							<div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">First Name</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uFName"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Last Name</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uLName"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Street</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uStreet"];?></p>
    								</div>
    							</div>
                                <hr>
    							<div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Barangay</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uBarangay"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Province</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uProvince"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Zip Code</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uZipCode"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Birthdate</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uBirthDate"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Martial Status</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["uMaritalStatus"];?></p>
    								</div>
    							</div>
                                <hr>
                                <div class="row mb-3">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Occupation</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<p><?php echo $_SESSION["mOccupation"] ;?></p>
    								</div>
    							</div>
                            </div>
                        </div>
                    </div>
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
    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
  
        const password = document.querySelector('#password');
  
        togglePassword.addEventListener('click', () => {
  
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
                  
            password.setAttribute('type', type);
  
            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
    </script>
</body>
</html>