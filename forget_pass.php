<?php
session_start();
require_once ('includes/dbConnect.php');
$db_handle = new DBController();

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function productCode($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST['forget'])){
    $email = $db_handle->checkValue($_POST['email']);

    $fetch_customer = $db_handle->runQuery("select * from customer where email = '$email'");
    $fetch_customer_no = $db_handle->numRows("select * from customer where email = '$email'");

    $code=productCode(8);

    $email_to = $email;
    $subject = 'Email From Dhalia';

    $messege = "<!DOCTYPE html>
                <html>
                <head>
                    <title>密碼恢復</title>
                </head>
                <body style='font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;'>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse: collapse; background-color: #ffffff;'>
                        <tr>
                            <td align='center' bgcolor='#d45682' style='padding: 20px 0;'>
                                <h1 style='color: #ffffff;'>密碼恢復</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 20px;'>
                                <p>您好，</p>
                                <p>我們收到重設密碼的請求。要繼續進行密碼重設，請使用以下驗證碼：</p>
                                <p style='font-size: 18px; font-weight: bold;'>您的驗證碼： <span style='color: #d45682;'>$code</span></p>
                                <p>如果您沒有要求這個密碼重設，請忽略這封郵件。您的帳戶仍然安全。</p>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' bgcolor='#d45682' style='padding: 20px;'>
                                <p style='color: #ffffff; margin: 0;'>如有任何疑問，請聯絡我們的客戶支援團隊。</p>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

    $sender_name = "Dhalia";
    $sender_email = "business@dahliastudiohk.com";
//
    $username = "business@dahliastudiohk.com";
    $password = "Av1@@#)in12e";
//

    $receiver_email = $email_to;


    $mail = new PHPMailer(true);
    $mail->isSMTP();
//$mail->SMTPDebug = 2;
    $mail->Host = 'mail.dahliastudiohk.com';

    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'ssl';

    $mail->Port = 465;

    $mail->setFrom($sender_email, $sender_name);
    $mail->Username = $username;
    $mail->Password = $password;

    $mail->Subject = $subject;
    $mail->msgHTML($messege);
    $mail->addAddress($receiver_email);

    if($mail->send()&&$fetch_customer_no == 1){

        $fetch_customer = $db_handle->insertQuery("UPDATE `customer` SET `code`='$code' where email = '$email'");

        echo "<script>
                alert('請檢查你的電郵');
                window.location.href = 'recovery.php?email=$email';
                </script>";
    } else{
        echo "<script>
                alert('出咗啲問題，請再輸入電郵。');
                window.location.href = 'forget_pass.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Forget Password | Dahlia Studio</title>
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
                    <input type="text" placeholder="電子郵件地址" name="email" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" name="forget" value="提交">
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
