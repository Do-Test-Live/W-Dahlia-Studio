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
    <title>Home | Dahlia Studio</title>
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
                                <a class="nav-link" href="index.php#Services">服務</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php#pricing">課堂收費及套票</a>
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
                            <li class="nav-item">
                                <a class="nav-link contact_us" href="index.php#footer_section">聯絡我們</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- SOCIAL ICONS -->
    <div class="left_icons float-left d-table" data-aos="fade-down">
        <div class="icon_content d-table-cell align-middle">
            <ul class="list-unstyled p-0 m-0">
                <li>
                    <a href="https://www.instagram.com/dahliastudio.hk/" target="_blank"><img
                                src="assets/images/insta.png"
                                style="width: 40px"/> </i></a>
                </li>
                <li>
                    <a href="https://www.facebook.com/dahliastudio.hk" target="_blank"><img
                                src="assets/images/facebook.png"
                                style="width: 40px"/></a>
                </li>
                <li>
                    <a href="https://wa.me/85298839552" target="_blank"><img src="assets/images/whatsapp.png"
                                                                             style="width: 40px"/></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- BANNER SECTION -->
    <section class="banner-section">
        <div class="container-fluid">
            <div class="row" data-aos="fade-up">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-md-left text-center">
                    <div class="banner-section-content">
                        <h1 data-aos="fade-up" class="banner-text">Dahlia - Your Modern Wellness Coach </br> 瑜伽工作室 | 致力於身心靈健康培訓 <span class="ityped"></span></h1>
                        <h4>Dahlia 提供市場上的瑜珈運動, 也會有身心靈瑜珈。</br>
                            普通的空中、wheel hatha, stretch等, 身心靈的singing bowl , sound therapy 等。 </h4>
                        <div class="btn_wrapper" data-aos="fade-up">
                            <a class="text-decoration-none getstarted_btn" href="login.php">登記</a>
                        </div>
                        <!--<a class="top-btn" href="index.php#footer_section">
                            <i class="fa-solid fa-arrow-down-long"></i>
                        </a>-->
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="banner-section-image">
                        <figure class="mb-0">
                            <img src="assets/images/banner_right_image.png" alt="">
                        </figure>
                    </div>
                </div>
            </div>
            <figure class="banner_left_top_shape left_shape mb-0">
                <img src="assets/images/banner_left_top_shape.png" alt="" class="img-fluid">
            </figure>
            <figure class="banner_left_bottom_shape left_shape mb-0">
                <img src="assets/images/banner_left_bottom_shape.png" alt="" class="img-fluid">
            </figure>
            <figure class="banner_right_top_shape right_shape mb-0">
                <img src="assets/images/banner_right_top_shape.png" alt="" class="img-fluid">
            </figure>
            <figure class="banner_right_bottom_shape right_shape mb-0">
                <img src="assets/images/banner_right_bottom_shape.png" alt="" class="img-fluid">
            </figure>
        </div>
    </section>
</div>
<!-- OUR SERVICES SECTION -->
<!--<section class="services_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="services_content">
                    <h5>Our Services</h5>
                    <h2>瑜珈班</h2>
                    <p>Dahlia 提供市場上的瑜珈運動, 也會有身心靈瑜珈。</br>
                        普通的空中、wheel hatha, stretch等, 身心靈的singing bowl , sound therapy 等。
                    </p>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
                <div class="services_box_content">
                    <div class="services_box_upper_portion">
                        <figure class="mb-0"><img src="assets/images/c3.png" alt="" class="img-fluid"></figure>
                    </div>
                    <div class="services_box_lower_portion">
                       &lt;!&ndash; <h3>Mat/Singing Bowl</h3>&ndash;&gt;
                        &lt;!&ndash;<div class="btn_wrapper">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>&ndash;&gt;
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
                <div class="services_box_content">
                    <div class="services_box_upper_portion">
                        <figure class="mb-0"><img src="assets/images/c4.png" alt="" class="img-fluid"></figure>
                    </div>
                    <div class="services_box_lower_portion">
                        &lt;!&ndash;<h3>Aerial/Spinning</h3>&ndash;&gt;
                        &lt;!&ndash;<div class="btn_wrapper">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>&ndash;&gt;
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 text-center">
                <div class="services_box_content">
                    <div class="services_box_upper_portion">
                        <figure class="mb-0"><img src="assets/images/c1.png" alt="" class="img-fluid"></figure>
                    </div>
                    <div class="services_box_lower_portion">
                        &lt;!&ndash;<h3>'All you can join' Package</h3>&ndash;&gt;
                        &lt;!&ndash;<div class="btn_wrapper">
                            <a href="#" class="text-decoration-none"><i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
                        </div>&ndash;&gt;
                    </div>
                </div>
            </div>
        </div>
        <figure class="services_left_shape left_shape mb-0">
            <img src="assets/images/services_left_shape.png" alt="" class="img-fluid">
        </figure>
    </div>
</section>-->

<section class="pricing_plans_section" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="pricing_plans_content">
                    <h5>Our Services</h5>
                    <h2>瑜珈班</h2>
                    <p>只需簡單點選課程，就能報名及付款。
                    </p>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="pricing_plans_box_content" <?php if (isset($_SESSION['userid'])) {
                ?>data-toggle="modal" data-target="#exampleModal"<?php
                } else
                {?> onclick="showalert();" <?php
                }
                ?>>
                    <div class="pricing_plans_box_upper_portion">
                        <figure class="pricing_plans_image mb-0">
                            <img src="assets/images/pricing_plan_1.png" alt="" class="img-fluid">
                        </figure>
                        <div class="pricing_plans_box_image_content">
                            <figure class="mb-0">
                                <img src="assets/images/pricing_plan_icon_1.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="pricing_plans_box_lower_portion">
                        <h3>Regular Class Price</h3>
                        <h3 style="color: #d6809c;">Mat/Singing Bowl</h3>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> Single Class
                            </div>
                            <div class="col-4">$180</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 4 Classes </br>(1 Month Limit)
                            </div>
                            <div class="col-4">$600</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 10 Classes </br>(3 Months Limit)
                            </div>
                            <div class="col-4">$1,488</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 10 Classes </br>(4 Months Limit)
                            </div>
                            <div class="col-4">$1,688</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 20 Classes </br>(6 Months Limit)
                            </div>
                            <div class="col-4">$2,688</div>
                        </div>
                        <div class="row text-center mt-3 align-items-center justify-content-center">
                            <button class="btn btn-secondary">購買</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="pricing_plans_box_content" <?php if (isset($_SESSION['userid'])) {
                ?>data-toggle="modal" data-target="#exampleModal1"<?php
                } else
                {?> onclick="showalert();" <?php
                }
                ?>>
                    <div class="pricing_plans_box_upper_portion">
                        <figure class="pricing_plans_image mb-0">
                            <img src="assets/images/pricing_plan_2.png" alt="" class="img-fluid">
                        </figure>
                        <div class="pricing_plans_box_image_content">
                            <figure class="mb-0">
                                <img src="assets/images/pricing_plan_icon_2.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="pricing_plans_box_lower_portion">
                        <h3>Regular Class Price</h3>
                        <h3 style="color: #d6809c;">Aerial/Spinning</h3>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> Single Class
                            </div>
                            <div class="col-4">$200</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 4 Classes </br>(1 Month Limit)
                            </div>
                            <div class="col-4">$666</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 10 Classes </br>(3 Months Limit)
                            </div>
                            <div class="col-4">$1,588</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 10 Classes </br>(4 Months Limit)
                            </div>
                            <div class="col-4">$1,888</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 20 Classes </br>(6 Months Limit)
                            </div>
                            <div class="col-4">$2,998</div>
                        </div>
                        <div class="row text-center mt-3 align-items-center justify-content-center">
                            <button class="btn btn-secondary">購買</button>
                        </div>

                        <!--<div class="btn_wrapper mt-3">
                            <a class="enroll_now_btn text-decoration-none" href="#">Enroll Now</a>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="pricing_plans_box_content" <?php if (isset($_SESSION['userid'])) {
                ?>data-toggle="modal" data-target="#exampleModal2"<?php
                } else
                {?> onclick="showalert();" <?php
                }
                ?>>
                    <div class="pricing_plans_box_upper_portion">
                        <figure class="pricing_plans_image mb-0">
                            <img src="assets/images/pricing_plan_3.png" alt="" class="img-fluid">
                        </figure>
                        <div class="pricing_plans_box_image_content">
                            <figure class="mb-0">
                                <img src="assets/images/pricing_plan_icon_3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="pricing_plans_box_lower_portion third_lower_portion">
                        <h3>Regular Class Price</h3>
                        <h3 style="color: #d6809c;">'All you can join' Package</h3>
                        <div class="pricing_plans_span_wrapper mt-lg-0 mt-5">
                            <span class="price">$1,988</span>
                            <span class="per_month">/per month</span>
                        </div>
                        <div class="pricing_plans_span_wrapper">
                            <span class="per_month">Unlimited to any class.</span>
                        </div>
                        <div class="row text-center mt-3 align-items-center justify-content-center">
                            <button class="btn btn-secondary">購買</button>
                        </div>

                        <!--<div class="btn_wrapper">
                            <a class="enroll_now_btn text-decoration-none" href="#">Enroll Now</a>
                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-lg-3">
                <div class="pricing_plans_box_content" <?php if (isset($_SESSION['userid'])) {
                ?>data-toggle="modal" data-target="#exampleModal3"<?php
                } else
                {?> onclick="showalert();" <?php
                }
                ?>>
                    <div class="pricing_plans_box_upper_portion">
                        <figure class="pricing_plans_image mb-0">
                            <img src="assets/images/pricing_plan_3.png" alt="" class="img-fluid">
                        </figure>
                        <div class="pricing_plans_box_image_content">
                            <figure class="mb-0">
                                <img src="assets/images/pricing_plan_icon_3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="pricing_plans_box_lower_portion third_lower_portion" style="height: 390px;">
                        <h3>8月體驗價 $108 / 1堂</h3>
                        <!--<div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 8月體驗價 </br>1堂
                            </div>
                            <div class="col-4">$108</div>
                        </div>-->

                        <!--<div class="btn_wrapper">
                            <a class="enroll_now_btn text-decoration-none" href="#">Enroll Now</a>
                        </div>-->
                        <div class="row text-center mt-3 align-items-center justify-content-center">
                            <button class="btn btn-secondary">購買</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-lg-3">
                <div class="pricing_plans_box_content" <?php if (isset($_SESSION['userid'])) {
                ?>data-toggle="modal" data-target="#exampleModal4"<?php
                } else
                {?> onclick="showalert();" <?php
                }
                ?>>
                    <div class="pricing_plans_box_upper_portion">
                        <figure class="pricing_plans_image mb-0">
                            <img src="assets/images/pricing_plan_3.png" alt="" class="img-fluid">
                        </figure>
                        <div class="pricing_plans_box_image_content">
                            <figure class="mb-0">
                                <img src="assets/images/pricing_plan_icon_3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                    <div class="pricing_plans_box_lower_portion third_lower_portion" style="height: 390px;">
                        <h3>Aerial / Spinning Duo 雙人瑜珈</h3>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 雙人瑜珈(一人) /5堂
                            </div>
                            <div class="col-4">$1,600</div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-8"><i class="fa-solid fa-check" aria-hidden="true"
                                                  style="color: #d6908c;"></i> 二人同行(每人)$1450 /5堂
                            </div>
                            <div class="col-4">$2,900</div>
                        </div>
                        <div class="row text-center mt-3 align-items-center justify-content-center">
                            <button class="btn btn-secondary">購買</button>
                        </div>

                        <!--<div class="btn_wrapper">
                            <a class="enroll_now_btn text-decoration-none" href="#">Enroll Now</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choose Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="180">
                        <label class="form-check-label">
                            Single Class $180
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="600">
                        <label class="form-check-label">
                            4 Classes (1 Month Limit) $600
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1488">
                        <label class="form-check-label">
                            10 Classes (3 Months Limit) $1,488
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1688">
                        <label class="form-check-label">
                            10 Classes (4 Months Limit) $1,688
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="2688">
                        <label class="form-check-label">
                            20 Classes (6 Months Limit) $2,688
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="purchase">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Choose Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="200" required>
                        <label class="form-check-label">
                            Single Class $200
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="666" required>
                        <label class="form-check-label">
                            4 Classes (1 Month Limit) $666
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1588" required>
                        <label class="form-check-label">
                            10 Classes (3 Months Limit) $1,588
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1888" required>
                        <label class="form-check-label">
                            10 Classes (4 Months Limit) $1,888
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="2998" required>
                        <label class="form-check-label">
                            20 Classes (6 Months Limit) $2,998
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="purchase">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Choose Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1988" required>
                        <label class="form-check-label">
                            'All you can join' $1988
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="purchase">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Choose Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="108" required>
                        <label class="form-check-label">
                            8月就再加$108/1堂
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="purchase">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Choose Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="1600" required>
                        <label class="form-check-label">
                            雙人瑜珈(一人) $1600/5堂
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="package" type="radio" value="2900">
                        <label class="form-check-label">
                            二人同行(每人)$1450- $2900/5堂
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="purchase">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- ABOUT US SECTION -->
<section class="aboutus_section" id="AboutUs">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="aboutus_image">
                    <figure class="mb-0"><img src="assets/images/aboutus_image.png" alt="" class="img-fluid"></figure>
                </div>
                <figure class="aboutus_top_shape left_shape mb-0">
                    <img src="assets/images/aboutus_top_shape.png" alt="" class="img-fluid">
                </figure>
                <figure class="aboutus_bottom_shape left_shape mb-0">
                    <img src="assets/images/aboutus_bottom_shape.png" alt="" class="img-fluid">
                </figure>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" data-aos="fade-right">
                <div class="aboutus_content">
                    <h5>About us</h5>
                    <h2>關於我們 (及團隊)</h2>
                    <h6 class="aboutus_line_wrapper">Daglia - Your modern wellness coach </br>
                        致力發展身心靈健康培訓
                    </h6>

                    <p>
                        Dahlia是一家瑜伽班品牌，致力於身心靈健康培訓，我們的目標是幫助人們達到身心靈的健康和平衡。我們提供多種瑜伽課程和計劃，旨在滿足不同人群的需求。</br></br>

                        我們的瑜伽班包括傳統的瑜伽運動和身心靈瑜伽。傳統瑜伽運動課程涵蓋了各種流派，如空中瑜伽、輪狀哈達瑜伽、拉伸瑜伽等。這些課程旨在增強身體的柔韌性、力量和平衡，同時促進身心的放鬆和冥想。</br></br>

                        而身心靈瑜伽課程則包括了聲音療法和音病碗。聲音療法是一種以聲音振動和共鳴為基礎的治療方法，可以促進身心靈的平衡和恢復。音病碗是一種特殊的音樂樂器，通過敲擊或摩擦碗邊發出聲音，這些聲音可以幫助放鬆和冥想，促進身心靈的和諧。</br></br>

                        在Dahlia，我們的瑜伽班不僅關注身體的運動和靈活性，還注重內心的平靜和自我發現。我們的教練團隊由經驗豐富且受過專業培訓的瑜伽導師組成，他們將指導您通過瑜伽實踐來提高身心靈的健康。</br></br>

                        選擇Dahlia，您將獲得一個現代化的健康教練，幫助您實現全面的身心靈健康。無論您是初學者還是有瑜伽經驗的人，我們都將為您提供一個支持和鼓勵的環境，讓您在舒適的氛圍中享受瑜伽的益處。</br></br>

                        加入Dahlia，開啟您的身心靈旅程！</p>


                    <!--<div class="btn_wrapper">
                        <a href="about.html" class="text-decoration-none get_started_btn">Get Started</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIAL SECTION -->
<div class="testimonial_section" id="Services">
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/n1.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/n2.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/n3.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/n4.png" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/1.jpeg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/2.jpeg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row text-center">
                                <div class="col-12 mb-5">
                                    <h2 style="color: #d6809c">時間表</h2>
                                </div>
                            </div>
                            <div class="testimonial_content">
                                <img src="assets/images/3.jpeg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <i class="fa-solid fa-circle-arrow-right"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <figure class="testimonial_left_shape left_shape mb-0">
            <img src="assets/images/testimonial_left_shape.png" alt="" class="img-fluid">
        </figure>
        <figure class="testimonial_right_shape right_shape mb-0">
            <img src="assets/images/testimonial_right_shape.png" alt="" class="img-fluid">
        </figure>
    </div>
</div>


<!-- BLOG POSTS SECTION -->
<!--<section class="blog_posts_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="blog_posts_content">
                    <h2>Yoga Instructor</h2>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="blog_posts_image position-relative">
                    <figure class="mb-0"><img src="assets/images/services_img_1.png" alt="" class="img-fluid"></figure>
                    <div class="blog_posts_image_content">
                        <span>VENUS</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="blog_posts_image position-relative">
                    <figure class="mb-0"><img src="assets/images/services_img_2.png" alt="" class="img-fluid"></figure>
                    <div class="blog_posts_image_content">
                        <span>MORIS</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="blog_posts_image position-relative">
                    <figure class="mb-0"><img src="assets/images/services_img_3.png" alt="" class="img-fluid"></figure>
                    <div class="blog_posts_image_content">
                        <span>VIVIAN</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="blog_posts_image position-relative">
                    <figure class="mb-0"><img src="assets/images/services_img_4.png" alt="" class="img-fluid"></figure>
                    <div class="blog_posts_image_content">
                        <span>EURIN</span>
                    </div>
                </div>
            </div>
        </div>
        <figure class="blog_posts_left_shape left_shape mb-0">
            <img src="assets/images/blog_posts_left_shape.png" alt="" class="img-fluid">
        </figure>
        <figure class="blog_posts_right_shape right_shape mb-0">
            <img src="assets/images/blog_posts_right_shape.png" alt="" class="img-fluid">
        </figure>
    </div>
</section>-->


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
