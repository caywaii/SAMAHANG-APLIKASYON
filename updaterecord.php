<?php
include'connection.php';
 
	$id = $_GET['tdNum'];
	$sql = "SELECT * FROM tbltransdetails WHERE tdNum = '$id'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Nature of Accounts</title>
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
        <div id="mem_reg" class="text" style="color: #554977;">Transaction Details</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Update Nature of Accounts</div>
        </br></br></br></br></br>
            <div class="container">
                <div class="col-md-11">
                        <a href="recordforemp.php"><button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                    </div>
                <form method="POST" action="updatefortrans.php?tdNum=<?php echo $id; ?>">
                    <div class="row g-3">
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="tdnum" class="form-control" value="<?php echo $row['tdNum']; ?>"  id="tdnum" placeholder="#" required>
                                <label for="tdnum">TD No.</label>
                            </div>
                        </div>
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="mbrid" class="form-control" value="<?php echo $row['uID']; ?>" id="mbrid" placeholder="#" required>
                                <label for="mbrid">MBR ID</label>
                            </div>
                        </div>
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="trniden" class="form-control" value="<?php echo $row['transIden']; ?>" id="trniden" placeholder="#" required>
                                <label for="trniden">TRN Identification</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="trndate" class="form-control" value="<?php echo $row['transDate']; ?>"  id="trndate" placeholder="#" required>
                                <label for="trndate">TRN Date</label>
                            </div>
                        </div>
                        
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="acccode" class="form-control" value="<?php echo $row['accID']; ?>"  id="acccode" placeholder="#" required>
                                <label for="acccode">ACC Code</label>
                            </div>
                        </div>
                        
                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="text" name="credit" class="form-control" value="<?php echo $row['tdCredit']; ?>"  id="accname" placeholder="#" required>
                                <label for="accname">Credit</label>
                            </div>
                        </div>
                    </div><!-- row -->
                    <div class="row g-3">

                        <div class="col-md py-3">
                            <div class="form-floating">
                                <input type="number" name="debit" class="form-control" value="<?php echo $row['tdDebit']; ?>"  id="amount" placeholder="#" required>
                                <label for="amount">Debit</label>
                            </div>
                        </div>
                        <div class="col-md py-3">
                        </div>
                        <div class="col-md py-3">
                            <div class="col-md-12" align="right">
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