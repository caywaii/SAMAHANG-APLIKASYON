<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleted Employee</title>
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
    <div id="emp_reg" class="text">Employee Panel</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center">Deleted Employee</div>
        
        <!-- reason modal -->
                <form action="" method="">
                    <div class="modal fade" id="reason" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 1vh;">
                          <div class="modal-header" style="background-color: #f62e42;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Deleted Employee</h1>
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
                    
            <div class="container-fluid">
                </br></br></br>
                <form action="" method="post">
                    <div class="row">
                        <div class="container">
                            <div class="container col-8">
                            	<div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                            	    <hr class="opacity-0">
                                	<table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>MBR ID</th>
                                                <th>Hired Date</th>
                                                <th>Reason For Deletion</th>
                                                <th>Operating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                            $sql = "SELECT * from tblusers INNER JOIN tblarchive ON tblarchive.uID = tblusers.uID WHERE uUserType = '2' AND aArchive = '1'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                            <tr>
                                                <td data-label="MBR ID"><?php echo $row['uID'];?></td>
                                                <td data-label="Hired Date"><?php echo $row['uRegDate']; ?></td>
                                                <td data-label="Reason for Deletion"><?php echo $row['arcReason']; ?></td>
                                                <td align="center">  
                                                    <a class="button_green btn my-1" href="viewdeletedemplo.php?uID=<?php echo $row['uID']; ?>">View</a>
                                                    <a class="button_blue_two btn my-1" href="retrive.php?uID=<?php echo $row['uID']; ?>">Retrieve</a>
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