<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $response = '';

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['quote_details'])) {
        
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $quote_details = htmlspecialchars(trim($_POST['quote_details']));

        // Perform validation (for example, email validation)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response = 'Invalid email address.';
        } else {

            $subject = 'New Quote Request';
            $message = "Name: $name\nEmail: $email\nQuote Details: $quote_details";
            $admin_email = 'info@efix.ng'; // Replace with your admin email
            if (mail($admin_email, $subject, $message)) {
                $response = '1'; // success
            } else {
                $response = 'Error sending email.';
            }
        }
    } else {
        $response = 'All fields are required.';
    }

    // Send response back to AJAX
    echo $response;
} else {
    echo 'Invalid request method.';
}
?>
