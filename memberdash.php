<?php 
include "connection.php";

$sql = "SELECT COUNT(*) FROM tblusers WHERE uAlter ='Yes'";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);

//MEMBERS SPECIFIC TRANSACTION
$id = $_SESSION['uID'];
$sqlMembers ="SELECT * FROM tbltransdetails WHERE uID ='$id'";
$resMembers = mysqli_query($conn, $sqlMembers);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'membernav.php';
    ?>

    <section class="home">
        <div id="home" class="text">SAMAHANG PANGKABUHAYAN (CREDIT) CO-OP NG BAYAN</div>
    <div class="container" align="center">
            </br>
        <div class="main-body">
            <div class="row container">
                <div class="col-md-5">
                    <div class="container">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h2 class="card-title">Welcome <?php echo $_SESSION['uFName'];?>!</h3></br>
                                    <h6 class="card-text">You are an official Employee of Samahang Pangkabuhayan (Credit) Co-op ng Bayan</p>
                                    </br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Time and Date</h4>
                                    <span class="dig_clock" id="time"></span>
                                    <span class="dig_date" id="date"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="container">
                            <div class="row card container py-3" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h3 class="card-title">Total Members</h4>
                                    <i class="bi bi-person-badge icon"></i>
                                    <i class="bi bi-person-badge icon"></i>
                                    <i class="bi bi-person-badge icon"></i></br></br>
                                    <h4 class="card-text"><?php echo $row[0]; mysqli_close($conn);?></h4>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <hr class="border-3 opacity-75" style="color: #7A47EA;">
    <div class="container" align="center">
            </br>
    <form action="https://formsubmit.co/techypeepz@spcbph.tech" method="POST">
        <div class="main-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <div class="container">
                            <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                <div class="card-body">
                                    <h4 class="card-title">Transaction Made</h4>
                                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>MBR Code</th>
                                                <th>TRN Identity</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                 while ($row = $resMembers->fetch_assoc()) :
                                                ?>
                                            <tr>
                                                <td data-label="MBR Code"><?php echo $row['uID']; ?></td>
                                                <td data-label="Amount"><?php echo $row['transIden']; ?></td>
                                                <td data-label="Date"><?php echo $row['transDate']; ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>        
                                    </table>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!--contact form-->
                
                    <div class="col-md-6">
                        <div class="container mt-7">
                            <div class="container">
                                <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                    <div class="card-body">
                                        <h4 class="card-title">Contact Form</h4>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="Full Name" class="form-control" id="fname" value="<?php echo $_SESSION['uFName'], " ", $_SESSION['uLName'];?>" placeholder="#" readonly>
                                                <label for="fname">Full Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="MBR Code" class="form-control" id="memcode" value="<?php echo $_SESSION["uID"];?>" placeholder="#" readonly>
                                                <label for="memcode">MBR Code</label>
                                            </div>
                                        </div>
                                        <div class="col-md py-3">
                                            <div class="form-floating">
                                                <input type="text" name="Subject" class="form-control" id="subject" placeholder="#" >
                                                <label for="subject">Subject (Title of Concern)</label>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md py-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="Message" placeholder="Leave a message here" id="msg" style="height: 150px"></textarea>
                                            <label for="msg">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-md py-3">
                                        <div class="form-floating">
                                            <input type="hidden" name="_captcha" value="false">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
    <script type="text/javascript">
        $('#example').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
        $('#example1').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
        $('#example2').DataTable({
        searching: false,
        ordering: false,
        paging: false,
        info: false,
        lengthMenu: [
            [5],
            [5],
        ],
    });
    </script>
</body>
</html>