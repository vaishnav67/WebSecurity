<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
session_start();
$rndno=rand(100000, 999999);
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.mailtrap.io;';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'USER';     // SMTP username
    $mail->Password   = 'PASS';         // SMTP password
    $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 25;
    $mail->setFrom('VaishKeer@test.com', 'Name');           // Set sender of the mail
    $mail->addAddress($_POST['email']);           // Add a recipient
    $mail->isHTML(true);                                  
    $mail->Subject = 'OTP';
    $mail->Body    = "OTP: ".$rndno."";
    $mail->AltBody = "OTP: ".$rndno."";
    $mail->send();
    echo "Mail has been sent successfully!";
    $_SESSION['email']=$_POST['email'];
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['otp']=$rndno;
    header( "Location: ./otp.php" );
} catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>