<?php include "connection.php";


 if(!isset($_SESSION['member'])){ 
     header("Location:index.php");
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- logout modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 1vh; ">
              <div class="modal-header" style="background-color: #f62e42; color: white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Logout</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" style="background-color: #d5dff7;">
                Are you sure to logout?
              </div>
              <div class="modal-footer" style="background-color: #d5dff7;">
                  <a href="logout.php"><button type="button" class="btn btn-danger">Yes</button></a>
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">No</button>
                
              </div>
            </div>
          </div>
        </div>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Member_Picture" class="rounded-circle" width="150">
                </span>
                <div class="text logo-text">
                    <span class="name"><?php
                    echo $_SESSION['uFName']. " " .$_SESSION['uLName']; ?></span>
                    <span class="profession">Member</span>
                </div>
            </div>
            <i class="bi bi-arrow-right-short toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                    <li class="search-box my-4">
                        <a href="memberdash.php">
                            <i class="bi bi-house-fill icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Home"></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <hr>
                    <li class="nav-link">
                        <a href="memberprof.php">
                            <i class="bi bi-person-vcard icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Profile/Account Details"></i>
                            <span class="text nav-text">Profile/Account Details</span>
                        </a>
                    </li>
                </div>
            <div class="bottom-content">
                <li class="nav-link">
                    <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-door-open-fill icon" data-bs-toggle="tooltip" data-bs-placement="right" title="Logout"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>
    
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>