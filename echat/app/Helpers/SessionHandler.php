<?php
namespace EChat\Helpers;

/**
 * Class SessionHandler
 * @package EChat\Helpers
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 * Abstrar o gerenciamento de Sessions
 */
class SessionHandler {

    /**
     * @param $name
     * @param $value
     * Cria uma sessão e associa um dado valor.
     */
    public static function createSession( $name, $value ){
        $_SESSION[$name] = $value;
    }

    /**
     * Adiciona uma variável a uma sessão já criada.
     * @param $topName
     * @param $name
     * @param $value

     */
    public static function addSessionVar( $topName, $name , $value) {
        $_SESSION[$topName][$name] = $value;
    }

    /**
     * Seleciona e retorna uma session, retorna falso caso não exista
     * @param $name
     * @return mixed

     */
    public static function selectSession( $name ){
        if( self::checkSession($name) )
            return $_SESSION[$name];
        else
            return false;
    }

    /**
     * Remove uma session
     * @param $name
     */
    public static function deleteSession( $name ){
        unset( $_SESSION[$name] );
    }

    /**
     * Verifica se uma session existe
     * @param $name
     * @return bool
     */
    public static function checkSession ( $name ) {
        return isset( $_SESSION[$name] );
    }

}