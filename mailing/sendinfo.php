<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();										
	$mail->Host	 = 'smtpout.secureserver.net';				
	$mail->SMTPAuth = true;							
	$mail->Username = 'info@2xpand.com';				
	$mail->Password = 'Welcome@123';					
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 465;

	$mail->setFrom('info@2xpand.com', 'Name');		
	$mail->addAddress('info@2xpand.com');
	$mail->addAddress('info@2xpand.com', 'Name');
	
	$mail->isHTML(true);								
	$mail->Subject = 'Subject';
	$mail->Body = 'HTML message body in <b>bold</b> ';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
