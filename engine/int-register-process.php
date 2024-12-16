<?php
    require ('config.php');
    $data = $_POST; 
    $sp_name = mysqli_real_escape_string($conn, $data['sp_name']);
    $sp_img = mysqli_real_escape_string($conn, ''); // Default or provide an image URL
    $sp_category = mysqli_real_escape_string($conn, $data['sp_category']);
    $sp_speciality = mysqli_real_escape_string($conn, $data['sp_speciality']);
    $sp_location = mysqli_real_escape_string($conn, $data['sp_location']);
    $sp_email = mysqli_real_escape_string($conn, $data['sp_email']);
    $sp_password = mysqli_real_escape_string($conn, $data['sp_password']);
    $cpassword = mysqli_real_escape_string($conn, $data['confirm_password']);
    $secret_password = password_hash($sp_password, PASSWORD_BCRYPT);
    $sp_phonenumber = mysqli_real_escape_string($conn, $data['sp_phonenumber']);
    $sp_phonenumber1 = mysqli_real_escape_string($conn, $data['sp_phonenumber1']);
    $pricing = mysqli_real_escape_string($conn, 0); 
    $sp_experience = mysqli_real_escape_string($conn, $data['sp_experience']);
    $sp_bio = mysqli_real_escape_string($conn, $data['sp_bio']);
    $ratings = mysqli_real_escape_string($conn, $data['sp_ratings']);
    $views = mysqli_real_escape_string($conn, 0);
    $sp_verified = mysqli_real_escape_string($conn, 0);
    $e_verify = mysqli_real_escape_string($conn, 0);
    $bank_name = mysqli_real_escape_string($conn, 0);
    $account_number = mysqli_real_escape_string($conn, 0);
    $pay = mysqli_real_escape_string($conn, 0);
    $status = mysqli_real_escape_string($conn, 0);

    
    // Check password match
    if ($sp_password !== $cpassword) {
        echo "Passwords do not match.";
        exit;
    }

    elseif(empty( $sp_name.$sp_password.$cpassword. $sp_category. $sp_speciality. $sp_location.   $sp_email.  $sp_experience. $sp_bio.  $sp_phonenumber )) {
     echo "All fields are required";
    }

    elseif($sp_name=='') {
        echo "Name is required";
    }

    elseif($sp_password=='') {
      echo "Password is required";

    }

    elseif($cpassword=='') {
        echo "Kindly confirm your password";
    }


    elseif($sp_category=='') {

        echo "Kindly select a category";
    }


    elseif($sp_speciality=='') {

        echo "Kindly select a speciality";
    }


    elseif($sp_location=='') {

        echo "Kindly choose a location";
    }


    elseif($sp_email=='') {
        
        echo "Email address is required";
        
    }

    elseif( $sp_experience=='') {
        
        echo " Experience is required";
        
    }


    elseif( $sp_bio=='') {
        
        echo " bio is required";
        
    }


    elseif( $sp_phonenumber=='') {
        
        echo "Phone number is required";
        
    }

    else{
        $vkey = md5(time() . $sp_email); // Generate a unique verification key
        $date = date("D, F d, Y g:iA", strtotime('+1 hours')); // Set date

        $config = mysqli_query($conn, "INSERT INTO service_providers (
            sp_name, sp_img, sp_category, sp_speciality, sp_location, sp_email, sp_password, 
            sp_phonenumber1, sp_phonenumber2, pricing, sp_experience, sp_bio, ratings, views, 
            sp_verified, e_verify, bank_name, account_number, pay, status, vkey, date) 
            VALUES (
            '".$sp_name."','".$sp_img."','".$sp_category."','".$sp_speciality."','".$sp_location."','".$sp_email."',
            '".$secret_password."','".$sp_phonenumber1."','".$sp_phonenumber1."','".$pricing."','".$sp_experience."',
            '".$sp_bio."','".$ratings."','".$views."','".$sp_verified."','".$e_verify."','".$bank_name."','".$account_number."',
            '".$pay."','".$status."','".$vkey."','".$date."')");

            if($config){
                echo"1";
            }

            else{
                echo mysqli_error($con);
            }
    }
?>