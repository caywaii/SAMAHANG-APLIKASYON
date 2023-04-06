<?php
include('connection.php');

$sql = "SELECT * FROM tblaccdetails WHERE mDiv != '0.00'";
$query = mysqli_query($conn, $sql);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dividends</title>
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
            <div id="rprt" class="text text-center">Dividends</div>
            </br></br></br>
                <div class="container col-6">
                    <form action="" method="post">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;"></br>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Account ID</th>
                                                <th>Member ID</th>
                                                <th>Dividends Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php
                                                 while ($row = mysqli_fetch_array ($query)){
                                            ?>
                                                <td data-label="Account ID" scope="row"><?= $row['adNum']; ?></td>
                                                <td data-label="Member ID"><?= $row['uID']; ?></td>
                                                <td data-label="Dividends Amount"><?= $row['mDiv']; ?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </br>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="totaldiv" style="background-color: #d5dff7; border-color: #7A47EA;">Total Dividends</span>
                                    <?php
                                    $sqlCount = "SELECT sum(mDiv) FROM tblaccdetails WHERE mDiv > '0.00'";
                                    $count = $conn->query($sqlCount);
                                    while($countDiv = mysqli_fetch_array($count)){
    
                                    ?>
                                    
                                    <input type="text" class="form-control" placeholder="Total" aria-label="totaldiv" aria-describedby="totaldiv" readonly style="background-color: #ecf2ff; border-color: #7A47EA;" value=" <?php echo number_format($countDiv['sum(mDiv)']) . " PHP"?>">   
                                    <?php 
                                         }
                                    ?>
                                   
                                </div>
                            </br>
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
        searching: false,
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