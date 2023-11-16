<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$issets = ["name","email","subject","message"];

foreach($issets as $ist){
    if(!isset($_POST[$ist]) || empty($_POST[$ist])) {
        http_response_code(400);
        die();  // Stops Execution
    }
}

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

try {
    //Server settings for GoDaddy
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debug output
    $mail->isSMTP();
    $mail->Host = 'smtpout.secureserver.net'; // GoDaddy's SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'Info@2xpand.com'; // Your email address on GoDaddy
    $mail->Password = 'Welcome@123'; // Your email password on GoDaddy
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients and other settings
    $mail->setFrom($email, $name);
    $mail->addAddress('recipient@example.net', 'Recipient Name');
    $mail->addReplyTo($email, $name);

    // Email content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = $message;

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    http_response_code(400);
    die(); // Stops Execution
}
?>