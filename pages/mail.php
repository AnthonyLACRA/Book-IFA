<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "SSL0.OVH.NET";
$mail->SMTPAuth = true;
$mail->Username = "anthony.lacrabere@stagiairesifa.fr";
$mail->Password = "19880214*";
$mail->SMTPSecure = "tls";
$mail->Port = 587;

// info du mail
$mail->setFrom("anthony.lacrabere@stagiairesifa.fr", "John Doe");
$mail->addAddress("anthony.lacrabere@stagiairesifa.fr");

$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["msg"];

echo $mail->send();

header("location:thxForMailing.php");