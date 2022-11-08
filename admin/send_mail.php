<?php
session_start();
include_once("../dbConfig.php");
$email = $_SESSION['email'];
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {     
    $mail->isSMTP();                                    
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '14mscit092@gmail.com';                     //SMTP username
    $mail->Password   = 'mrfwwhkuuhezcnhz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Komal Vekariya');
    $mail->addAddress($email);     //Add a recipient
 
    $message = 
    '<html> 
    <head> 
        <title>Welcome to Skyline Library</title> 
    </head> 
    <body> 
        <h1>Thank you for joining with us!</h1> 
        <table cellspacing="0" width: 100%;"> 
            <tr>Your Payment Link : </tr>
            <tr> 
                <td>http://localhost/library_management/user/payment.php?id='.$email.'</td> 
            </tr>
            <tr>
                <td>After Successful Payment You can Login Yourself!!</td>
            </tr>
        </table> 
    </body> 
    </html>'; 
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Payment Link';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    echo '
    <script>
        alert("User Request Approved Successfully!!")
        window.location.href = "admin_view_all_users.php"
</script> 
    ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}