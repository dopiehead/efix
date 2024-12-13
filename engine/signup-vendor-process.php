<?php
require 'connection.php';
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect and sanitize form data
    $business_name = mysqli_real_escape_string($config, $_POST['business_name']);
    $business_email = mysqli_real_escape_string($config, $_POST['business_email']);
    $business_contact = mysqli_real_escape_string($config, $_POST['business_contact']);
    $business_password = mysqli_real_escape_string($config, $_POST['business_password']);
    $confirm_password = mysqli_real_escape_string($config, $_POST['confirm_password']);
    $business_address = mysqli_real_escape_string($config, $_POST['business_address']);
    $company_description  = mysqli_real_escape_string($config, $_POST['company_description']);
    $merchant_type  = mysqli_real_escape_string($config, $_POST['merchant_type']);
    $item_sold = mysqli_real_escape_string($config, $_POST['item_sold']);
    $verified  = mysqli_real_escape_string($config, $_POST['verified']);
    $date = date("D, F d, Y g:iA", strtotime('+1 hours'));
    $vkey = md5(time() . $business_email);
    $bank_name =  mysqli_real_escape_string($config, $_POST['bank_name']);
    $status =  mysqli_real_escape_string($config, $_POST['status']);
    $account_number =   mysqli_real_escape_string($config, $_POST['account_number']);
    $pay = 0; // default value for pay
    $secret_password = sha1($business_password);

    // Check if passwords match
    if ($business_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // API endpoint URL of the other website
    $apiUrl = "https://estores.ng/api/signup-vendor.php";

    // Prepare data to send in the API request
    $postData = [

        "business_name" => $business_name,
        "business_email" => $business_email,
        "business_contact" => $business_contact,
        "business_password" => $business_password,
        "business_address" => $business_address,
        "company_description" => $company_description,
        "merchant_type" => $merchant_type,
        "bank_name" => $bank_name,
        "account_number" =>$bank_name,
        "confirm_password" => $confirm_password,
        "item_sold" => $item_sold,
        "secret_password" => $business_password,
        "verified" => $verified,
        "date" => $date,
        "vkey" => $vkey,
        "status" => $status,
        "pay" => $pay

    ];

    // Initialize cURL
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); // JSON encode the data
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        
        'Content-Length: ' . strlen(json_encode($postData)), // set correct content length
    ]);

    // Execute the request and capture the response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL
    curl_close($ch);

    // Handle the API response
    if ($httpCode == 200) {
        // Insert data into the local database
        $sql = "INSERT INTO vendor_profile (
business_name,
business_email,
business_password,
business_type,
business_address,
business_contact,
company_description,
items_sold,
vkey,
verified,
bank_name,
account_number,
pay,
status,
date)  VALUES ('".$business_name."', 
'".$business_email."', 
'".$business_contact."',
 '".$secret_password."',
  '".$secret_password."',
  '".$business_address."', 
  '".$company_description."', 
  '".$item_sold."',
  '".$vkey."',
  '".$verified."',
  '".$bank_name."',
  '".$account_number."',
  '".$pay."',
  '".$status."',
  '".$date."')";

        if (mysqli_query($config, $sql)) {

            echo "1"; // Success response

        } else {

            echo "Database insertion failed: " . mysqli_error($config);
        }
    } else {
        echo "Failed to sign up on the other website. Response: " . htmlspecialchars($response);
    }
}
?>
