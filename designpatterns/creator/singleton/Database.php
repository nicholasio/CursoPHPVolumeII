<?php

class Database  {

    //use Singleton;

    private function __construct() {
        //Realiza potenciais inicializações
    }

    //Irá armazenar a instância da classe
    private static $_instance = null;
    //Coração do singleton
    public static function getInstance() {
        if ( self::$_instance == null ) {
            self::$_instance = new Database();
        }

        return self::$_instance;
    }

}