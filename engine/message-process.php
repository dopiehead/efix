<?php
require 'configure.php'; // Assuming this file contains database connection details
// Escape and sanitize input data
$sender_email = mysqli_real_escape_string($conn, $_POST['sentby']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$compose = mysqli_real_escape_string($conn, $_POST['message']);
$receiver_email = mysqli_real_escape_string($conn, $_POST['sentto']);

// Validate input
if (empty($compose)) {
    echo "Message field is required";
} elseif (empty($subject)) {
    echo "Subject field is required";
} else {
    // Insert data into database
    $insert_query = "INSERT INTO messages 
                     (sender_email, name, subject, compose, receiver_email, date)
                     VALUES 
                     ('".htmlspecialchars($sender_email)."', '".htmlspecialchars($name)."', '".htmlspecialchars($subject)."', '".htmlspecialchars($compose)."', '".htmlspecialchars($receiver_email)."', NOW())";

    $result = mysqli_query($conn, $insert_query);

     if ($result) {
        
        // Send email using PHPMailer
        require '../PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

     $mail= new PHPMailer;

     $mail->SMTPDebug = 0;  
                    // Enable verbose debug output
     $mail->isSMTP();   
                                             // Send using SMTP
     $mail->Host='estores.ng';

     $servername="localhost";
  
     $mail->Port=465;

     $mail->SMTPAuth=true;

     $mail->SMTPSecure='ssl';

     $mail->Username='info@estores.ng';

     $mail->Password="j(Mr7DlV7Oog";

     $mail->setFrom('info@estores.ng','estores.ng');

     $mail->addAddress($receiver_email);
        
     $mail->addReplyTo('info@estores.ng');
        

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->MsgHTML("
            <html>
            <head>
                <style>
             #img{text-align:center;}
            .btn{}

                </style>
            </head>
            <body>
                <div id='img'>
                    <img src='https://estores.ng/assets/icons/logo_e_stores.png' alt='Logo' height='50' width='50'>
                </div>
                <br><br>
                <div>
                    You have a message from <b>".$name."</b> regarding <b>".$subject."</b>
                </div>
                <br><br>
                <div>
                    ".$compose."
                    
                </div>
                <br><br>
                <div>
                 <a href='https://estores.ng/chat.php?user_name=$sender_email'  class='form-control'>Login to view message</a>
                </div>
            </body>
            </html>
        ");

       
if (!$mail->send()) {$error ="Error in sending link".$mail->ErrorInfo;
  
 echo$error; 
  
}

else{
  echo"1";
}


    }
}

?>
