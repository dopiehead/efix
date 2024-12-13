<?php
require 'connection.php';
require 'config.php';
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Collect and sanitize form data
    $user_name = mysqli_real_escape_string($config, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($config, $_POST['user_email']);
    $user_image = mysqli_real_escape_string($config, $_POST['user_image']);
    $user_password = mysqli_real_escape_string($config, $_POST['user_password']);
    $confirm_password = mysqli_real_escape_string($config, $_POST['confirm_password']);
    $user_phone = mysqli_real_escape_string($config, $_POST['user_phone']);
    $user_location = mysqli_real_escape_string($config, $_POST['user_location']);
    $verified  = mysqli_real_escape_string($config, $_POST['verified']);
    $date = date("D, F d, Y g:iA", strtotime('+1 hours'));
    $vkey = md5(time() . $user_email);
    $secret_password = sha1($user_password);

    // Check if passwords match
    if ($user_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // API endpoint URL of the other website
    $apiUrl = "https://estores.ng/api/signup-vendor.php";

    // Prepare data to send in the API request
    $postData = [

        "user_name" => $user_name,
        "user_email" => $user_email,
        "user_phone" => $user_phone,
        "user_location" => $user_location, 
        "confirm_password" => $confirm_password,     
        "secret_password" => $user_password,
        "verified" => $verified,
        "date" => $date,
        "vkey" => $vkey    

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
user_name,
user_email,
user_password,
user_location,
user_phone,
vkey,
verified,
joined_date
date)  VALUES (
 '".$user_name."', 
 '".$user_email."', 
 '".$secret_password."',
  '".$user_location."', 
  '".$user_phone."', 
  '".$vkey."',
  '".$verified."',
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
