<?php
include('../includes/dbConnect.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST['date'])) {

    $date = $_POST['date'];


    $dayName = date('l', strtotime($date));

    $query = '';

    if ($dayName == "Friday" || $dayName == "Wednesday") {
        $query = "SELECT * FROM timetable where offday=0";
    } else {
        $query = "SELECT * FROM timetable";
    }

    $data = $db_handle->runQuery($query);
    $row = $db_handle->numRows($query);

    ?>
    <option selected>Choose</option>
    <?php

    for ($i = 0; $i < $row; $i++) {

        $timeSlot = date('H:i', strtotime($data[$i]['time_slot']));


        $matchDate = date('Y-m-d', strtotime($_POST['date']));
        $matchTime = date('H:i:s', strtotime($data[$i]['time_slot']));

        $adminClosed = $db_handle->numRows("SELECT * FROM `closed_time` where date='$matchDate' and time='$matchTime'");

        $check_available = $db_handle->numRows("SELECT * FROM `book` where date='$matchDate' and time='$matchTime'");

        if ($adminClosed >= 1) {
        } else if ($check_available == 1) {
            ?>
            <option value="<?php echo $timeSlot; ?>" disabled style="color: #ff0018"><?php echo $timeSlot; ?></option>
            <?php
        } else {
            ?>
            <option value="<?php echo $timeSlot; ?>"><?php echo $timeSlot; ?></option>
            <?php
        }
    }
}

