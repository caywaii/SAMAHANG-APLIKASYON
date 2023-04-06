<?php 
include('connection.php');
// $sql = "SELECT * FROM tblaccdetails WHERE mLoans != '0.00'";
// $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loans Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div id="rprt" class="text text-center">Loans</div>
            </br></br></br>
                <div class="container col-8">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                </br></br>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <div align="right">
                                                <form method="POST" action="loanotherforemp.php">
                                                    <label for="status" class="form-label">Loan Status</label>
                                                        <select id="status" name="statusSearch" style="border-radius: 3px; border: hidden;">
                                                            <option value="" hidden></option>
                                                            <option value="All">All</option>
                                                            <option value="Not Paid">Not Paid</option>
                                                            <option value="Fully Paid">Fully Paid</option>
                                                            <option value="Pending">Pending</option>
                                                        </select>
                                                   <input type="submit" class="btn button_green mx-3" name="search" value="Show">
                                                </form>
                                             <?php
                                                if(isset($_POST['search']))
                                                {
                                                 
                                                    $getStatus = $_POST['statusSearch'];
                                                    if($getStatus == "All"){
                                                    $sql = "SELECT * FROM tblaccdetails WHERE mLoans != '0.00'";
                                                    $result = $conn->query($sql);
                                                    }else{
                                                    $sql = "SELECT * FROM tblaccdetails WHERE mLoanStatus = '$getStatus' AND mLoans != '0.00'";
                                                     $result = $conn->query($sql);
                                                    }
                                                    ?>
           
                                            <a class="button_blue btn" href="exportloans.php"><i class="bi bi-arrow-down-square"> </i>Export</a>
                                        </div>
                                            <tr>
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
                                            while ($row = $result->fetch_assoc()) :
                                            ?>
                                            <tr>
                                                <td data-label="Account ID" scope="row"><?= $row['adNum']; ?></td>
                                                <td data-label="Member ID"><?= $row['mID']; ?></td>
                                                <td data-label="Dividends Amount"><?= $row['mLoans']; ?></td>
                                                <td data-label="Loan Due Date"><?= $row['mLoansDue']; ?></td>
                                                <td data-label="Status"><?= $row['mLoanStatus']; ?></td>
                                                
                                                <td data-label="Operation" align="center">
                                                    <form method="POST">
                                                        <a class="button_blue_two btn my-1"  href="loanupdateforemp.php?adNum=<?php echo $row['adNum']; ?>">Update</a>
                                                    </form>
                                                </td>
                                            </tr>
                                          
                                            <?php endwhile; ?>
                                            
                                        </tbody>
                                    </table>
                            </br>
                        </br>
                    </div>   
                </div>
                
    <?php 
                                                }
                                            ?>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#example').DataTable({
        scrollX: true,
        scrollY: true,
        searching: false,
        ordering: false,
        paging: true,
        info: false,
        lengthMenu: [
            [5, 10, 15, 20],
            [5, 10, 15, 20],
        ],
    });
    </script>
</body>
</html>