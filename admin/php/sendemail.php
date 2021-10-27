<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function send_email($resiver, $sub, $body)
{
    require 'vendor/autoload.php';
    try {

        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
                           //Enable verbose debug output
        $mail->isSMTP();          
        // $emai->SMTPSecure ='tls';                                  //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'takemeon.care@takemeon.in';                     //SMTP username
        $mail->Password   = 'Chiku@832779178';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;

        $mail->setFrom('no-reply@takemeon.in', 'Takemeon');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($resiver);               //Name is optional
        $mail->addReplyTo('takemeon.care@takemeon.in', 'Information');
        $mail->addCC('no-reply@takemeon.in');
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            return 1;
        }
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo} <br>";
      
    }
}
