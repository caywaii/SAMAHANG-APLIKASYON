<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
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
        <div id="mem_reg" class="text" style="color: #554977;">Register</div>
        <hr class="border-3 opacity-75" style="color: #7A47EA;">
        <div id="member_regis" class="text text-center" style="color: #554977;">New Member</div>
        </br></br>
            <div class="container">
            <form method="POST" action="updateformem.php?uID=<?php echo $id; ?>">
                <div class="row g-5">
                        <div class = "container" align="center">
                            <br><br>
                            <div id="my_camera" name="camera">
        
        
        
                            </div>
                                <div id="results" style = "visibility: hidden; position: absolute;">
                            </div>
                            <button type="button" class="btn btn-success my-2 col-md-2">Save Photo</button>
                        </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="uID" class="form-control"  id="uID" placeholder="#">
                            <label for="uID">User ID</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="regdate" class="form-control" id="empid" placeholder="#" >
                            <label for="empid">Registration Date</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="maritalstatus" class="form-control" id="maritalstatus" placeholder="#" >
                            <label for="maritalstatus">Marital Status</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="date" name="birthdate" class="form-control" id="birthdate" placeholder="#" >
                            <label for="birthdate">Birthday</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="fname" class="form-control" id="firstname" placeholder="#" >
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="mname"class="form-control" id="middlename" placeholder="#" >
                            <label for="middlename">Middle Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="lname" class="form-control" id="lastname" placeholder="#" >
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="cnum" class="form-control" id="contactnum" placeholder="#" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;">
                            <label for="contactnum">Contact Number</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="username"class="form-control" id="username" placeholder="#" >
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="password" class="form-control" id="password" placeholder="#" >
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="number" name="zipcode" class="form-control" id="zipc" placeholder="#"pattern="/^-?" onKeyPress="if(this.value.length==4) return false;" >
                            <label for="zipc">Zip Code</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="occupation" class="form-control" id="occupation" placeholder="#" >
                            <label for="occupation">Occupation</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="street"  class="form-control" id="street" placeholder="#" >
                            <label for="street">Street</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="baranggay" class="form-control" id="baranggay" placeholder="#">
                            <label for="baranggay">Barrangay</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="city" class="form-control" id="city" placeholder="#" >
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md py-3">
                        <div class="form-floating">
                            <input type="text" name="province" class="form-control" id="province" placeholder="#" >
                            <label for="province">Province</label>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    
                </div>                        
                    <div class="col-md-12">
                        <a href="memregforemplo.php"> <button type="button" class="btn btn-danger my-4 col-md-1">Back</button></a>
                        <button type="submit" onclick = "saveSnap();" name="insert" class="btn button_blue my-4 col-md-1">Register</button>
                    </div> 
                </div>
            </form>
    </section>

        <!-- SCRIPT FOR CAMERA-->
        <script type="text/javascript" src="assets/webcam.min.js" > //
        
        </script>
        
        <script type="text/javascript">
        
            function configure(){
                Webcam.set({
                    width: 280,
                    height: 160,
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
                Webcam.upload(base64image, 'function.php', function(code, text){
                alert('Save Succesfully');
                document.location.herf="image.php"
                });
                
                
            }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
</body>
</html>