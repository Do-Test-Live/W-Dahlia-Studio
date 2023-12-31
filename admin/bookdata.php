<?php
session_start();
include('../includes/dbConnect.php');
$db_handle = new DBController();

if (isset($_POST['submit'])) {
    $date = $db_handle->checkValue($_POST['date']);

    $row = $db_handle->numRows("SELECT * FROM date_slot where date='$date'");

    if ($row == 0) {
        $insert_user = $db_handle->insertQuery("INSERT INTO `date_slot`( `date`) VALUES ('$date')");
        if ($insert_user) {
            ?>
            <script>
                alert('Book Time Added');
                window.location.href = "timeslot.php?date=<?php echo $date; ?>";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert('Time Already Added');
            window.location.href = "bookdata.php";
        </script>
        <?php
    }

}

if (isset($_GET['book_id'])) {
    $book_id = $db_handle->checkValue($_GET['book_id']);

    $data = $db_handle->runQuery("SELECT * FROM date_slot where id='$book_id'");

    $date = $data[0]['date'];

    $delete = $db_handle->insertQuery("DELETE FROM `date_slot` WHERE id='$book_id'");

    $delete = $db_handle->insertQuery("DELETE FROM `timeslot` WHERE date='$date'");

    if ($delete) {
        ?>
        <script>
            alert('Booked Data Release');
            window.location.href = "bookdata.php";
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

                <div class="card shadow mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Class Time</h6>
                        </div>
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="font-weight-bold text-primary text-uppercase mb-1">
                                        Select Date
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" id="date" class="form-control" name="date" required/>
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Add Book Time
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Date Slot</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Date Slot</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                $query="SELECT * FROM date_slot order by date desc";

                                $data = $db_handle->runQuery($query);
                                $row_count = $db_handle->numRows($query);

                                for ($i = 0; $i < $row_count; $i++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $data[$i]["date"]; ?></td>
                                        <td class="text-center">
                                            <a href="viewdata.php?date=<?php echo $data[$i]["date"]; ?>"
                                               class="btn btn-info me-2">View</a>

                                            <a href="bookdata.php?book_id=<?php echo $data[$i]["id"]; ?>"
                                               class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#timeTable').DataTable();
    });
</script>
</body>

</html>
