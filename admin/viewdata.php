<?php
session_start();
include('../includes/dbConnect.php');
$db_handle = new DBController();


if (isset($_GET['time_id'])) {
    $time_id = $db_handle->checkValue($_GET['time_id']);

    $delete = $db_handle->insertQuery("DELETE FROM `timeslot` WHERE id='$time_id'");

    if ($delete) {
        ?>
        <script>
            alert('Remove Time');
            window.location.href = "viewdata.php?date=<?php echo $_GET['date']; ?>";
        </script>
        <?php
    }
}

if(isset($_POST['submit'])){
    $time_id = $db_handle->checkValue($_POST['id']);
    $start_time = $db_handle->checkValue($_POST['startTime']);
    $end_time = $db_handle->checkValue($_POST['endTime']);
    $date = $db_handle->checkValue($_POST['date']);

    $update = $db_handle->insertQuery("UPDATE `timeslot` SET `time_start`='$start_time',`time_end`='$end_time' WHERE id='$time_id'");

    if ($update) {
        ?>
        <script>
            alert('Update Time');
            window.location.href = "viewdata.php?date=<?php echo $date; ?>";
        </script>
        <?php
    }
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

    <title>Book List - Dahlia</title>

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

                <?php
                if (isset($_GET['edit_time_id'])) {
                    ?>
                    <div class="card shadow mb-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Change Time</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <form action="" method="post">
                                                <?php
                                                $query = "SELECT * FROM timeslot where id='{$_GET['edit_time_id']}'";
                                                $data = $db_handle->runQuery($query);
                                                ?>
                                                    <div class="row">
                                                        <div class="col-12 mb-3">
                                                            <h5>Timeslot <?php echo $_GET['pos']; ?></h5>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label>Start Time</label>
                                                            <input type="time" value="<?php echo date("H:i", strtotime($data[0]['time_start'])); ?>" class="form-control"
                                                                   name="startTime" required/>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label>End Time</label>
                                                            <input type="time" value="<?php echo date("H:i", strtotime($data[0]['time_end'])); ?>" class="form-control"
                                                                   name="endTime" required/>
                                                        </div>
                                                    </div>
                                                <input type="hidden" value="<?php echo $_GET['date']; ?>"
                                                       class="form-control" name="date" required/>
                                                <input type="hidden" value="<?php echo $_GET['edit_time_id']; ?>"
                                                       class="form-control" name="id" required/>
                                                <button type="submit" name="submit" class="btn btn-primary">Change Book
                                                    Time
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Time Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Time Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="timeTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Start time</th>
                                        <th>End time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Start time</th>
                                        <th>End time</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM timeslot where date='{$_GET['date']}'";

                                    $data = $db_handle->runQuery($query);
                                    $row_count = $db_handle->numRows($query);

                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["date"]; ?></td>
                                            <td><?php echo $data[$i]["time_start"]; ?></td>
                                            <td><?php echo $data[$i]["time_end"]; ?></td>
                                            <td class="text-center">
                                                <a href="viewdata.php?edit_time_id=<?php echo $data[$i]["id"]; ?>&date=<?php echo $data[$i]["date"]; ?>&pos=<?php echo $i + 1; ?>"
                                                   class="btn btn-info me-3">Edit</a>

                                                <a href="viewdata.php?time_id=<?php echo $data[$i]["id"]; ?>&date=<?php echo $data[$i]["date"]; ?>"
                                                   class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


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
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function () {
        $('#timeTable').DataTable();
    });
</script>
</body>

</html>
