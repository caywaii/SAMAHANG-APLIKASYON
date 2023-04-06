<?php
include('connection.php');
$sql = "SELECT * FROM tblaccdetails WHERE mDiv != '0.00'";
$result = $conn->query($sql);


        //EXPORTING
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; Filename = SPCB Dividends.xls");
        
?>
        <table class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Dividends Amount</th>
                </tr>
            </thead>
            <tbody>
              
                    <?php
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <th scope="row"><?= $row['adNum']; ?></th>
                            <td><?= $row['mID']; ?></td>
                            <td><?= $row['mDiv']; ?></td>
                                 
                           
                            
                        </tr>

                    <?php endwhile; ?>
            </tbody>
        </table>
        <?php
                                    $sqlCount = "SELECT sum(mDiv) FROM tblaccdetails WHERE mDiv > '0.00'";
                                    $count = $conn->query($sqlCount);
                                    while($countDiv = mysqli_fetch_array($count)){
    
                                    ?>
        <h4 style="bold">Total: <?php echo number_format($countDiv['sum(mDiv)']) . " PHP"?> </h4>
          <?php 
                                         }
                                    ?>