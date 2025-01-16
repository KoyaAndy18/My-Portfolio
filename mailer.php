<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure Composer installed PHPMailer correctly

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // PHPMailer Setup
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration (for Gmail example)
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'andy.malunes03292021@gmail.com'; // Your Gmail
        $mail->Password   = 'zxdumldsqoettwdk';   // Use App Password (not your Gmail password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Content
        $mail->setFrom('andy.malunes03292021@gmail.com', 'Andy');
        $mail->addAddress('andy.malunes03292021@gmail.com'); // Receiver's Email
        $mail->addReplyTo($email, $name); // User can reply to their email

        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h1>Contact Form Submission</h1>
                         <p><strong>Name:</strong> $name</p>
                         <p><strong>Email:</strong> $email</p>
                         <p><strong>Message:</strong><br>$message</p>";

        $mail->send();
        echo 'Message has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
