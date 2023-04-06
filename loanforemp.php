<?php 
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'employeenav.php';
    
    ?>

    <section class="rprt">
            <div id="rprt" class="text">Transaction Details</div>
            <div class="datetime"><span id="date-time"> </span></div>
            <hr class="border-3 opacity-75" style="color: #7A47EA;">
            <div id="rprt" class="text text-center">Loan Management</div>
            </br>
            <form action="exportloans.php" method="POST">
                        <div class="container col-8">
                    <div class="row justify-content-center">
                            <div class="col-md-11">
                                <button type="submit" name="submitLoan" class="button_blue btn my-4"><i class="bi bi-arrow-down-square"> </i>Export</a>
                            </div>
                        </div>
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                </br></br>
                                <table class="table" border="0" cellspacing="5" cellpadding="5">
                                    <tbody>
                                        <tr>
                                            <td>Minimum date:</td>
                                            <td><input type="text" id="min" name="min"></td>
                                        </tr>
                                        <tr>
                                            <td>Maximum date:</td>
                                            <td><input type="text" id="max" name="max"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <!--<div align="right">-->
                                        <!--        <form method="POST" action="loanotherforemp.php">-->
                                        <!--            <label for="status" class="form-label">Loan Status</label>-->
                                        <!--                <select id="status" name="statusSearch" style="border-radius: 3px; border: hidden;">-->
                                        <!--                    <option value="" hidden></option>-->
                                        <!--                    <option value="All">All</option>-->
                                        <!--                    <option value="Not Paid">Not Paid</option>-->
                                        <!--                    <option value="Fully Paid">Fully Paid</option>-->
                                        <!--                    <option value="Pending">Pending</option>-->
                                        <!--                </select>-->
                                        <!--            <input type="submit" class="btn button_green mx-3" name="search" value="Show">-->
                                        <!--        </form>-->
                                        <!--    <a class="button_blue btn" href="exportloans.php"><i class="bi bi-arrow-down-square"> </i>Export</a>-->
                                        <!--</div>-->
                                  
                                            <tr>
                                                <th><input type="checkbox" onclick="checkAll(this)"></th>
                                                <th>Account ID</th>
                                                <th>Member ID</th>
                                                <th>Loan Amount</th>
                                                <th>Loan Due Date</th>
                                                <th>Status</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                            $sql = "SELECT * from tblaccdetails WHERE mLoans != 0.00";
                                            $query = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                                 
                                            <tr>
                                               <td><input type="checkbox" name="select[]" value="<?= $row['adNum']; ?>"></td>
                                                <td data-label="Account ID" scope="row"><?php echo $row['adNum'];?></td>
                                                <td data-label="Member ID"><?php echo $row['uID'];?></td>
                                                <td data-label="Loans Amount"><?php echo $row['mLoans'];?></td>
                                                <td data-label="Loan Due Date"><?php echo $row['mLoansDue'];?></td>
                                                <td data-label="Status"><?php echo $row['mLoanStatus'];?></td>
                                                <td data-label="Operation" align="center">
                                                    <form method="POST">
                                                        <a class="button_blue_two btn my-1"  href="loanupdateforemp.php?adNum=<?php echo $row['adNum']; ?>">Update</a>
                                                    </form>
                                                </td>
                                            </tr>
                                           <?php }?>
                                        </tbody>
                                   
                                    </table>
                            </br>
                        </br>
                    </div>   
                
                </div>
                   </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
    <script>
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
        var minDate, maxDate;
 
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );
         
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
         
        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
         
            // DataTables initialisation
            var table = $('#example').DataTable();
         
            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
    </script>
</body>
</html>