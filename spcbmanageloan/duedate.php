<?php
include('connection.php');
$duedate = date("Y-m-d");
$sql = "SELECT * FROM tblaccdetails WHERE mLoans != '0.00' AND mLoansDue = '$duedate'";
$result = $connection->query($sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

<!-- WHEN SELECTED -->
  <div class="container col-5">
    <h1>LOANS</h1>
    <div>
    <form method="POST" action="indexother.php">
      <label for="status" class="form-label">Loan Status</label>
      <select id="status" name="statusSearch" size="1">
        <option value=" " hidden></option>
        <option value="All">All</option>
        <option value="Not Paid">Not Paid</option>
        <option value="Fully Paid">Fully Paid</option>
        <option value="Not Yet Fully Paid">Not Yet Fully Paid</option>
      </select>
      <input type="submit" name="search" value="Show">
    </div>
    </form>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Member ID</th>
          <th scope="col">Loan Amount</th>
          <th scope="col">Loan Due Date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <th scope="row"><?= $row['adNum']; ?></th>
            <td><?= $row['mID']; ?></td>
            <td><?= $row['mLoans']; ?></td>
            <td><?= $row['mLoansDue']; ?></td>
            <td><?= $row['mLoanStatus']; ?></td>

            <!-- TO GET THE ID DYNAMICALLY -->
            <td>
              <form method="POST">
                <a href="update.php?updateid=<?= $row['id'] ?>" class="btn btn-primary" name="update">Update</a>
              </form>
            </td>
          </tr>

        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-primary" name="due">Back</a>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>