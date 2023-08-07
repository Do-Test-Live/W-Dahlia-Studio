<?php
session_start();
require_once ('includes/dbConnect.php');
$db_handle = new DBController();
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
?>

<!DOCTYPE html>
<html lang="zxx">


<head>
    <title>Slot Book | Dahlia Studio</title>
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

<div class="container">
    <form id="myForm">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Select</th>
                <th>Column 1</th>
                <th>Column 2</th>
                <!-- Add more columns as needed -->
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" class="form-check-input" name="row[]" value="1"></td>
                <td>Row 1, Column 1</td>
                <td>Row 1, Column 2</td>
                <!-- Add more cells as needed -->
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



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
    function showalert(){
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
</body>

</html>
