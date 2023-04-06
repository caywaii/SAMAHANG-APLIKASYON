<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Employees</title>
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
    
                         
                         
                         	$id = $_SESSION['uID'];
	                        $sql = "SELECT * FROM tblusers WHERE uUserType = '2'";
	                        $query = mysqli_query($conn, $sql);
	                        $row = mysqli_fetch_array($query);
    
    ?>
    

    <section class="emplo-reg">
        <div id="emp_reg" class="text">Employee Panel</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center">Registered Employees</div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <button type="button" class="btn button_blue my-4" data-bs-toggle="modal" data-bs-target="#newemplo" data-bs-whatever="@getbootstrap"><i class="bi bi-pencil-square icon"> </i>New</button>
                        
                        <!-- delete modal -->
                        <form action="delete.php?uID=<?php echo $row['uID']; ?>" method="POST">
                    <div class="modal fade" id="delete" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 1vh;">
                          <div class="modal-header" style="background-color: #f62e42; color: white;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" style="background-color: #d5dff7;">
                            Are you sure to delete this?
                            <div class="col-md py-3">
                                <div class="form-floating">
                                    <textarea class="form-control" name="arcReason" placeholder="Type here..." id="arcReason" style="height: 150px"></textarea>
                                    <label for="arcReason">Reason for Deletion</label>
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer" style="background-color: #d5dff7;">
                              <a><button type="submit" class="btn btn-danger">Yes</button></a>
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                        </form>
                        <!--New Button-->
                        <form action="" method="POST">
                            <div class="modal fade" id="newemplo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Register New Employee</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="uID" class="form-control" id="uID" placeholder="#" value="<?php echo $row['uID']; ?>" required>
                                                <label for="uID">User ID</label>
                                            </div>
                                        </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="date" name="regdate" class="form-control" min="2010-03-08" max="2023-12-31" id="empid" placeholder="#" required>
                                                    <label for="empid">Registered Date</label>
                                                </div>
                                            </div>
                                           <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <select name="marstats" class="form-select" id="marstats" required>
                                                        <option selected disabled>Select one...</option>
                                                        <option  name="marstats" value="Single">Single</option>
                                                        <option  name="marstats" value="Married">Married</option>
                                                        <option  name="marstats" value="Divorced">Divorced</option>
                                                        <option  name="marstats" value="Widowed">Widowed</option>
                                                    </select>
                                                    <label for="marstats">Martial Status</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <select name="alter" class="form-select" id="alter" required>
                                                        <option selected disabled>Select one...</option>
                                                        <option  name="alter" value="Yes">Yes</option>
                                                        <option  name="alter" value="No">No</option>
                                                    </select>
                                                    <label for="alter">Alter User Type</label>
                                                </div>
                                            </div>
                                                    <input type="number" name="usertype" value = "2" class="form-control" id="usertype" placeholder="#" hidden>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="lname" class="form-control" id="lastname" placeholder="#" required>
                                                    <label for="lastname">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="fname" class="form-control" id="firstname" placeholder="#" required>
                                                    <label for="firstname">First Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="mname"class="form-control" id="middlename" placeholder="#" required>
                                                    <label for="middlename">Middle Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="date" name="birthdate" class="form-control" id="start"  placeholder="#" required>
                                                    <label for="birthdate">Birthday</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="username"class="form-control" id="username" placeholder="#" required>
                                                    <label for="username">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="password" name="password" class="form-control" id="password" placeholder="#" required>
                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="cnum" class="form-control" id="contactnum" placeholder="#" min="11" onKeyPress="if(this.value.length==11) return false;" required>
                                                    <label for="contactnum">Contact Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                                    <input type="text" name="occupation" value="N/A" class="form-control" id="occupation" placeholder="#" hidden>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="street"class="form-control" id="street" placeholder="#" required>
                                                    <label for="street">Street</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="baranggay" class="form-control" id="baranggay" placeholder="#" required>
                                                    <label for="baranggay">Baranggay</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="city"class="form-control" id="city" placeholder="#" required>
                                                    <label for="city">City</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="province" class="form-control" id="province" placeholder="#" required>
                                                    <label for="province">Province</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="number" name="zipcode" class="form-control" id="zipc" placeholder="#" min="4" onKeyPress="if(this.value.length==4) return false;" required>
                                                    <label for="zipc">Zip Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="validnum"class="form-control" id="validnum" placeholder="#" required>
                                                    <label for="validnum">Valid ID Number</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <select name="validtype" class="form-select" id="validtype" required>
                                                        <option selected disabled>Select one...</option>
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
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-warning"  data-bs-dismiss="modal">Cancel</button>
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
                        <div class="container">
                            <div class="container col-md-8">
                            	<div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                            	    <hr class="opacity-0">
                                	<table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>EMP ID</th>
                                                <th>Hired Date</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql = "SELECT * from tblusers INNER JOIN tblarchive ON tblarchive.uID = tblusers.uID WHERE uUserType = '2' AND aArchive = '0'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                            <tr>
                                                <td data-label="EMP ID"><?php echo $row['uID'];?></td>
                                                <td data-label="Hired Date"><?php echo $row['uRegDate']; ?></td>
                                                <td align="center">  
                                                    <a type="button" class="btn button_green my-1" href="viewemployee.php?uID=<?php echo $row['uID']; ?>">View</a>
                                                    <a class="button_blue_two btn my-1"  href="updateemp.php?uID=<?php echo $row['uID']; ?>">Update</a>
                                                    <a class="button_red btn" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete" data-bs-whatever="@getbootstrap">Delete</a>
                                                    <a class="btn-info btn" href="admcamera.php?uID=<?php echo $row['uID']; ?>">Camera</a> 
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
                            $uID = $_POST['uID'];
                            $user = $_POST['usertype'];
                            $hdate = $_POST['hdate'];
                              $fname = $_POST['fname'];
                                $mname = $_POST['mname'];
                                  $lname = $_POST['lname'];
                                    $cnum = $_POST['cnum'];
                                     $username = $_POST['username'];
                                       $password = $_POST['password'];
                                        
                                       
                                       
                                       $street = $_POST['street'];
                                       $baranggay = $_POST['baranggay'];
                                       $city = $_POST['city'];
                                       $province = $_POST['province'];
                                       $zipcode= $_POST['zipcode'];
                                       $birthdate = $_POST['birthdate'];
                                       $maritalstatus = $_POST['marstats'];
                                       $regdate = $_POST['regdate'];
                                       
                                       $occupation = $_POST['occupation'];
                                       $alter = $_POST['alter'];
                                       $validnum = $_POST['validnum'];
                                       $validtype = $_POST['validtype'];
                                       
                                       
                                       
                                       $sql_e = "SELECT * FROM tblusers WHERE uID='$uID'";
                                       $res_e = mysqli_query($conn, $sql_e);
                                       
                                       if (mysqli_num_rows($res_e) > 0) {
                                           echo "<script type= 'text/javascript'>
                                           alert('ID ALREADY EXIST');
                                           </script>";
                                       }else{
                                           
                                           
                                              $sql = "INSERT INTO tblusers (uID, uUserType, uAlter,  uUsername, uPassword, uFName, uMName, uLName, uContactNum, uStreet, uBarangay, uCity, uProvince, uZipCode, uBirthDate, uMaritalStatus, mOccupation, uVNum, uVType, uRegDate )
                                       VALUES ('$uID', '$user', '$alter', '$username', '$password', '$fname', '$mname', '$lname', '$cnum', '$street', '$baranggay', '$city', '$province', '$zipcode', '$birthdate', '$maritalstatus', '$occupation', '$validnum', '$validtype', '$regdate')";
                                       
                                      
                                       if($conn->query($sql) === TRUE){
                                        echo "<script>window.open('emploreg.php','_self') </script>"; 
                                        }
                                        
                                        $sql2 = "INSERT INTO `tblarchive` (`arcNum`, `tdNum`, `uID`, `aArchive`, `uDeletedBy`, `uRetriveBy`, `arcReason`, `arcDate`) VALUES (NULL, NULL, '$uID', '0', 'none', 'none', 'none', current_timestamp())";

                                           if (mysqli_query($conn, $sql2)) {
                                           
                                            }
                                        
                                      
                                        
                                       }
                                       
                         $conn->close();
                       
                        }
                     
                       ?> 