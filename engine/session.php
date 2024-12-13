<?php
session_start();

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input data
    if (isset($_POST['sp_email']) && isset($_POST['sp_password'])) {
        // Store user data in session
        $_SESSION['sp_email'] = $_POST['sp_email'];
    
        
        // Optionally, set additional session variables as needed
    }
}
?>