<?php 
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


class Mail 
{
    public function sendEmail($targetEmail, $subject, $message) {
        $mail = new PHPMailer();

        if (true) $mail->isSMTP();
        if (!true) $mail->isMail();

        $mail->Host = "SSL0.OVH.NET";
        $mail->SMTPAuth = true;
        $mail->Username = "anthony.lacrabere@stagiairesifa.fr";
        $mail->Password = "19880214*";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;

        $mail->setFrom("anthony.lacrabere@stagiairesifa.fr", "Adopte un stage");
        $mail->addAddress($targetEmail);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->CharSet = 'UTF-8';

        try {
            $mail->send();
        } catch (Exception $e) {
            $error = "Erreur envoie mail : ".$e->getMessage();
        }
    }
}
