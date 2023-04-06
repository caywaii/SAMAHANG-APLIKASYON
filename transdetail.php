<?php
   include "connection.php";
   if(!isset($_SESSION['employee'])){ 
     header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    <?php
    include 'employeenav.php';
    
                            $sql = "SELECT * FROM tbltransdetails ORDER BY uID DESC LIMIT 1";
	                        $query = mysqli_query($conn, $sql);
	                        $row = mysqli_fetch_array($query);

     //$sql = "SELECT tbltransdetails.transIden, tbltransdetails.transEntry, tblmembers.mID, tblaccounts.accCode, tbltransdetails.tdDebit, tbltransdetails.tdCredit, tbltransdetails.transDate FROM //tbltransdetails INNER JOIN tblmembers ON tblmembers.mID = tbltransdetails.mID INNER JOIN tblaccounts ON tblaccounts.accID = tbltransdetails.accID";
 //$result = mysqli_query($conn, $sql);
    ?>

    <section class="transac">
        <div id="transaction_Details" class="text">Transaction Details</div>
        <div class="datetime"><span id="date-time"> </span></div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
            <!--share capital-->
                <form action="" method="POST">
                            <div class="modal fade" id="sharecap" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Share Capital</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="1" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="trannum" placeholder="#" required>
                                                  <label for="trannum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="memid" placeholder="#" required>
                                                    <label for="memid">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="transid" placeholder="#" required>
                                                  <label for="transid">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <!--savings deposit-->
                        <form action="" method="POST">
                            <div class="modal fade" id="savedep" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Savings Deposit</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date"  class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="2" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                <!--member fee-->
                <form action="" method="POST">
                            <div class="modal fade" id="memfee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Membership Fee</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="8" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid"  class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <!--Time Deposit-->
                <form action="" method="POST">
                            <div class="modal fade" id="timedep" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Time Deposit</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="4" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--savings Withdrawal-->
                <form action="" method="POST">
                            <div class="modal fade" id="savewith" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Savings Withdrawal</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Disbursement" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="3" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Patronage Refund-->
                <form action="" method="POST">
                            <div class="modal fade" id="patref" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Patronage Refund</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Disbursement" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="7" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                                <!--Cash on Hand-->
                <form action="" method="POST">
                            <div class="modal fade" id="cashon" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cash on Hand</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Disbursement" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="9" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum"  value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Cash in Bank-->
                <form action="" method="POST">
                            <div class="modal fade" id="cashin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cash in Bank</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="10" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum"  value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Loan Receivables-->
                <form action="" method="POST">
                            <div class="modal fade" id="loansrec" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Loans Receivables</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Disbursement" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="5" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum"  value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--Loans Payable-->
                <form action="" method="POST">
                            <div class="modal fade" id="loanspay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Loans Payable</h5>
                                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text"  name="empID" value="<?php echo $_SESSION['uID']; ?>" class="form-control" id="credit" placeholder="#" hidden>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="date"  name="date" class="form-control" id="date" placeholder="#" required>
                                                  <label for="date">Transaction Date</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="text" name="transentry" value="Receivable" class="form-control" id="transentry" placeholder="#" hidden>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="accid" value="6" class="form-control" id="accid" placeholder="#" hidden>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="trannum" value="<?php echo $row['tdNum']; ?>" class="form-control" id="tdnum" placeholder="#" required>
                                                  <label for="tdnum">Transaction Num</label>
                                                </div>
                                            </div>
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                    <input type="text" name="memid" class="form-control" id="sharecap" placeholder="#" required>
                                                    <label for="sharecap">Member's ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number" name="transid" class="form-control" id="member_number" placeholder="#" required>
                                                  <label for="member_number">Transaction Identification</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md py-3">
                                                <div class="form-floating">
                                                  <input type="number"  name="amount" class="form-control" id="amount" placeholder="#" required>
                                                  <label for="amount">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger" >Reset</button>
                                            <button type="submit"  name="insert" class="btn btn-primary">Submit</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
            <form class="container main" action="" method="post">
                <div id="transaction_Details" class="text text-center">Input Transaction</div>
                </br></br></br></br>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Share Capital" aria-label="Share_Capital" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#sharecap" data-bs-whatever="@getbootstrap">30110</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Savings Deposit" aria-label="Savings_Deposit" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#savedep" data-bs-whatever="@getbootstrap">21110</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Membership Fee" aria-label="Membership Fee" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#memfee" data-bs-whatever="@getbootstrap">40420</button>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Time Deposit" aria-label="Time Deposits" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#timedep" data-bs-whatever="@getbootstrap">21120</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Savings Withdrawal" aria-label="Savings_Withdrawal" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#savewith" data-bs-whatever="@getbootstrap">21110</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Patronage Refund" aria-label="Patronage Refund" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#patref" data-bs-whatever="@getbootstrap">30420</button>
                        </div>
                    </div>
                </div>
                 <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Cash on Hand" aria-label="Cash_on_Hand" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#cashon" data-bs-whatever="@getbootstrap">11110</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Cash in Bank" aria-label="Cash_in_Bank" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#cashin" data-bs-whatever="@getbootstrap">11130</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Loans Receivables" aria-label="Loans Receivables" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#loansrec" data-bs-whatever="@getbootstrap">11230</button>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Loans Payable" aria-label="Loans Payable" aria-describedby="button-addon2" readonly>
                              <button class="btn btn-primary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#loanspay" data-bs-whatever="@getbootstrap">11230</button>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="input-group mb-3">
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <!--<div class="col-md py-3">-->
                    <!--    <div class="form-floating">-->
                    <!--        <select name="acccode" class="form-select" id="acc_code">-->
                    <!--            <option selected disabled>Select one...</option>-->
                    <!--            <option name="acccode" value="Share_Capital">(1) 30110 (Share_Capital)</option>-->
                    <!--            <option name="acccode" value="Savings_Deposit">(2) 21110 (Savings_Deposit)</option>-->
                    <!--            <option name="acccode" value="Savings_Deposit">(3) 21110 (Savings_Withdrawal)</option>-->
                    <!--            <option name="acccode" value="Time_Deposits">(4) 21120 (Time_Deposits)</option>-->
                    <!--            <option name="acccode" value="Loans_Receivables">(5) 11230 (Loans_Receivables)</option>-->
                    <!--            <option name="acccode" value="Loans_Receivables">(6) 11230 (Loans_Payable)</option>-->
                    <!--            <option name="acccode" value="Patronage_Refund">(7) 30420 (Patronage_Refund)</option>-->
                    <!--            <option name="acccode" value="Membership_Fee">(8) 40420 (Membership_Fee)</option>-->
                    <!--            <option name="acccode" value="Cash_on_Hand">(9) 11110 (Cash_on_Hand)</option>-->
                    <!--            <option name="acccode" value="Cash_in_Bank">(10) 11130 (Cash_in_Bank)</option>-->
                    <!--        </select>-->
                    <!--        <label for="acc_code">Accounting Code</label>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                </div>
            </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST["insert"])){
    
     
     
     $empID = $_POST['empID'];
     $date = $_POST['date'];
     $transentry = $_POST['transentry'];
     $accid = $_POST['accid'];
     $trannum = $_POST['trannum'];
     $memid = $_POST['memid'];
     $transid = $_POST['transid'];
     $amount = $_POST['amount'];
    
    
   $sql = "INSERT INTO tbltransdetails (tdNum, transIden, uID, accID, transEntry, tdDebit, tdCredit, transDate, empID) 
   VALUES ('$trannum', '$transid', '$memid', '$accid', '$transentry', '0.00', '$amount', '$date', '$empID')";    

   
    if ($conn->query($sql) === TRUE){
        echo "<script type= 'text/javascript'>
        alert('New Record Created Successfully');
        </script>"; 
        
    }
    
    $sql2 = "INSERT INTO `tblarchive` (`arcNum`, `tdNum`, `uID`, `aArchive`, `uDeletedBy`, `uRetriveBy`, `arcReason`, `arcDate`) VALUES (NULL, $trannum, NULL, '0', 'none', 'none', none', current_timestamp())";

    if (mysqli_query($conn, $sql2)) { echo "<script>window.open('transdetail.php','_self') </script>";  }
    
    
    $conn->close();
}

if(isset($_POST["submit"])){
    
     
     
     $empID = $_POST['empID'];
     $date = $_POST['date'];
     $transentry = $_POST['transentry'];
     $accid = $_POST['accid'];
     $trannum = $_POST['trannum'];
     $memid = $_POST['memid'];
     $transid = $_POST['transid'];
     $amount = $_POST['amount'];
    
    
   $sql = "INSERT INTO tbltransdetails (tdNum, transIden, uID, accID, transEntry, tdDebit, tdCredit, transDate, empID) 
   VALUES ('$trannum', '$transid', '$memid', '$accid', '$transentry', '$amount', '0.00', '$date', '$empID')";    

   
    if ($conn->query($sql) === TRUE){
        echo "<script type= 'text/javascript'>
        alert('New Record Created Successfully');
        </script>"; 
    }
    
    $sql2 = "INSERT INTO `tblarchive` (`arcNum`, `tdNum`, `uID`, `aArchive`, `uDeletedBy`, `arcReason`, `arcDate`) VALUES (NULL, $trannum, NULL, '0', 'none', 'none', current_timestamp())";

    if (mysqli_query($conn, $sql2)) { echo "<script>window.open('transdetail.php','_self') </script>"; }
    
    
    $conn->close();
}


?>