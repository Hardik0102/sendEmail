<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'hardik1104j@gmail.com'; 
    $mail->Password = 'ffxx gvqk ftnl wchn'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    

    
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('hardik1104j@gmail.com'); 

   
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body    = 'Name: ' . htmlspecialchars($name) . '<br>Email: ' . htmlspecialchars($email) . '<br>Message: ' . htmlspecialchars($message);

    $mail->send();
    http_response_code(200);
    echo 'Message has been sent';
} catch (Exception $e) {
    http_response_code(500);
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
