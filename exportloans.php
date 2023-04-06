<?php
include('connection.php');
$id = implode(", ", $_POST['select']);
$sql = "SELECT * FROM tblaccdetails WHERE adNum IN ($id)";
$result = $conn->query($sql);
if (isset($_POST['submitLoan'])) {
    if (!empty($_POST['select'])) {


        //EXPORTING
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; Filename = SPCB Loans.xls");
        
?>
      
<style>
    table, th, td{
        border:1px solid;
        width: 70%;
    }
    
    .header{
       background: #C5C6D8;
    }
    
    h2{
        font: bold italic 2em Georgia, Times, "Times New Roman", serif;
        padding: 0.5em 0 0.5em 0;
        font-size: 1em;
    }
   
</style>

        <table class="table">
             <h3>REPORT DATE: <?php echo date("F d Y \- l \: h:i A"); ?></h3>
            <h1 align="center" border="1px solid">Loans Collection Due Dates</h1>
            <thead>
                <tr>
                    <th>Account ID</th>
                    <th >Member ID</th>
                    <th >Loan Amount</th>
                    <th >Loan Due Date</th>
                </tr>
            </thead>
            <tbody>
           <form method="POST" action="export.php">
                    <?php
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <th scope="row"><?= $row['adNum']; ?></th>
                                <td align="center"><?php echo $row['uID'];?></td>
                               <td align="center"><?php echo $row['mLoans'];?></td>
                                <td><?php echo $row['mLoansDue'];?></td>
                             

                        </tr>


                    <?php endwhile; ?>
            </tbody>
        </table>


<?php

    }
}
?>