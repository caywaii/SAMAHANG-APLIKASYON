<?php
include('connection.php');

$sql = "SELECT * FROM tbltransdetails";
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
  <h1>Transaction Details</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Select</th>
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
            <td><input type="checkbox" name="select[]" value="<?= $row['tdNum']; ?>"></td>
            <th scope="row"><?= $row['transIden']; ?></th>
            <td><?= $row['mID']; ?></td>
            <td><?= $row['transEntry']; ?></td>
            <td><?= $row['accID']; ?></td>

          </tr>

        <?php endwhile; ?>
    </tbody>
  </table>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Export</button>
  </form>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>

<!-- I USED BOOTSTRAP -->