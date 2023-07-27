<?php
session_start();
include('../includes/dbConnect.php');
$db_handle = new DBController();

if(isset($_POST['submit'])){
    $time=$db_handle->checkValue($_POST['time']);
    $id=$db_handle->checkValue($_POST['id']);

    $insert_user = $db_handle->insertQuery("UPDATE `timetable` SET `time_slot`='$time' WHERE id='$id'");
    if($insert_user){
        ?>
        <script>
            alert('Update Time Slot');
            window.location.href="changetime.php";
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

    <title>Change Time Data - Dahlia</title>

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
                    if(isset($_GET['book_id'])){
                        $data = $db_handle->runQuery("SELECT * FROM timetable where id={$_GET['book_id']}");
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Change Time</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-weight-bold text-primary text-uppercase mb-1">
                                                Change Time
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label>Time</label>
                                                        <input type="time" class="form-control" name="time" id="time" value="<?php echo $data[0]["time_slot"]; ?>"  required>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $data[0]["id"]; ?>" required/>
                                                    <button type="submit" name="submit" class="btn btn-primary">Change Time
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }else{
                        ?>
                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Change Time Data</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Change Time Data</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        $data = $db_handle->runQuery("SELECT * FROM timetable order by id asc");
                                        $row_count = $db_handle->numRows("SELECT * FROM timetable order by id asc");
                                        for ($i = 0; $i < $row_count; $i++) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i + 1; ?></td>
                                                <td><?php echo $data[$i]["time_slot"]; ?></td>
                                                <td class="text-center"><a
                                                        href="changetime.php?book_id=<?php echo $data[$i]["id"]; ?>"
                                                        class="btn btn-primary">Change</a></td>
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

</body>

</html>
