<?php
include('connection.php');
$id = implode(", ", $_POST['select']);
$sql = "SELECT * FROM tbltransdetails WHERE tdNum IN ($id)";
$result = $connection->query($sql);
if (isset($_POST['submit'])) {
    if (!empty($_POST['select'])) {


        //EXPORTING
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; Filename = SPCB.xls");
        
?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Type of Transaction</th>
                    <th scope="col">Accounting Code</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" action="export.php">
                    <?php
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <th scope="row"><?= $row['transIden']; ?></th>
                            <td><?= $row['mID']; ?></td>
                            <td><?= $row['transEntry']; ?></td>
                            <td><?= $row['accID']; ?></td>

                        </tr>

                    <?php endwhile; ?>
            </tbody>
        </table>
<?php

    }
}
?>