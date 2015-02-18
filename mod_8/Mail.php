<?php


class Mail extends PHPMailer {
    public function __construct() {
        parent::__construct();


        $this->isSMTP();
        $this->Host = 'smtp.gmail.com';
        $this->SMTPAuth = true;
        $this->Username = 'nicholas@iotecnologia.com.br';
        $this->Password = 'SUA SENHA';
        $this->SMTPSecure = 'tls';
        $this->Port = 587;

        $this->From = 'from@example.com';
        $this->FromName = 'Mailer';

        $this->isHTML(true);
    }
}