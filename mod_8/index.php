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
    include('phpmailer/PHPMailerAutoload.php');
    include('Mail.php');

    $email = new Mail();
    $email->addAddress('nicholas@iotecnologia.com.br', 'Nícholas André');
    $email->Subject = "Assunto";
    $email->Body = "Teste";
    $email->AltBody = "Alt Body";

    if ( ! $email->send() ) {
        echo "Erro: " . $email->ErrorInfo;
    } else {
        echo "Mensagem enviada";
    }



?>
</body>
</html>