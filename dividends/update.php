<?php
include('connection.php');

$id = $_GET['updateid'];

$sql = "SELECT * FROM tblloan WHERE id=$id";
$result = $connection->query($sql);

if (isset($_POST['submit'])) {
  $loanStatus = $_POST['status'];

  $sqlUpdate = "UPDATE tblloan SET status = '$loanStatus' WHERE id = '$id'";
  if ($connection->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully";
    header("Location: index.php");
  } else {
    echo "Error updating record: " . $connection->error;
  }
  //cay
  $connection->close();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <div class="container col-3">
    <h1>UPDATE</h1>
    <form method="POST">
      <div>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <label for="idloan" class="form-label">ID</label>
          <input type="text" class="form-control" id="idloan" name="idloan" placeholder="Enter Your Name" value=" <?= $row['id'] ?>" disabled>
      </div>
      <div>
        <label for="mbrIDloan" class="form-label">MemberID</label>
        <input type="text" class="form-control" id="mbrIDloan" name="mbrIDloan" aria-describedby="emailHelp" placeholder="Enter Your Username" value=" <?= $row['memberID'] ?>" disabled>
      </div>
      <div>
        <label for="loanAmntupd" class="form-label">Loan Amount</label>
        <input type="text" class="form-control" id="loanAmntupd" name="loanAmntupd" aria-describedby="emailHelp" placeholder="Enter Your Username" value=" <?= $row['loanAmnt'] ?>" disabled>
      </div>
      <div>
        <label for="loanDDupd" class="form-label">Loan Due Date</label>
        <input type="text" class="form-control" id="loanDDupd" name="loanDDupd" placeholder="Enter Your Preferred Email" value=" <?= $row['loanDD'] ?>" disabled>
      </div>
      <div>
        <label for="status" class="form-label">Loan Status</label><br>
        <select id="status" name="status" size="1" value=" <?= $row['status'] ?>">
        <option value=" " hidden><?= $row['status'] ?></option>
          <option value="Not Paid">Not Paid</option>
          <option value="Fully Paid">Fully Paid</option>
          <option value="Not Yet Fully Paid">Not Yet Fully Paid</option>
        </select>
      </div>
    <?php endwhile; ?>
    <button type="submit" class="btn btn-primary" value="update" name="submit">Update</button>
    <a href="manageloan.php" class="btn btn-warning">Cancel</a>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
