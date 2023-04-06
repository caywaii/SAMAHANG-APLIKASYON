<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Reports</title>
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
    ?>

    <section class="emplo-reg">
    <div id="emp_reg" class="text">Transaction Details</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center">Deleted Reports</div>
            <div class="container-fluid">
                </br></br></br>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        
                        <!-- reason modal -->
                    <form action="" method="">
                        <div class="modal fade" id="reason" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="border-radius: 1vh;">
                              <div class="modal-header" style="background-color: #f62e42;">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Deleted Member</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body" style="background-color: #d5dff7;">
                                <div class="col-md py-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="arcReason" placeholder="Type here..." value="<?php echo $row['arcReason'];?>" id="arcReason" style="height: 150px" disabled></textarea>
                                        <label for="arcReason">Reason for Deletion</label>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer" style="background-color: #d5dff7;">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                    </form>
                        
                        <!--View Button-->
                        <form action="" method="POST">
                            <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View Deleted User's Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="uID" class="form-control" id="uID" value="Casey" readonly>
                                                <label for="uID">User ID</label>
                                            </div>
                                        </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="hdate" class="form-control" id="empid" value="2023/01/27" readonly>
                                                    <label for="empid">Hired Date</label>
                                                </div>
                                            </div>
                                           <div class="col-md py-3">
                                            </div>
                                            <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="number" name="usertype" value = "2" class="form-control" id="usertype" value="2" hidden>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="fname" class="form-control" id="firstname" value="Casey" readonly>
                                                <label for="firstname">First Name</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="mname"class="form-control" id="middlename" value="O." readonly>
                                                    <label for="middlename">Middle Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="lname" class="form-control" id="lastname" value="Salonga" readonly>
                                                    <label for="lastname">Last Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="number" name="cnum" class="form-control" id="contactnum" value="09999999999" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" readonly>
                                                <label for="contactnum">Contact Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="username"class="form-control" id="username" value="casey01" readonly>
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="password" name="password" class="form-control" id="password" value="abc123" readonly>
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Cancel</button>
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
                            <div class="container">
                            	<div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                            	    <hr class="opacity-0">
                                	    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                                            <th>TD No.</th>
                                                            <th>MBR Code</th>
                                                            <th>TRN Identification</th>
                                                            <th>TRN Date</th>
                                                            <th>TRN Entry</th>
                                                            <th>ACC Code</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                            <th>Reason For Deletion</th>
                                                            <th>Operation</th>
                                                        </thead>
                                                        <tbody>
                                                             <?php 
                                                             $sql = "SELECT *, tbltransdetails.uID from tbltransdetails INNER JOIN tblaccounts ON tblaccounts.accID = tbltransdetails.accID 
                                                                                  INNER JOIN tblarchive ON tblarchive.tdNum = tbltransdetails.tdNum WHERE aArchive = '1'";
                                                             $query = mysqli_query($conn, $sql);
                                                             while ($row = mysqli_fetch_array ($query)){
                                                             ?>
                                                            <tr>
                                                                <td><input type="checkbox" name=""></td>
                                                                <td><?php echo $row['tdNum'];?></td>
                                                                <td><?php echo $row['uID'];?></td>
                                                                <td><?php echo $row['transIden'];?></td>
                                                                <td><?php echo $row['transDate'];?></td>
                                                                <td><?php echo $row['transEntry'];?></td>
                                                                <td><?php echo $row['accCode'];?></td>
                                                                <td><?php echo $row['tdDebit'];?></td>
                                                                <td><?php echo $row['tdCredit'];?></td>
                                                                <td><?php echo $row['arcReason'];?></td>
                                                                <td align="center">  
                                                                    <a class="button_green btn" href="retrievetran.php?tdNum=<?php echo $row['tdNum']; ?>">Retrive</a>
                                                                    <a class="btn-danger btn my-1" data-bs-toggle="modal" data-bs-target="#reason" data-bs-whatever="@getbootstrap">Reason</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                         <?php }?>
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