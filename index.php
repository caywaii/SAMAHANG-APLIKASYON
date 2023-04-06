<?php include "connection.php";
 
if(isset($_SESSION['admin'])){
     header("Location:admindash.php");
}

if(isset($_SESSION['employee'])){
     header("Location:employeedash.php");
}

if(isset($_SESSION['member'])){
     header("Location:memberdash.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In & Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="start_login">
        <form action="location.php" method="post">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <div class="text">
                            <p>Be a part of the SAMAHANG PANGKABUHAYAN CREDIT COOP NG BAYAN!</p>
                        </div>
                    </div>
                    <div class="col right">
                        <div class="input-box">
                            <header style="color:#7A47EA;">Welcome Back</header>
                            <!--<div class="container-sm">-->
                            <!--    <div class="form-check-inline">-->
                            <!--        <input type="radio" class="btn-check" value="3" name="rbtn" id="memberradio" autocomplete="off" checked>-->
                            <!--        <label class="btn btn-outline-success" for="memberradio">Member</label>-->
                            <!--        <input type="radio" class="btn-check" value="2" name="rbtn" id="employeeradio" autocomplete="off">-->
                            <!--        <label class="btn btn-outline-primary" for="employeeradio">Employee</label>-->
                            <!--        <input type="radio" class="btn-check" value="1" name="rbtn" id="adminradio" autocomplete="off">-->
                            <!--        <label class="btn btn-outline-danger" for="adminradio">Admin</label>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<br>-->
                            <div class="input-field">
                                <input type="text" name="username" class="input" id="username" required autocomplete="off">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" id="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" style="color: #FAFAFA;" value="Login">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>