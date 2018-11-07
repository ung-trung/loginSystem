<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include_once('PHPMailer/PHPMailer.php');
include_once('PHPMailer/SMTP.php');
include_once('PHPMailer/Exception.php');

$mail = new PHPMailer;

$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "agileloginsystem@gmail.com";
$mail->Password = "Trung123";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

$mail->From = "agileloginsystem@gmail.com";
$mail->FromName = "Python Game IO";

$mail->smtpConnect(
    array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
        )
    )
);
?>