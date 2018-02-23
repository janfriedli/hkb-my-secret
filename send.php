<?php
/**
 * To do configure smtp params
 * Username, Password, Host, and Port
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

if (!isset($_POST['secret'])) {
    echo 'Du musst eine Nachricht länger als 5 Zeichen eingeben';
    die;
}

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'SMTP.MYHOST.COM';
    $mail->SMTPAuth = true;
    $mail->Username = 'MYUSERNAME';
    $mail->Password = 'MYPASSWORD';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('MYFROMEMAL', 'Secret Share');
    $mail->addAddress('RECIPIENTEMAIL');

    //Content
    $mail->isHTML(false);
    $mail->Subject = 'A new Secret!';
    $mail->Body = $_POST['secret'];
    $mail->send();
    echo 'Geheimnis gespeichert';
} catch (Exception $e) {
    http_response_code(400);
    echo 'Ups, beim speichern hat was nicht geklappt!';
}