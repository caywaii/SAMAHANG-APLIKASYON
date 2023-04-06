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
    <title>View Member</title>
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
        <div id="mem_reg" class="text" style="color: #554977;">View Member</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Deleted Member Information</div>
            <div class="container">
                </br></br>
                    <div class="col-md-11">
                        <a href="deletedusermember.php"><button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                    </div>
               <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="uID" class="form-control" value="<?php echo $row['uID']; ?>"  id="uID"  readonly>
                            <label for="uID">User ID</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="regdate" class="form-control" value="<?php echo $row['uRegDate']; ?>" id="empid" readonly>
                            <label for="empid">Registration Date</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="umaritalstatus" class="form-control" value="<?php echo $row['uMaritalStatus']; ?>" id="maritalstatus"  readonly>
                            <label for="maritalstatus">Marital Status</label>
                        </div>
                    </div>
                    <input type="text" name="alter" class="form-control" value="<?php echo $row['uAlter']; ?>" id="alter"  hidden>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="lname" class="form-control" value="<?php echo $row['uLName']; ?>" id="lastname"  readonly>
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="fname" class="form-control" value="<?php echo $row['uFName']; ?>" id="firstname" readonly>
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="mname"class="form-control" value="<?php echo $row['uMName']; ?>" id="middlename"  readonly>
                            <label for="middlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="ubirthdate" class="form-control" value="<?php echo $row['uBirthDate']; ?>" id="birthdate"  readonly>
                            <label for="birthdate">Birthday</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="username"class="form-control" id="username" value="<?php echo $row['uUsername']; ?>" readonly>
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="password" value="<?php echo $row['uPassword']; ?>" readonly>
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="cnum" class="form-control" id="contactnum" value="<?php echo $row['uContactNum']; ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" readonly>
                            <label for="contactnum">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="uoccupation" class="form-control" id="occupation" value="<?php echo $row['mOccupation']; ?>" readonly>
                            <label for="occupation">Occupation</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="ustreet" class="form-control" id="street" value="<?php echo $row['uStreet']; ?>" readonly>
                            <label for="street">Street</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="ubaranggay" class="form-control" id="baranggay" value="<?php echo $row['uBarangay']; ?>" readonly>
                            <label for="baranggay">Barrangay</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="ucity" class="form-control" id="city" value="<?php echo $row['uCity']; ?>" readonly>
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="uprovince" class="form-control" id="province" value="<?php echo $row['uProvince']; ?>"readonly>
                            <label for="province">Province</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="ucity" class="form-control" id="zipc" value="<?php echo $row['uZipCode']; ?>"pattern="/^-?" onKeyPress="if(this.value.length==4) return false;" readonly>
                            <label for="zipc">Zip Code</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="validnum" class="form-control" id="validnum" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" value="<?php echo $row['uVNum']; ?>" readonly>
                            <label for="validnum">Valid ID Number</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="validtype" class="form-control" id="validtype" value="<?php echo $row['uVType']; ?>"readonly>
                            <label for="validtype">Valid ID Types</label>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>