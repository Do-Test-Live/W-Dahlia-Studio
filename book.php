<?php
session_start();
require_once('includes/dbConnect.php');
$db_handle = new DBController();
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
date_default_timezone_set("Asia/Hong_Kong");

if(isset($_POST['book'])){
    $date=$_POST['date'];
    $time=$_POST['time'];
    $userid = $_SESSION['userid'];
    $current_time = date("Y-m-d H:i:s");

    $fetch_total_class = $db_handle->runQuery("select `class_number` from `class_schedule_limit` where `customer_id` = '$userid'");
    $total_class = $fetch_total_class[0]['class_number'];
    if($total_class > 0){
        $insert_user = $db_handle->insertQuery("INSERT INTO `booked_schedule`(`customer_id`, `booked_date`, `booked_time`, `inserted_at`) VALUES ('$userid','$date','$time','$current_time')");
        if ($insert_user) {
                $update_class = $total_class - 1;
                $update_total_time = $db_handle->insertQuery("UPDATE `class_schedule_limit` SET `class_number`='$update_class',`updated_at`='$current_time' WHERE `customer_id` = '$userid'");
                if($update_total_time){
                    ?>
                    <script>
                        alert('Book Time Added');
                        window.location.href = "book.php";
                    </script>
                    <?php
                }
        }
    }else{
        echo "<script>
        alert('All your slots are booked');
        window.location.href = 'book.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>Book Slot | Dahlia Studio</title>
    <!-- /SEO Ultimate -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../ms-icon-144x144.html">
    <meta name="theme-color" content="#ffffff">
    <!-- Latest compiled and minified CSS -->
    <link href="assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/bootstrap.min.js">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="assets/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- StyleSheet link CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/mediaqueries.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom-style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/special-classes.css" rel="stylesheet" type="text/css">
    <link href="assets/unpkg.com/aos%402.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
</head>

<body>
<div class="banner-section-outer">
    <header>
        <div class="main_header">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <a class="navbar-brand" href="index.php">
                        <figure class="mb-0"><img src="assets/images/yogastic_logo.png" class="logosize" alt="">
                        </figure>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">首頁</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#AboutUs">關於我們</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#Services">課程時間表</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#pricing">課堂收費及套票</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="details.php">最新優惠</a>
                            </li>
                            <?php
                            if(isset($_SESSION['userid'])){
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="book.php">會員中心</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">登出</a>
                                </li>
                                <?php
                            } else{
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">登入/註冊</a>
                                </li>
                                <?php
                            }
                            ?>
                            <!--<li class="nav-item">
                                <a class="nav-link contact_us" href="index.php#footer_section">聯絡我們</a>
                            </li>-->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
</div>


<section class="pricing_plans_section" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="pricing_plans_content">
                    <h5>Book Time</h5>
                    <p>
                        <?php
                        $class = 0;
                        $query = "SELECT * FROM `class_schedule_limit` where customer_id='$userid'";
                        $data = $db_handle->runQuery($query);
                        $row = $db_handle->numRows($query);
                        if ($row > 0) {
                            $class = $data[0]['class_number'];
                        }
                        ?>
                        You have <?php echo $class; ?> book left in your account.
                    </p>
                </div>
                <?php
                if ($class > 0) {
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label>Date <span class="text-danger">*</span></label>
                                <input class="form-control mt-1" id="date" name="date" onchange="detectTime(this.value)"
                                       type="date" required/>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Start Time <span class="text-danger">*</span></label>
                                <select class="form-control mt-1" id="time" name="time" required>
                                    <option>Select Date First</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button class="btn btn-primary" name="book" type="submit">Book</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
                ?>

                <table class="table mt-5" width="100%">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Date</th>
                        <th scope="col">Book Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $fetch_customer_data = $db_handle->runQuery("select * from booked_schedule where customer_id = '$userid'");
                    $row = $db_handle->numRows("select * from booked_schedule where customer_id = '$userid'");
                    for($i=0;$i<$row;$i++){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i+1; ?></th>
                            <td><?php echo $fetch_customer_data[$i]['booked_date']; ?></td>
                            <td><?php echo $fetch_customer_data[$i]['booked_time']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER SECTION -->
<section class="footer-section" id="footer_section" style="margin-top: 0 !important;">
    <div class="container">
        <div class="middle-portion">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="about_col">
                        <h4>關於我們</h4>
                        <ul class="list-unstyled">
                            <li>
                                <p>🌿 Dahlia - Your Modern Wellness Coach </br>
                                    瑜伽工作室，致力於身心靈健康培訓，</br>幫助人們達到身心靈的健康和平衡。🌿</p>
                            </li>
                            <li class="icons"><a href="https://www.instagram.com/dahliastudio.hk/"><img
                                            src="assets/images/insta.png" style="width: 40px"/></a></li>
                            <li class="icons"><a href="https://www.facebook.com/dahliastudio.hk"><img
                                            src="assets/images/facebook.png" style="width: 40px"/></a></li>
                            <li class="icons"><a href="https://wa.me/85298839552" target="_blank"><img
                                            src="assets/images/whatsapp.png"
                                            style="width: 40px"/></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 d-md-block d-none">
                    <div class="links_col">
                        <h4>快速鏈接</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a href="index.php">首頁</a>
                            </li>
                            <li>
                                <a href="index.php#AboutUs">關於我們</a>
                            </li>
                            <li>
                                <a href="index.php#Services">服務</a>
                            </li>
                            <li>
                                <a class="nav-link" href="https://wa.me/+85298839552" target="_blank">登記</a>
                            </li>
                            <!--<li>
                                <a  href="index.php#Pricing">Pricing</a>
                            </li>
                            <li>
                                <a href="#">Contact Us</a>
                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 d-block mt-5 mt-lg-0">
                    <div class="contact_col">
                        <h4>聯絡我們</h4>
                        <ul class="list-unstyled">
                            <li class="contact_icons">
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+85298839552" class="text-decoration-none">+852 9883 9552</a>
                            </li>
                            <li class="contact_icons">
                                <i class="fa-sharp fa-solid fa-envelope"></i>
                                <a href="mailto:dahliastudiohk@gmail.com" class="text-decoration-none">dahliastudiohk@gmail.com</a>
                            </li>
                            <li class="mb-0">
                                <i class="fa-solid fa-location-dot location"></i>
                                <span>尖沙咀，廣東道116-118號，</br>海威商業中心15樓 (鄰近尖沙咀 Apple Store)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-portion">
        <div class="copyright col-xl-12">
            <p>Copyright 2022, Dahlia Studio All Rights Reserved.</p>
        </div>
    </div>
    <div class="footer_shape right_shape">
        <figure class="mb-0"><img src="assets/images/footer_shape.png" alt="" class="img-fluid"></figure>
    </div>
</section>
<!-- Latest compiled JavaScript -->

<script>
    function showalert() {
        alert('請先登入或註冊以預約時段');
        window.location.href = 'login.php';
    }
</script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/video-popup.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/unpkg.com/aos%402.3.1/dist/aos.js"></script>
<script src="assets/js/video-section.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/unpkg.com/ityped@0.0.10"></script>
<script src="assets/js/type.js"></script>
<script src="assets/js/custom.js"></script>
<script>
    function detectTime(val) {
        let time = document.getElementById('time');
        removeOptions(time);

        $.ajax({
            url: "checkavailabletime.php",
            type: "POST",
            data: {
                date: val
            },
            cache: false,
            success: function (result) {
                $("#time").html(result);
            }
        });
    }

    function removeOptions(selectElement) {
        let i, L = selectElement.options.length - 1;
        for (i = L; i >= 0; i--) {
            selectElement.remove(i);
        }
    }

    document.getElementById("date").min = String(new Date().getFullYear()) + "-" + ('0' + String(parseInt(new Date().getMonth() + 1))).slice(-2) + "-" + ('0' + String(new Date().getDate())).slice(-2);

    let today = new Date().toISOString().slice(0, 16);
</script>
</body>

</html>
