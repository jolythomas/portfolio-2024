<?php

$name = $_POST["name"];
$email = $_POST["email"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "ssl0.ovh.net";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = $_ENV['SMTP_USER'];
$mail->Password = $_ENV['SMTP_PASS'];

$mail->setFrom($email, $name);
$mail->addAddress("contact@jolythomas.com", "Thomas");

$mail->Subject = $sujet;
$mail->Body = $message;

$mail->send();

echo "email sent";

?>