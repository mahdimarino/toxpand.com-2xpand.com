<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //Server settings
$mail->SMTPDebug = SMTP::DEBUG_OFF; // Set to SMTP::DEBUG_SERVER for debugging
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'chik.lahbib@gmail.com'; // Your Gmail email address
$mail->Password = 'falastin73'; // Use your Gmail App Password here
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
$mail->Port = 587; // Port 587 for TLS


        //Recipients
        $mail->setFrom('chik.lahbib@gmail.com', $name);
        $mail->addAddress('info@2xpand.com', 'name'); // Change to your recipient's email

        //Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\n\n$message";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: index.html");
}
