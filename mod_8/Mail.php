<?php

class Mail extends PHPMailer {

    public function __construct() {
        parent::__construct();

        $this->isSMTP();                                      // Set mailer to use SMTP
        $this->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->SMTPAuth = true;                               // Enable SMTP authentication
        $this->Username = 'nicholas@iotecnologia.com.br';                 // SMTP username
        $this->Password = '';                           // SMTP password
        $this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->Port = 587;                                    // TCP port to connect to

        $this->From = 'nicholas@iotecnologia.com.br';
        $this->FromName = 'Nícholas André';
    }
}