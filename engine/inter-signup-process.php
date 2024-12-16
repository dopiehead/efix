<?php

require ('config.php');

    // Collect and sanitize form data
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_image = mysqli_real_escape_string($conn, 0);
    $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $user_phone = mysqli_real_escape_string($conn, 0);
    $user_location = mysqli_real_escape_string($conn, $_POST['user_location']);
    $verified  = mysqli_real_escape_string($conn, $_POST['verified']);
    $date = date("D, F d, Y g:iA", strtotime('+1 hours'));
    $vkey = md5(time() . $user_email);
    $secret_password = password_hash($user_password, PASSWORD_BCRYPT);

    // Check if passwords match
    if ($user_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    elseif(empty($user_name.$user_email.$user_password.$user_phone.$user_location)){
        echo "All fields are required.";
    }


    elseif($user_name ==""){
        echo "User name is required.";
    }


    elseif($user_password ==""){
        echo "User password is required.";
    }

   
    
    elseif($user_email ==""){
        echo "User password is required.";
    }


    elseif($user_phone ==""){
        echo "Phone number is required.";
    }


    // elseif(filter_var($user_email,FILTER_VALIDATE_EMAIL)){
    //     echo "Email format is not valid.";  
    // }

    else{

    $sql = "INSERT INTO user_profile (
user_name,
user_email,
user_password,
user_location,
user_phone,
vkey,
verified,
joined_date)  VALUES (
 '".$user_name."', 
 '".$user_email."', 
 '".$secret_password."',
  '".$user_location."', 
  '".$user_phone."', 
  '".$vkey."',
  '".$verified."',
  '".$date."')";

        if (mysqli_query($conn, $sql)) {

            echo "1"; // Success response

        } else {

            echo "Database insertion failed: " . mysqli_error($conn);
        }

    }

?>
