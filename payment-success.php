<?php
session_start();
require_once ('includes/dbConnect.php');
$db_handle = new DBController();

require 'PHPMailer.php';
require 'SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();
// Include configuration file
require_once 'config.php';

// Include database connection file
include_once 'dbConnect.php';

$payment_id = $statusMsg = $customer_email = '';
$status = 'error';

// Check whether stripe checkout session is not empty
if (!empty($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch transaction data from the database if already exists
    $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?";
    $stmt = $db->prepare($sqlQ);
    $stmt->bind_param("s", $db_session_id);
    $db_session_id = $session_id;
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Transaction details
        $transData = $result->fetch_assoc();
        $payment_id = $transData['id'];
        $transactionID = $transData['txn_id'];
        $paidAmount = $transData['paid_amount'];
        $paidCurrency = $transData['paid_amount_currency'];
        $payment_status = $transData['payment_status'];

        $customer_name = $transData['customer_name'];
        $customer_email = $transData['customer_email'];

        $status = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        // Include the Stripe PHP library
        require_once 'stripe-php/init.php';

        // Set API key
        $stripe = new \Stripe\StripeClient(STRIPE_API_KEY);

        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = $stripe->checkout->sessions->retrieve($session_id);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $checkout_session) {
            // Get customer details
            $customer_details = $checkout_session->customer_details;

            // Retrieve the details of a PaymentIntent
            try {
                $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $paymentIntent) {
                // Check whether the payment was successful
                if (!empty($paymentIntent) && $paymentIntent->status == 'succeeded') {
                    // Transaction details
                    $transactionID = $paymentIntent->id;
                    $paidAmount = $paymentIntent->amount;
                    $paidAmount = ($paidAmount / 100);
                    $paidCurrency = $paymentIntent->currency;
                    $payment_status = $paymentIntent->status;

                    // Customer info
                    $customer_name = $customer_email = '';
                    if (!empty($customer_details)) {
                        $customer_name = !empty($customer_details->name) ? $customer_details->name : '';
                        $customer_email = !empty($customer_details->email) ? $customer_details->email : '';
                    }

                    // Check if any transaction data is exists already with the same TXN ID
                    $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?";
                    $stmt = $db->prepare($sqlQ);
                    $stmt->bind_param("s", $transactionID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $prevRow = $result->fetch_assoc();

                    if (!empty($prevRow)) {
                        $payment_id = $prevRow['id'];
                    } else {
                        $user_id = $_SESSION['userid'];
                        // Insert transaction data into the database
                        $sqlQ = "INSERT INTO transactions (customer_name,customer_email,billing_id,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())";
                        $stmt = $db->prepare($sqlQ);
                        $stmt->bind_param("ssissdsdssss", $customer_name, $customer_email, $user_id, $productName, $productID, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionID, $payment_status, $session_id);
                        $insert = $stmt->execute();

                        if ($insert) {
                            $payment_id = $stmt->insert_id;
                        }
                    }

                    $status = 'success';
                    $statusMsg = 'Your Payment has been Successful!';
                } else {
                    $statusMsg = "Transaction has been failed!";
                }
            } else {
                $statusMsg = "Unable to fetch the transaction details! $api_error";
            }
        } else {
            $statusMsg = "Invalid Transaction! $api_error";
        }
    }
} else {
    $statusMsg = "Invalid Request!";
}
?>

<?php if ($statusMsg=="Your Payment has been Successful!") {
    $fetch_customer_data = $db_handle->runQuery("select * from customer where id = '$user_id'");
    $name = $fetch_customer_data[0]['customer_name'];
    $email = $fetch_customer_data[0]['email'];
    $number = $fetch_customer_data[0]['number'];
    $package ='';
    date_default_timezone_set("Asia/Hong_Kong");
    $current_time = date("Y-m-d H:i:s");
    if($paidAmount == 180){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=1;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Mat/Singing Bowl - Single Class';
    }
    elseif ($paidAmount == 600){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 1 months'));
        $class=4;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Mat/Singing Bowl - 4 Classes (1 Month Limit)';
    }
    elseif ($paidAmount == 1488){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 3 months'));
        $class=10;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Mat/Singing Bowl - 10 Classes (3 Months Limit)';
    }
    elseif ($paidAmount == 1688){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 4 months'));
        $class=10;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Mat/Singing Bowl - 10 Classes (4 Months Limit)';
    }
    elseif ($paidAmount == 2688){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 6 months'));
        $class=20;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Mat/Singing Bowl - 20 Classes (6 Months Limit)';
    }
    elseif ($paidAmount == 200){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=1;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Aerial/Spinning - Single Class';
    }
    elseif ($paidAmount == 666){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 1 months'));
        $class=4;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Aerial/Spinning - 4 Classes (1 Month Limit)';
    }
    elseif ($paidAmount == 1588){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 3 months'));
        $class=10;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Aerial/Spinning - 10 Classes (3 Months Limit)';
    }
    elseif ($paidAmount == 1888){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 4 months'));
        $class=10;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Aerial/Spinning - 10 Classes (4 Months Limit)';
    }
    elseif ($paidAmount == 2998){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 6 months'));
        $class=20;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'Aerial/Spinning - 20 Classes (6 Months Limit)';
    }
    elseif ($paidAmount == 1988){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=100;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = 'All you can join package';
    }
    elseif ($paidAmount == 108){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=1;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = '8月體驗價 $108 / 1堂';
    }
    elseif ($paidAmount == 1600) {
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=5;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = '雙人瑜珈(一人) /5堂';
    }
    elseif ($paidAmount == 2900){
        $end_time= date('Y-m-d H:i:s', strtotime($current_time. ' + 12 months'));
        $class=5;
        $insert = $db_handle->insertQuery("INSERT INTO `class_schedule_limit`(`customer_id`, `class_number`, `purchase_date`, `end_date`, `inserted_at`) VALUES ('$user_id','$class','$current_time','$end_time','$current_time')");

        $package = '二人同行(每人)$1450 /5堂';
    }

    $email_to_1 = $customer_email; // First recipient's email address
    $email_to_2 = 'dahliastudiohk@gmail.com'; // Second recipient's email address

    $mail->isSMTP();
    $mail->Host = 'mail.dahliastudiohk.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'business@dahliastudiohk.com';
    $mail->Password = 'Av1@@#)in12e';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';

    $mail->setFrom('business@dahliastudiohk.com', 'Dahlia Studio');
    $mail->addAddress($email_to_1);  // Add first recipient's email
    $mail->addAddress($email_to_2);  // Add second recipient's email
    $mail->Subject = 'Order Confirmation from Dahlia Studio';
    $mail->isHTML(true);
    $mail->Body = "
        <html>
            <body style='background-color: #eee; font-size: 16px;'>
            <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
            
                <p style='text-align: center;color:green;font-weight:bold'>Thank you for your purchase!</p>
            
                <p style='color:black;text-align: center'>
                    Customer Name: <strong>$name</strong>
                </p>
                <p style='color:black;text-align: center'>
                    Customer Email: <strong>$email</strong>
                </p>
                <p style='color:black;text-align: center'>
                    Customer Contact Number: <strong>$number</strong>
                </p>
                <p style='color:black;text-align: center'>
                    Your Package: <strong>$package</strong>
                </p>
            </div>
            </body>
        </html>";

    if ($mail->send()) {
        echo "<script>
alert('Payment Successful! A mail with details has been sent to your email.');
window.location.href = 'index.php';
</script>";
        exit;
    } else {
        echo "Something went wrong: " . $mail->ErrorInfo;
    }
}
?>
