<?php
include('connection.php');

$sql = "SELECT * FROM tblaccdetails WHERE mDiv != '0.00'";
$result = $connection->query($sql);
//LAMAN SA TABLES
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


  <div class="container col-5">
    <div>
        <?php 
        $sqlCount = "SELECT sum(mDiv) FROM tblaccdetails WHERE mDiv > '0.00'";
        $count = $connection->query($sqlCount);
        while($countDiv = mysqli_fetch_array($count)){

        
        ?>
        
        <h3>Total Dividends: <?php echo number_format($countDiv['sum(mDiv)']) . " PHP"?></h3>

        <?php 
        }
        ?>

    </div>
    <h1>Dividends</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
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
           

       
            </td>
          </tr>

        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>