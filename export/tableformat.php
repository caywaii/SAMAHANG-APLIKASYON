<?php
include('connection.php');

$sql = "SELECT * FROM tbltrans";
$result = $connection->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" style="border: 1px solid black;">ID</th>
          <th scope="col" style="border: 1px solid black;">Member ID</th>
          <th scope="col" style="border: 1px solid black;">Type of Transaction</th>
          <th scope="col" style="border: 1px solid black;">Accounting Code</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <th scope="row" style="border: 1px solid black;"><?= $row['id']; ?></th>
            <td style="border: 1px solid black;"><?= $row['memberID']; ?></td>
            <td style="border: 1px solid black;"><?= $row['typeOP']; ?></td>
            <td style="border: 1px solid black;"><?= $row['accCode']; ?></td>
           
          </tr>

        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

<!-- I USED BOOTSTRAP -->