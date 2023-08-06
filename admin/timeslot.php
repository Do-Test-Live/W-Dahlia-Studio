<?php
session_start();
include('../includes/dbConnect.php');
$db_handle = new DBController();


if (isset($_POST['submit'])) {
    $timeslots = $_POST['timeslots'];
    $date = $_POST['date'];

    foreach ($timeslots as $timeslot) {
        $startTime = $timeslot['startTime'];
        $endTime = $timeslot['endTime'];
        $inserted_at = date('Y-m-d h:i:s');


        $insert_user = $db_handle->insertQuery("INSERT INTO `timeslot`(`date`,`time_start`, `time_end`, `inserted_at`) VALUES ('$date','$startTime','$endTime','$inserted_at')");

    }

    ?>
    <script>
        alert('Timeslot added');
        window.location.href = "bookdata.php";
    </script>
    <?php
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time Slot List - Dahlia</title>

    <?php require_once 'include/css.php'; ?>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'include/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="card shadow mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Time</h6>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <form action="" method="post">
                                            <?php for ($i = 1; $i <= 8; $i++) : ?>
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <h5>Timeslot <?php echo $i; ?></h5>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label>Start Time</label>
                                                        <input type="time" class="form-control"
                                                               name="timeslots[<?php echo $i; ?>][startTime]"/>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label>End Time</label>
                                                        <input type="time" class="form-control"
                                                               name="timeslots[<?php echo $i; ?>][endTime]"/>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                            <input type="hidden" value="<?php echo $_GET['date']; ?>"
                                                   class="form-control" name="date"/>
                                            <button type="submit" name="submit" class="btn btn-primary">Add Book Time
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'include/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/js.php'; ?>
</body>

</html>
