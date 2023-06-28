<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

$name = htmlspecialchars($name);
$phone = htmlspecialchars($phone);
$email = htmlspecialchars($email);

$name = urldecode($name);
$phone = urldecode($phone);
$email = urldecode($email);

$name = trim($name);
$phone = trim($phone);
$email = trim($email);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.mail.ru";
$mail->CharSet = 'UTF-8';
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "budu-mamoi-email@mail.ru";
$mail->Password = "1!bu@du!ma@moi!em@ail!2";
$mail->setfrom("budu-mamoi-email@mail.ru");
$mail->Subject = "Подарок для: ".$name;
$mail->Body = "ФИО: ".$name."<br> Телефон: ".$phone."<br> Email: ".$email;
$mail->addaddress("wmsangel@gmail.com");

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
