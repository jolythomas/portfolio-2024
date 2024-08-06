<?php

$name = $_POST["name"];
$email = $_POST["email"];
$sujet = $_POST["sujet"];
$message = $_POST["message"];

require "vendor/autoload.php";

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$smtpUser = $_ENV['SMTP_USER'];
$smtpPass = $_ENV['SMTP_PASS'];

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "ssl0.ovh.net";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = $smtpUser;
$mail->Password = $smtpPass;

$mail->setFrom($email, $name);
$mail->addAddress("contact@jolythomas.com", "Thomas");

$mail->Subject = $sujet;
$mail->Body = $message;

$mail->send();

header("Location: /");
exit();

?>