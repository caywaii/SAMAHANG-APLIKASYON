<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nature of Accounts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/datetime/1.3.0/css/dataTables.dateTime.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<body>
    <?php
    include 'adminnav.php';

  if(!isset($_SESSION['admin'])){ 
     header("Location:index.php");
}


    ?>

    <section class="rprt">
            <div id="rprt" class="text">Transaction Details</div>
            <div class="datetime"><span id="date-time"> </span></div>
            <hr class="border-3 opacity-75" style="color: #7A47EA;">
            <div id="rprt" class="text text-center">Nature of Accounts</div>
                <div class="container-fluid">
                    </br></br>
                    <form action="" method="post">
                        <div class="row">
                            <div class="container">
                                <div class="container">
                                        <div class="row card container" style="background-color: #d5dff7; border-radius: 1vh;">
                                            </br></br>
                                            <table class="table" border="0" cellspacing="5" cellpadding="5">
                                                <tbody>
                                                    <tr>
                                                        <td>Minimum date:</td>
                                                        <td><input type="text" id="min" name="min"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Maximum date:</td>
                                                        <td><input type="text" id="max" name="max"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                         <tr>
                                                        <th>TD No.</th>
                                                        <th>MBR Code</th>
                                                        <th>TRN Identification</th>
                                                        <th>TRN Date</th>
                                                        <th>TRN Entry</th>
                                                        <th>ACC Code</th>
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php 
                                                         $sql = "SELECT *, tbltransdetails.uID from tbltransdetails INNER JOIN tblaccounts ON tblaccounts.accID = tbltransdetails.accID INNER JOIN tblarchive ON tblarchive.tdNum = tbltransdetails.tdNum WHERE aArchive = '0'";
                                                         $query = mysqli_query($conn, $sql);
                                                         while ($row = mysqli_fetch_array ($query)){
                                                         ?>
                                                        <tr>
                                                            <td data-label="TD No."><?php echo $row['tdNum'];?></td>
                                                            <td data-label="MBR Code"><?php echo $row['uID'];?></td>
                                                            <td data-label="TRN Identification"><?php echo $row['transIden'];?></td>
                                                            <td data-label="TRN Date"><?php echo $row['transDate'];?></td>
                                                            <td data-label="TRN Entry"><?php echo $row['transEntry'];?></td>
                                                            <td data-label="ACC Code"><?php echo $row['accCode'];?></td>
                                                            <td data-label="Debit"><?php echo $row['tdDebit'];?></td>
                                                            <td data-label="Credit"><?php echo $row['tdCredit'];?></td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                                </br></br>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.3.0/js/dataTables.dateTime.min.js"></script>
    <script>
        $('#example').DataTable({
            scrollX: true,
            scrollY: true,
            searching: true,
            ordering: true,
            paging: true,
            info: false,
            lengthMenu: [
                [10, 20, 50, 100, 150],
                [10, 20, 50, 100, 150],
            ],
        });
        var minDate, maxDate;
 
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );
         
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
         
        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
         
            // DataTables initialisation
            var table = $('#example').DataTable();
         
            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        });
    </script>
</body>
</html>