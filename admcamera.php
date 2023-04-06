<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Picture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
    <link rel="stylesheet" href="update.css">
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
  
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body onload = "configure();" style="background: #E4E9F7;">

    <section class="member-reg">
    </br>
        <div id="mem_reg" class="text" style="color: #554977;">Employee Panel</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">Register Picture</div>
        </br></br>
            <div class="container">
                <div class="row g-5">
                        <div class = "container" align="center">
                            <br><br>
                            <div id="my_camera">
        
       
        
                            </div>
                                <div id="results" style = "visibility: hidden; position: absolute;">
                            </div>
                            <form method="POST">
                            <a type="button" name="back" href="emploreg.php?<?php echo $row['uID']?>" class="btn btn-danger my-2 col-md-2">Back</a>
                            <button type="submit" name="save" onclick = "saveSnap();" class="btn btn-success my-2 col-md-2">Save Photo</button>
                            </form>
                            
                        </div>
                        
                </div>
                
    </section>

        <!-- SCRIPT FOR CAMERA-->
        <script type="text/javascript" src="assets/webcam.min.js" > //
        
        </script>
        
        <script type="text/javascript">
        
            function configure(){
                Webcam.set({
                    width: 480,
                    height: 360,
                    image_formaat: 'jpeg',
                    jpeg_quality: 90,
                });
        
                Webcam.attach('#my_camera');
            }
        
            function saveSnap(){
                Webcam.snap(function(data_uri){
                    document.getElementById('results').innerHTML =
                    '<img id = "webcam" src="'+data_uri+'">';
                });
        
                var base64image = document.getElementById("webcam").src;
                Webcam.upload(base64image, 'functionadm.php', function(code, text){
                document.location.herf="image.php"
                });
                
                
            }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>


<?php
   include "connection.php";

if(isset($_POST['save'])){
    $_FILES["webcam"]["tmp_name"];
    $id = $_GET['uID'];
    
    
    header('location:memregforemplo.php');

    
    $tmpName = $_FILES["webcam"]["tmp_name"]; //temporaryName
    $imageName = 'img/'.date("Y.m.d").date("h.i.sa").'.jpeg'; //ImageName once Downloaded
    $filePath = $imageName; //DATABASE NAME
    move_uploaded_file($tmpName, 'img/' . $imageName);//File Path when Saved. Pictures' Destination

    $date = date("Y/m/d")."&".date("h:i:sa");
    $query = "UPDATE tblusers SET uCamCap = '$filePath' WHERE uID = '$id'"; //INSERTION
    mysqli_query($conn, $query);
}
// Check connection

?>

