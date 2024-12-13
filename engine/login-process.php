<?php session_start(); 

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    // Collect and sanitize form data
    $sp_email = mysqli_real_escape_string($con, $data['sp_email']);
    $sp_password = mysqli_real_escape_string($con, $data['sp_password']);
    $secret_password = password_hash($sp_password, PASSWORD_BCRYPT);

    // API endpoint URL of the other website
    $apiUrl = "https://estores.ng/api/log-in.php";

    // Prepare data to send in the API request
    $postData = json_encode([
        "sp_email" => $sp_email,
        "sp_password" => $secret_password,
    ]);

    // Initialize cURL
    $ch = curl_init($apiUrl);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData),
    ));

    // Execute the request and capture the response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL
    curl_close($ch);

    // Handle the API response
    if ($httpCode == 200) {
           
        echo "1"; 


    } else {
        // Provide additional error details
        echo "Failed to sign in on the other website. HTTP Code: " . $httpCode . ". Response: " . htmlspecialchars($response);
    }
}
?>
