<?php
include('connection.php');

$sql = "SELECT * FROM tblmembers";
$result = $connection->query($sql);

//countrow

$countMember = mysqli_num_rows($result);
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
  <h1>Members</h1>
    <div>
        <?php 
        $sqlCount = "SELECT sum(divAmnt) FROM dividends WHERE divAmnt > '0.00'";
        $count = $connection->query($sqlCount);
        while($countDiv = mysqli_fetch_array($count)){

        
        ?>
        
        <h3>Total Members in SPCB: <?php echo $countMember ?></h3>

        <?php 
        }
        ?>

    </div>
  
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Member ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <th scope="row"><?= $row['id']; ?></th>
            <td><?= $row['memberID']; ?></td>
            <td><?= $row['Username']; ?></td>
            <td><?= $row['Email']; ?></td>
           

          </tr>

        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>