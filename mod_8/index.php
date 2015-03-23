<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"  />
    <title>Curso de PHP Volume II - Módulo 8</title>
</head>
<body>
<h1>Curso de PHP Volume II - Módulo 8</h1>
<?php
/**
 *  Aula 1 - Enviando e-mail com PHPMailer
 * https://github.com/PHPMailer/PHPMailer
 */
echo "<h2>Enviando e-mail com PHPMailer</h2>";
require 'phpmailer/PHPMailerAutoload.php';
require 'Mail.php';

$mail = new Mail();

$mail->addAddress('nicholas@iotecnologia.com.br', 'Nícholas André');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = '[TESTE]Enviando email com PHPMailer';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


?>
</body>
</html>