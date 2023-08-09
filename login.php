<?php
session_start();
require_once ('includes/dbConnect.php');
$db_handle = new DBController();
if(isset($_POST['signup'])){
    $name = $db_handle->checkValue($_POST['name']);
    $email = $db_handle->checkValue($_POST['email']);
    $number = $db_handle->checkValue($_POST['number']);
    $password = $db_handle->checkValue($_POST['password']);

    $customer_check = $db_handle->numRows("select id from customer where email = '$email'");
    if($customer_check <= 0){
        $add_customer = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `password`) VALUES ('$name','$email','$number','$password')");
        if($add_customer){
            $fetch_customer = $db_handle->runQuery("select id from customer order by id desc limit 1");
            session_start();
            $_SESSION['userid'] = $fetch_customer[0]['id'];
            echo "<script>
                    alert('帳戶創建成功');
                    window.location.href = 'index.php';
                    </script>";
        }
    } else{
        echo "<script>
                alert('您輸入的電子郵件已在我們系統中註冊過。');
                window.location.href = 'login.php';
                </script>";
    }
}

if(isset($_POST['login'])){
    $email = $db_handle->checkValue($_POST['email']);
    $password = $db_handle->checkValue($_POST['password']);

    $fetch_customer = $db_handle->runQuery("select * from customer where email = '$email' and password = '$password'");
    $fetch_customer_no = $db_handle->numRows("select * from customer where email = '$email' and password = '$password'");

    if($fetch_customer_no == 1){
        session_start();
        $_SESSION['userid'] = $fetch_customer[0]['id'];
        echo "<script>
                alert('登入成功');
                window.location.href = 'index.php';
                </script>";
    } else{
        echo "<script>
                alert('電子郵件或密碼不正確。');
                window.location.href = 'login.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Login-SignUp | Dahlia Studio</title>
    <link href="assets/css/login_style.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
    <div class="title-text">
        <div class="title login">登入表單</div>
        <div class="title signup">註冊表單</div>
    </div>
    <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">登入</label>
            <label for="signup" class="slide signup">註冊</label>
            <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <form action="#" class="login" method="post">
                <div class="field">
                    <input type="text" placeholder="電子郵件地址" name="email" required>
                </div>
                <div class="field">
                    <input type="password" placeholder="密碼" name="password" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="login" value="登入">
                </div>
                <div style="margin-top: 20px;"><a href="index.php">返回主頁</a></div>
                <div style="margin-top: 10px;"><a href="forget_pass.php" class="text-decoration-none">忘記密碼?</a></div>
                <!--<div style="margin-top: 20px;"> <a href="forget_pass.php">忘記密碼</a></div>-->
            </form>
            <form action="" class="signup" method="post">
                <div class="field">
                    <input type="text" placeholder="名稱" name="name" required>
                </div>
                <div class="field">
                    <input type="email" placeholder="電子郵件地址" name="email" required>
                </div>
                <div class="field">
                    <input type="text" placeholder="聯絡電話" name="number" required>
                </div>
                <div class="field">
                    <input type="password" placeholder="密碼" name="password" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="signup" value="註冊">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- partial -->
<script  src="assets/js/custom.js"></script>

</body>
</html>
