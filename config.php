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
define('STRIPE_API_KEY', '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');
define('STRIPE_PUBLISHABLE_KEY', 'pk_live_51NW4QhDPX938f206X5YkTIyaYOYbttSvUEhdEUjwyMiW2IwY5EtoTLZCcCbgOqW42Cd1k23gAnu8tLRI1K4oQWQH0093lY6MWw');
define('STRIPE_SUCCESS_URL', 'https://dahliastudiohk.com/payment-success.php'); //Payment success URL
define('STRIPE_CANCEL_URL', 'https://dahliastudiohk.com/payment-cancel.php'); //Payment cancel URL

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'urnejs8acqirl');
define('DB_PASSWORD', '2r#4+*%r|q66');
define('DB_NAME', 'dbyz86b8fxizhu');

