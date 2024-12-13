<?php
require 'connection.php';
require 'config.php';

header('Content-Type: application/json');  // Set the response format to JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    // Collect and sanitize form data
    $sp_name = mysqli_real_escape_string($con, $data['sp_name']);
    $sp_img = mysqli_real_escape_string($con, ''); // Default or provide an image URL
    $sp_category = mysqli_real_escape_string($con, $data['sp_category']);
    $sp_speciality = mysqli_real_escape_string($con, $data['sp_speciality']);
    $sp_location = mysqli_real_escape_string($con, $data['sp_location']);
    $sp_email = mysqli_real_escape_string($con, $data['sp_email']);
    $sp_password = mysqli_real_escape_string($con, $data['sp_password']);
    $cpassword = mysqli_real_escape_string($con, $data['confirm_password']);
    $secret_password = password_hash($sp_password, PASSWORD_BCRYPT);
    $sp_phonenumber = mysqli_real_escape_string($con, $data['sp_phonenumber']);
    $sp_phonenumber1 = mysqli_real_escape_string($con, $data['sp_phonenumber1']);
    $pricing = mysqli_real_escape_string($con, 0); 
    $sp_experience = mysqli_real_escape_string($con, $data['sp_experience']);
    $sp_bio = mysqli_real_escape_string($con, $data['sp_bio']);
    $ratings = mysqli_real_escape_string($con, $data['sp_ratings']);
    $views = mysqli_real_escape_string($con, 0);
    $sp_verified = mysqli_real_escape_string($con, 0);
    $e_verify = mysqli_real_escape_string($con, 0);
    $bank_name = mysqli_real_escape_string($con, 0);
    $account_number = mysqli_real_escape_string($con, 0);
    $pay = mysqli_real_escape_string($con, 0);

    // Check password match
    if ($sp_password !== $cpassword) {
        echo json_encode(["error" => "Passwords do not match."]);
        exit;
    }

    // API endpoint URL of the other website
    $apiUrl = "https://estores.ng/api/signup-sp.php";

    // Prepare data to send in the API request
    $postData = [
        "sp_name" => $sp_name,
        "sp_img" => $sp_img,
        "sp_category" => $sp_category,
        "sp_speciality" => $sp_speciality,
        "sp_location" => $sp_location,
        "sp_email" => $sp_email,
        "sp_password" => $sp_password,
        "sp_phonenumber" => $sp_phonenumber,
        "sp_phonenumber1" => $sp_phonenumber1,
        "pricing" => $pricing,
        "sp_experience" => $sp_experience,
        "sp_bio" => $sp_bio,
        "sp_ratings" => $ratings,
        "views" => $views,
        "sp_verified" => $sp_verified,
        "e_verify" => $e_verify,
        "bank_name" => $bank_name,
        "account_number" => $account_number,
        "pay" => $pay
    ];

    // Initialize cURL
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen(json_encode($postData)),
    ));

    // Execute the request and capture the response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL
    curl_close($ch);

    // Handle the API response
    if ($httpCode == 200) {
        // Insert into the database
        $vkey = md5(time() . $sp_email); // Generate a unique verification key
        $date = date("D, F d, Y g:iA", strtotime('+1 hours')); // Set date

        $config = mysqli_query($conn, "INSERT INTO service_providers (
            sp_name, sp_img, sp_category, sp_speciality, sp_location, sp_email, sp_password, 
            sp_phonenumber1, sp_phonenumber2, pricing, sp_experience, sp_bio, ratings, views, 
            sp_verified, e_verify, bank_name, account_number, pay, vkey, date) 
            VALUES (
            '".$sp_name."','".$sp_img."','".$sp_category."','".$sp_speciality."','".$sp_location."','".$sp_email."',
            '".$secret_password."','".$sp_phonenumber1."','".$sp_phonenumber1."','".$pricing."','".$sp_experience."',
            '".$sp_bio."','".$ratings."','".$views."','".$sp_verified."','".$e_verify."','".$bank_name."','".$account_number."',
            '".$pay."','".$vkey."','".$date."')");

        if ($config) {
            echo json_encode(["success" => "Service provider registration successful."]);
        } else {
            echo json_encode(["error" => "Service provider registration failed."]);
        }
    } else {
        echo json_encode(["error" => "Failed to sign up on the other website. Response: " . htmlspecialchars($response)]);
    }
}
?>
