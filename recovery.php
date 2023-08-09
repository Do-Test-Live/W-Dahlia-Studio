<?php
session_start();
require_once ('includes/dbConnect.php');
$db_handle = new DBController();

if(isset($_POST['matchCode'])){
    $email = $db_handle->checkValue($_POST['email']);
    $code=$db_handle->checkValue($_POST['code']);

    $fetch_customer = $db_handle->runQuery("select * from customer where code='$code' and email = '$email' ");
    $fetch_customer_no = $db_handle->numRows("select * from customer where code='$code' and email = '$email'");

    if($fetch_customer_no == 1){
        echo "<script>
                alert('密碼相符');
                window.location.href = 'set_password.php?email=$email';
                </script>";
    } else{
        echo "<script>
                alert('密碼唔相符 ');
                window.location.href = 'recovery.php?email=$email';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Recovery Password | Dahlia Studio</title>
    <link href="assets/css/login_style.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
    <div class="title-text">
        <div class="title login">忘記密碼</div>
    </div>
    <div class="form-container">
        <div class="form-inner">
            <form action="" class="forget" method="post">
                <div class="field">
                    <input type="text" placeholder="密碼 " name="code" required>
                    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="matchCode" value="提交">
                </div>
                <div style="margin-top: 20px;"><a href="index.php">返回主頁</a></div>
            </form>
        </div>
    </div>
</div>
<!-- partial -->
<script  src="assets/js/custom.js"></script>

</body>
</html>
