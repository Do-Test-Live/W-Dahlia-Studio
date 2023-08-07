<?php
include('includes/dbConnect.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST['date'])) {

    $date = $_POST['date'];


    $query = "SELECT * FROM timeslot where date='$date' and time_start != '00:00'";


    $data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);

    ?>
    <?php

    for ($i = 0; $i < $row; $i++) {
            $timeSlot = date('H:i', strtotime($data[$i]['time_start']));
        ?>
        <option value="<?php echo $timeSlot; ?>"><?php echo $timeSlot; ?></option>
        <?php

    }
}

