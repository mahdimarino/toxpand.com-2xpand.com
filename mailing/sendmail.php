<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$issets = ["name", "email", "subject", "message"];

foreach ($issets as $ist) {
    if (!isset($_POST[$ist]) || empty($_POST[$ist])) {
        header("Location:/index.html?err=fields");
        exit();  // Use "exit()" instead of "die()" for consistency
    }
}

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host = 'smtpout.secureserver.net';                    
    $mail->SMTPAuth = true;                                   
    $mail->Username = 'info@2xpand.com';                     
    $mail->Password = 'Welcom@123';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
    $mail->Port = 465;                                    

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('info@2xpand.com', 'Web Mail');    
    
    $mail->addReplyTo($email, $name);

    //Content
    $mail->isHTML(false);                                  
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

    if (!$mail->send()) {
        // Log the error for debugging purposes
        error_log("Mailer Error: " . $mail->ErrorInfo);
        header("Location:/index.html?err=mail");
        exit();
    } else {
        header("Location:/index.html");
        exit();
    }
} catch (Exception $e) {
    // Log the exception for debugging purposes
    error_log("Exception: " . $e->getMessage());
    header("Location:/index.html?err=catch");
    exit();
}
