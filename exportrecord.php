<?php
include('connection.php');
$id = implode(", ", $_POST['select']);
$sql = "SELECT * FROM tbltransdetails WHERE tdNum IN ($id)";
$result = $conn->query($sql);
if (isset($_POST['submit'])) {
    if (!empty($_POST['select'])) {


        //EXPORTING
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; Filename = SPCB Record.xls");
        
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
            <h1 align="center" border="1px solid">Nature of Accounts</h1>
            <thead>
                  
                <tr class="header">
                    <th>TD No.</th>
                    <th>Member ID</th>
                    <th>TRN Identification</th>
                    <th>TRN Date</th>
                    <th>TRN Entry</th>
                    <th>ACC Code</th>
                    <th>Debit</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" action="export.php">
                    <?php
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <th scope="row"><?= $row['tdNum']; ?></th>
                                <td align="center"><?php echo $row['uID'];?></td>
                               <td align="center"><?php echo $row['transIden'];?></td>
                                <td><?php echo $row['transDate'];?></td>
                                <td><?php echo $row['transEntry'];?></td>
                                <td align="center"><?php echo $row['accID'];?></td>
                                <td><?php echo $row['tdDebit'];?></td>
                                <td><?php echo $row['tdCredit'];?></td>

                        </tr>

                    <?php endwhile; ?>
            </tbody>
        </table>
<?php

    }
}
?>