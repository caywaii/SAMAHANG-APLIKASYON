<?php
	include'connection.php';
 
	$id = $_GET['uID'];
	$sql = "SELECT * FROM tblusers WHERE uID = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div id="mem_reg" class="text" style="color: #554977;">Employee Panel</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Update Employee</div>
        <form method="POST" action="updateforemp.php?uID=<?php echo $id; ?>">
        <!-- update modal -->
                    <div class="modal fade" id="update2" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 1vh;">
                          <div class="modal-header" style="background-color: #3152e4; color: white;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Member</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="background-color: #d5dff7;">
                            Are you sure to Update this?
                          </div>
                          <div class="modal-footer" style="background-color: #d5dff7;">
                            <a href="emploreg.php?<?php echo $row['uID']?>"><button type="submit" class="btn btn-primary">Yes</button></a>
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
        </br>
            <div class="container">
                    <div class="col-md-11">
                       <a href="emploreg.php"> <button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                    </div>
                    
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="uID" class="form-control" value="<?php echo $row['uID']; ?>"  id="uID" placeholder="#" disabled>
                            <label for="uID">User ID</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="regdate" class="form-control" value="<?php echo $row['uRegDate']; ?>"  id="empid" placeholder="#" required>
                            <label for="empid">Registration Date</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="maritalstatus" class="form-control" value="<?php echo $row['uMaritalStatus']; ?>" id="maritalstatus" placeholder="#" required>
                            <label for="maritalstatus">Marital Status</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <select name="alter" class="form-select" id="alter" required>
                                <option selected disabled><?php echo $row['uAlter']; ?></option>
                                <option  name="alter" value="Yes">Yes</option>
                                <option  name="alter" value="No">No</option>
                            </select>
                            <label for="alter">Alter User Type</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="lname" class="form-control" value="<?php echo $row['uLName']; ?>" id="lastname" placeholder="#" required>
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="fname" class="form-control" value="<?php echo $row['uFName']; ?>" id="firstname" placeholder="#" required>
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="mname"class="form-control" value="<?php echo $row['uMName']; ?>" id="middlename" placeholder="#" required>
                            <label for="middlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="birthdate" class="form-control" value="<?php echo $row['uBirthDate']; ?>" id="birthdate" placeholder="#" required>
                            <label for="birthdate">Birthday</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="username"class="form-control" value="<?php echo $row['uUsername']; ?>" id="username" placeholder="#" required>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="password" class="form-control" value="<?php echo $row['uPassword']; ?>" id="password" placeholder="#" required>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="cnum" class="form-control" value="<?php echo $row['uContactNum']; ?>" id="contactnum" placeholder="#" min="11" maxlength="11" required>
                            <label for="contactnum">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="occupation" class="form-control" value="<?php echo $row['mOccupation']; ?>" id="occupation" placeholder="#" required>
                            <label for="occupation">Occupation</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="street"  class="form-control" value="<?php echo $row['uStreet']; ?>" id="street" placeholder="#" required>
                            <label for="street">Street</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="baranggay" class="form-control" value="<?php echo $row['uBarangay']; ?>" id="baranggay" placeholder="#" required>
                            <label for="baranggay">Barrangay</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="city" class="form-control" value="<?php echo $row['uCity']; ?>" id="city" placeholder="#" required>
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="province" class="form-control" value="<?php echo $row['uProvince']; ?>" id="province" placeholder="#" required>
                            <label for="province">Province</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="zipcode" class="form-control" value="<?php echo $row['uZipCode']; ?>" id="zipc" placeholder="#" onKeyPress="if(this.value.length==4) return false;" required>
                            <label for="zipc">Zip Code</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="validnum" class="form-control" id="validnum" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" value="<?php echo $row['uVNum']; ?>" required>
                            <label for="validnum">Valid ID Number</label>
                        </div>
                    </div>
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <select name="validtype" class="form-select" id="validtype" required>
                                <option selected disabled><?php echo $row['uVType']; ?></option>
                                <option  name="validtype" value="National ID">National ID</option>
                                <option  name="validtype" value="UMID">UMID</option>
                                <option  name="validtype" value="TIN ID">TIN ID</option>
                                <option  name="validtype" value="Philhealth Card">Philhealth Card</option>
                                <option  name="validtype" value="Driver’s License">Driver’s License</option>
                                <option  name="validtype" value="Passport">Passport</option>
                                <option  name="validtype" value="Student’s ID">Student’s ID</option>
                                <option  name="validtype" value="Voter’s ID">Voter’s ID</option>
                                <option  name="validtype" value="SSS ID">SSS ID</option>
                                <option  name="validtype" value="Alien/Immigrant COR">Alien/Immigrant COR</option>
                                <option  name="validtype" value="Government Office/GOCC ID">Government Office/GOCC ID</option>
                                <option  name="validtype" value="HDMF ID (Pagibig)">HDMF ID (Pagibig)</option>
                                <option  name="validtype" value="Postal ID">Postal ID</option>
                                <option  name="validtype" value="PRC ID">PRC ID</option>
                                </select>
                                <label for="validtype">Valid ID Types</label>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-5" style="float: right;">
                        <div class="">
                            <button type="button" class="btn button_blue my-4 col-md-4" data-bs-toggle="modal" data-bs-target="#update2" data-bs-whatever="@getbootstrap">Update</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>