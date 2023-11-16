use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "chik.lahbib@gmail.com";
    $mail->Password   = "falastin73";

    $mail->IsHTML(true);
    $mail->AddAddress("info@2xpand.com", "recipient-name");
    $mail->SetFrom("chik.lahbib@gmail.com", "from-name");
    $mail->AddReplyTo($email, $name);

    $mail->Subject = $subject;
    $content = "<b>Name:</b> $name<br>";
    $content .= "<b>Email:</b> $email<br>";
    $content .= "<b>Message:</b><br>$message";

    $mail->MsgHTML($content);

    if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
    } else {
        echo "Email sent successfully";
    }
} else {
    // Handle the case where the form was not submitted
    echo "Form submission error.";
}
