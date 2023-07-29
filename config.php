<?php

// Product Details
// Minimum amount is $0.50 US
$productName = "1小時30分鐘租場服務";
$productID = "DP12345";
$productPrice = 190;
$currency = "hkd";

/*
 * Stripe API configuration
 * Remember to switch to your live publishable and secret key in production!
 * See your keys here: https://dashboard.stripe.com/account/apikeys
 */
define('STRIPE_API_KEY', 'sk_test_51NW4QhDPX938f2066VAva2PaHRmLTTu8EJCFYz6JpTDry9Nu52ergxLoDKk1dklM9QzKXUdXGltAQREYA2tYktR6005I8btKVu');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51NW4QhDPX938f206HZX4GzW7BfkO2JRTR6fVYnxdTn7xXnxCXhVBoQMvglUCuWgJnJoXo9jeEVSBZL6XJjcLEIxo00fx0LMOHf');
define('STRIPE_SUCCESS_URL', 'https://localhost/W-Dahlia-Studio/payment-success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'https://localhost/W-Dahlia-Studio/payment-cancel.php'); //Payment cancel URL

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dahlia');

