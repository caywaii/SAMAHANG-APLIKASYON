<?php 
include "connection.php";

$sql = "SELECT COUNT(*) FROM tblusers WHERE uAlter ='Yes'";

$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

//DUE DATE LOANS
$duedate = date("Y-m-d");
$sqlLoans = "SELECT * FROM tblaccdetails WHERE mLoans != '0.00' AND mLoansDue = '$duedate'";
$resLoans = mysqli_query($conn, $sqlLoans);

//LATEST TRANSACTION
$sqlTrans = "SELECT * FROM tbltransdetails INNER JOIN tblaccounts ON tblaccounts.accID = tbltransdetails.accID  LIMIT 4";
$resTrans = mysqli_query($conn, $sqlTrans);


//LATEST MEMBERS JOINED
$sqlMembers = "SELECT * FROM tblusers WHERE uAlter = 'Yes' ORDER BY uID DESC LIMIT 3";
$resMembers = mysqli_query($conn, $sqlMembers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'adminnav.php';
    ?>

    <section class="home">
        <div id="home" class="text">SAMAHANG PANGKABUHAYAN (CREDIT) CO-OP NG BAYAN</div>
    <div class="container" align="center">
            </br>
        <div class="main-body">
            <div class="row container">
                <div class="col-md-5">
                    <div class="container">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                </br>
                                <div class="card-body">
                                    <h3 class="card-title">Welcome <?php echo $_SESSION['uFName'];?>!</h3></br>
                                    <h6 class="card-text">You are an official Administrator of Samahang Pangkabuhayan (Credit) Co-op ng Bayan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container">
                        <div class="container">
                            <div class="row card container " style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Time and Date</h4>
                                    <span class="dig_clock" id="time"></span>
                                    <span class="dig_date" id="date"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="container">
                            <div class="row card container py-3" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Total Members</h4>
                                    <i class="bi bi-person-badge icon"></i>
                                    <i class="bi bi-person-badge icon"></i>
                                    <i class="bi bi-person-badge icon"></i>
                                    </br></br>
                                    <h4 class="card-text"><?php echo $row[0]; mysqli_close($conn);?></h4>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <hr class="border-3 opacity-75" style="color: #7A47EA;">
    <div class="container" align="center">
            </br>
        <div class="main-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">SPCB Members</h4>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                           <tr>
                                                <th>Name</th>
                                                <th>User ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                 while ($row = $resMembers->fetch_assoc()) :
                                                ?>
                                                <td data-label="Name"><?= $row['uFName']; ?></td>
                                                <td data-label="User ID"><?= $row['uID']; ?></td>
                                            </tr>
                                               <?php endwhile; ?>
                                        </tbody>        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-4">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Today's Members Loans Due Date</h4>
                                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>MBR Code</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               <?php
                                                 while ($row = $resLoans->fetch_assoc()) :
                                                ?>
                                            <tr>
                                                <td data-label="MBR Code"><?= $row['uID']; ?></td>
                                                <td data-label="Amount"><?= $row['mLoans']; ?></td>
                                                <td data-label="Date"><?= $row['mLoansDue']; ?></td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>        
                                    </table>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container mt-7">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Transaction</h4>
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>MBR CODE</th>
                                                <th>Account Title</th>
                                                <th>Date</th>
                                            </tr>
                                             
                                        </thead>
                                        <tbody>
                                            <?php
                                                 while ($rowTrans = $resTrans->fetch_assoc()) :
                                                ?>
                                            <tr>
                                                <td data-label="MBR Code"><?= $rowTrans['uID']; ?></td>
                                                <td data-label="Accounting Code"><?= $rowTrans['accTitle']; ?></td>
                                                <td data-label="Date"><?= $rowTrans['transDate']; ?></td>
                                            </tr>
                                             <?php endwhile; ?>
                                        </tbody>        
                                    </table>
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
        $('#example').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
        $('#example1').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
        $('#example2').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
    </script>
</body>
</html>