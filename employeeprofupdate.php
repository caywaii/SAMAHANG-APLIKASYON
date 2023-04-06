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
    include 'employeenav.php';
    ?>
    <section class="transac">
        <div id="userprofile" class="text">Profile</div>
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
                                <p class="text-secondary mb-1">SPCB Employee</p>
                                <p class="text-muted font-size-sm"><?php echo $_SESSION["uID"];?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
            						<h6 class="mb-0">Bio</h6>
            				    </div>
            				     <?php
 
	                         $id = $_SESSION["uID"];
	                         $sql = "SELECT * FROM tblusers WHERE uID = '$id'";
	                         $query = mysqli_query($conn, $sql);
	                         $row = mysqli_fetch_array($query);
	                         ?>
            					<div class="col-sm-8 text-secondary">
            					    <form action="employeeprofupdatebio.php?uID=<?php echo $row['uID']; ?>" method="post">
            						    <p><input class="form-control" name="bio" value="<?php echo $row['uBio']; ?>"></p>
                                        <button type="submit" style="border: none;"><a class="btn-success btn">Save</a></button>
                                        <a class="button_red btn" href="deletebioemp.php?uID=<?php echo $row['uID']; ?>" type="reset">Reset</a>
                                        <a class="btn-warning btn" href="employeeprof.php?uID=<?php echo $row['uID']; ?>">Cancel</a> 
                                        </form>
            					</div>
            				</div>
                        </div>
                    </div>
                    <div class="card mt-3" style="background-color: #d5dff7; border-radius: 1vh;">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
            						<h6 class="mb-0">Password</h6>
            				    </div>
            					<div class="col-sm-8 text-secondary">
            						<p></p>
            					</div>
            				</div>
                        </div>
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
	</div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>