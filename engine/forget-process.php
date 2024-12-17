<?php

require 'config.php';

    if (isset($_POST['user_type'])) {
        $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $vkey = md5(time() . $email); 
        $check= null;

        if ($email == '') {

              echo "Email field is required";
        } 
          
        elseif ($user_type == 'buyer') {

             $check = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_email = '".htmlspecialchars($email)."'");  
             
             $exist = $check->num_rows;

             if($exist == 0){
                
                     echo "You are not a registered user";               
            }

            else{

                $ins = "INSERT INTO forgotten VALUES ('', '".htmlspecialchars($email)."', '".htmlspecialchars($user_type)."', '".$vkey."')";
              
                $us = mysqli_query($conn, $ins);
                if ($us) {
                     require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
                     $mail = new PHPMailer;
                     $mail->isSMTP();
                     $mail->Host = 'estores.ng'; // Replace with your SMTP host
                     $mail->Port = 465; // Ensure correct SMTP port
                     $mail->SMTPAuth = true;
                     $mail->SMTPSecure = 'ssl';
                     $mail->Username = 'info@estores.ng'; // Replace with your SMTP username
                     $mail->Password = 'j(Mr7DlV7Oog'; // Replace with your SMTP password
                     $mail->setFrom('info@estores.ng', 'estoresNG');
                     $mail->addAddress($email);
                     $mail->AddEmbeddedImage('assets/icon/logo_e_stores.png', 'pic'); // Correctly embed image using CID
                     $mail->addReplyTo('info@estores.ng');
                     $mail->isHTML(true);
                     $mail->Subject = "Password Reset";
                     $mail->Body = "
                       
                        
                     <div class='text-center'>
                         <img src='https://estores.ng/assets/icons/logo_e_stores.png' width='60' height='60'>
                     </div>
                        <br><br>
                     <div>
                         Click on the link provided to <b><a href='https://estores.ng/forget.php?vkey=".$vkey."&user_type=".$user_type."'>Change password</a></b>
                     </div>
                        
                    ";

                    if (!$mail->send()) {
                         echo "Error in sending link: " . $mail->ErrorInfo;
                    } else {
                         echo "We have sent a link to <b style='color:red;'>".$email;
                    }
                    
                  }

            }
           
         } 
                 
         elseif ($user_type == 'service provider') {

             $check =   mysqli_query($conn, "SELECT * FROM service_providers WHERE sp_email = '".htmlspecialchars($email)."'");            
              
             $exist = $check->num_rows;

             if($exist == 0){
                
                 echo "You are not a registered user";               
             }

             else {

                 $ins = "INSERT INTO forgotten VALUES ('', '".htmlspecialchars($email)."', '".htmlspecialchars($user_type)."', '".$vkey."')";
              
                 $us = mysqli_query($conn, $ins);
                 if ($us) {
                    require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
                    $mail = new PHPMailer;
                    $mail->isSMTP();
                    $mail->Host = 'estores.ng'; // Replace with your SMTP host
                    $mail->Port = 465; // Ensure correct SMTP port
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Username = 'info@estores.ng'; // Replace with your SMTP username
                    $mail->Password = 'j(Mr7DlV7Oog'; // Replace with your SMTP password
                    $mail->setFrom('info@estores.ng', 'estoresNG');
                    $mail->addAddress($email);
                    $mail->AddEmbeddedImage('assets/icon/logo_e_stores.png', 'pic'); // Correctly embed image using CID
                    $mail->addReplyTo('info@estores.ng');
                    $mail->isHTML(true);
                    $mail->Subject = "Password Reset";
                    $mail->Body = "
                       
                        
                    <div style='text-align:center'>
                        <img src='https://estores.ng/assets/icons/logo_e_stores.png' width='60' height='60'>
                        </div>
                        <br><br>
                        <div>
                            Click on the link provided to <b><a href='https://estores.ng/forget.php?vkey=".$vkey."&user_type=".$user_type."'>Change password</a></b>
                        </div>
                        
                    ";

                    if (!$mail->send()) {
                        echo "Error in sending link: " . $mail->ErrorInfo;
                    } else {
                        echo "We have sent a link to <b style='color:red;'>".$email;
                    }
                    
                  }

             }

         } 

                
           
                
                
            }
        
    

?>
