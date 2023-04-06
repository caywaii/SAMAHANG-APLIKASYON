<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature of Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'employeenav.php';
    
    if(!isset($_SESSION['eUsername'])){ 
     header("Location:index.php");
 
  
    include "connection.php";
    
                         
                         
                         	$id = $_SESSION['uID'];
	                        $sql = "SELECT * FROM tbltransdetails";
	                        $query = mysqli_query($conn, $sql);
	                        $row = mysqli_fetch_array($query);
    
  
}



    ?>

    <section class="rprt">
            <div id="rprt" class="text">Transaction Details</div>
            <div class="datetime"><span id="date-time"> </span></div>
            <hr class="border-3 opacity-75" style="color: #7A47EA;">
            <div id="rprt" class="text text-center">Nature of Accounts</div>
                <!-- delete modal -->
                <form action="deletetrans.php?tdNum=<?php echo $row['tdNum']; ?>" method="post">
                    <div class="modal fade" id="delete" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 1vh;">
                          <div class="modal-header" style="background-color: #f62e42;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Transaction</h1>
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
                <div class="container">
                    </br></br>
                    <form action="exportrecord.php" method="POST">
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <button type="submit" name="submit" class="button_blue btn my-4"><i class="bi bi-arrow-down-square"> </i>Export</a>
                            </div>
                        </div>
                            <div class="row">
                                <div class="container">
                                    <div class="container">
                                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                                </br></br>
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                                            <th>TD No.</th>
                                                            <th>MBR ID</th>
                                                            <th>TRN Identification</th>
                                                            <th>TRN Date</th>
                                                            <th>TRN Entry</th>
                                                            <th>ACC Code</th>
                                                            <th>ACC Name</th>
                                                            <th>Credit</th>
                                                            <th>Debit</th>
                                                            <th>Operation</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                            $sql = "SELECT *, tbltransdetails.uID from tbltransdetails INNER JOIN tblaccounts ON tblaccounts.accID = tbltransdetails.accID 
                                                                                  INNER JOIN tblarchive ON tblarchive.tdNum = tbltransdetails.tdNum WHERE aArchive = '0'";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                                            <tr>
                                                                <td><input type="checkbox" name="select[]" value="<?= $row['tdNum']; ?>"></td>
                                                                <td><?php echo $row['tdNum'];?></td>
                                                                <td><?php echo $row['uID'];?></td>
                                                                <td><?php echo $row['transIden'];?></td>
                                                                <td><?php echo $row['transDate'];?></td>
                                                                <td><?php echo $row['transEntry'];?></td>
                                                                <td><?php echo $row['accCode'];?></td>
                                                                <td><?php echo $row['accTitle'];?></td>
                                                                <td><?php echo $row['tdCredit'];?></td>
                                                                <td><?php echo $row['tdDebit'];?></td>
                                                                <td align="center"> 
                                                                    <a class="button_blue_two btn my-1" href="updaterecord.php?tdNum=<?php echo $row['tdNum']; ?>" >Update</a>
                                                                    <a class="button_red btn" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete" data-bs-whatever="@getbootstrap">Delete</a>
                                                                </td>
                                                            </tr>
                                                             <?php }?>
                                                        </tbody>
                                                    </table>
                                                </br></br>
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