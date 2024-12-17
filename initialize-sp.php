<?php session_start();

require 'vendor/autoload.php';

use Yabacon\Paystack;

$paystack = new Paystack('sk_test_5625633149fa467dad07b80c7b4dae6be1ddddf7');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email =  $_POST['email'];
    $amount =  $_POST['amount'] * 100; // Convert amount to kobo

    try {
        $tranx = $paystack->transaction->initialize([
            'email' => $email,
            'amount' => $amount
        ]);

        if (!$tranx->status) {
            die('API returned error: ' . $tranx->message);
        }

        // Store the transaction reference in session (or database)
  
        
        $_SESSION['reference'] = $tranx->data->reference;

        // Redirect to Paystack payment page
        header('Location: response-sp.php' . $tranx->data->authorization_url);
        exit();

    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
} else {
    die('Invalid request method');
}
?>