<?php
include'connection.php';
 
	$id = $_GET['uID'];
	$sql = "SELECT * FROM tblaccdetails WHERE uID = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Details</title>
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
        <div id="mem_reg" class="text" style="color: #554977;">Account Details</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Member</div>
        </br></br></br></br></br>
            <div class="container">
                <div class="col-md-11">
                        <a href="accdetails.php"><button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                    </div>
                <form method="POST" action="updateforaccounts.php?uID=<?php echo $id; ?>">
                    <div class="row g-3">
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="sharecap" class="form-control" value="<?php echo $row['mSCapital']; ?>"  id="sharecap" placeholder="#" required>
                                <label for="sharecap">Share Capital</label>
                            </div>
                        </div>
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="savedep" class="form-control" value="<?php echo $row['mSavingDep']; ?>" id="savedep" placeholder="#" required>
                                <label for="savedep">Saving Deposit</label>
                            </div>
                        </div>
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="loans" class="form-control" value="<?php echo $row['mLoans']; ?>" id="loans" placeholder="#" required>
                                <label for="loans">Loans</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="timedeposit" class="form-control" value="<?php echo $row['mTimeDep']; ?>"  id="timedeposit" placeholder="#" required>
                                <label for="timedeposit">Time Deposit</label>
                            </div>
                        </div>
                        
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="dividend" class="form-control" value="<?php echo $row['mDiv']; ?>"  id="dividend" placeholder="#" required>
                                <label for="dividend">Dividend</label>
                            </div>
                        </div>
                        
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="patref" class="form-control" value="<?php echo $row['mPatRef']; ?>"  id="dividend" placeholder="#" required>
                                <label for="dividend">Patronage Refund</label>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success my-4 col-md-4">Save</button>
                            </div> <!-- Button --> 
                        </div>
                    </div><!-- row -->
                </form>
            </div> <!-- Container -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>