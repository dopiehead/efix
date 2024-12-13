<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require ('config.php');
$user_email = mysqli_escape_string($conn,$_POST['user_email']);
$user_password = mysqli_escape_string($conn,$_POST['user_password']);
$user_type = mysqli_escape_string($conn,$_POST['user_type']);
$condition = "";
$secret_password = password_hash($user_password, PASSWORD_BCRYPT); // This is still used to hash the input, but now you'll verify hashes stored in the database.

if (empty($user_email . $user_password)) {
    echo "All fields are required";
}
elseif ($user_email == '') {
    echo "Email field is required";
}
elseif ($user_password == '') {
    echo "Password field is required";
}
else {
    //login as a buyer
    if ($user_type == 'buyer') {
        $condition = "select * from user_profile where user_email = '".$user_email."' and verified = 1";
        $bbc = mysqli_query($conn,$condition);
        $result = $bbc->num_rows;
        if ($result > 0) { 
            while ($row = mysqli_fetch_array($bbc)) {
                // Verify the password
                if (password_verify($user_password, $row['user_password'])) {
                    $_SESSION["id"] = $row['id'];
                    $_SESSION["email"] = $row['user_email'];
                    $_SESSION["name"] = $row['user_name'];
                    $_SESSION["location"] = $row['user_location'];
                    $_SESSION["phone"] = $row['user_phone'];
                    $_SESSION['date'] = $row['joined_date'];
                    $_SESSION['image'] = __DIR__.$row['user_image'];
                    echo "1";  
                } else {
                    echo "Incorrect login details"; // Password is incorrect
                }
            }
        }
        else {
            echo "Incorrect login details"; // No user found
        }
    }

    //login as a service provider
    if ($user_type == 'service_provider') {
        $condition = "select * from service_providers where sp_email = '".$user_email."' and sp_verified = 1";
        $sbc = mysqli_query($conn,$condition);
        $result = $sbc->num_rows;
        if ($result > 0) { 
            while ($row = mysqli_fetch_array($sbc)) {
                // Verify the password
                if (password_verify($user_password, $row['sp_password'])) {
                    $_SESSION["sp_id"] = $row['sp_id'];
                    $_SESSION["sp_email"] = $row['sp_email'];
                    $_SESSION["sp_name"] = $row['sp_name'];
                    $_SESSION['sp_date'] = $row['date'];
                    $_SESSION['sp_phonumber1'] = $row['sp_phonumber1'];
                    $_SESSION['sp_phonumber2'] = $row['sp_phonumber2'];
                    $_SESSION['sp_location'] = $row['sp_location'];
                    $_SESSION['sp_image'] = __DIR__.$row['sp_img'];
                    echo "1";  
                } else {
                    echo "Incorrect login details"; // Password is incorrect
                }
            }
        }
        else {
            echo "Incorrect login details"; // No user found
        }
    }

    //login as an admin
    if ($user_type == 'admin') {
        $condition = "select * from admin where admin_email = '".$user_email."'";
        $sbc = mysqli_query($conn,$condition);
        $result = $sbc->num_rows;
        if ($result > 0) { 
            while ($row = mysqli_fetch_array($sbc)) {
                // Verify the password
                if (password_verify($user_password, $row['admin_password'])) {
                    $_SESSION["admin_id"] = $row['admin_id'];
                    $_SESSION["admin_email"] = $row['admin_email'];
                    $_SESSION['admin_date'] = $row['admin_date'];
                    $_SESSION['admin_password'] = $row['admin_password'];
                    echo "1";  
                } else {
                    echo "Incorrect login details"; // Password is incorrect
                }
            }
        }
        else {
            echo "Incorrect login details"; // No user found
        }
    }
}
?>
