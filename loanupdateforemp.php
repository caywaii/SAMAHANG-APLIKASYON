<?php
include('connection.php');

$id = $_GET['adNum'];

$sql = "SELECT * FROM tblaccdetails WHERE adNum='$id'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);


if (isset($_POST['submit'])) {
  $loanStatus = $_POST['status'];

  $sqlUpdate = "UPDATE tblaccdetails SET mLoanStatus = '$loanStatus' WHERE adNum = '$id'";
  if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
    header("Location: loanforemp.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
  //cay
 
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
        <div id="mem_reg" class="text" style="color: #554977;">Update</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Loans</div>
        </br></br></br>
            <div class="container">
                <form method="POST">
                <div class="col-md my-3" align="right">
                    <label for="status" class="form-label">Loan Status</label>
                    <select id="status" name="status" style="border-radius: 3px; border: hidden;"  value="<?php echo $row['mLoanStatus']; ?>">
                        <option value="" hidden><?php echo $row['mLoanStatus']; ?></option>
                        <option value="Not Paid">Not Paid</option>
                        <option value="Fully Paid">Fully Paid</option>
                        <option value="Pending">Pending</option>
                        <option value="Overdue">Overdue</option>
                    </select>
                </div>
                            
                <div class="row g-3">
                 
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="ID" class="form-control" value="<?php echo $row['adNum']; ?>"  id="ID" placeholder="#" readonly value="<?= $row['adNum'] ?>">
                            <label for="ID">Account ID</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="memberid" class="form-control" value="<?php echo $row['uID']; ?>" id="memberid" placeholder="#" readonly>
                            <label for="memberid">Member ID</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="loanamount" class="form-control"  value="<?php echo $row['mLoans']; ?>" id="loanamount" placeholder="#" readonly>
                            <label for="loanamount">Loan Amount</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="loanduedate" class="form-control"   value="<?= $row['mLoansDue']; ?>"id="loanduedate" placeholder="#" readonly>
                            <label for="loanduedate">Loan Due Date</label>
                        </div>
                    </div>
                </div>
                        <a href="loanforemp.php"><button type="button" class="btn btn-danger my-4 col-md-1">Cancel</button></a>
                        <input type="submit" value="Update" class="btn btn-primary my-4 col-md-1" name="submit">
                </form>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>