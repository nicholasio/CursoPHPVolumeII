<?php
namespace EChat;

/**
 * Um Registro para a aplicação
 * @package EChat
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 */
class Registry {

    /**
     * @var array
     * Armazena as instâncias colocadas no registro
     */
    static private $_instances = [];

    /**
     * Adiciona um objeto ao registro, se um nome não for passado, será usado o nome da classe
     * @param $object
     * @param null $name
     * @return mixed
     */
    public static function add($object, $name = null)
    {
        $name = ( !is_null($name) ) ? $name : get_class($object);
        $name = strtolower($name);

        $return = null;

        if ( isset(self::$_instances[$name]) ) {
            $return = self::$_instances[$name];
        }

        self::$_instances[$name] = $object;
        return $return;
    }

    /**
     *  Retorna um objeto do Registro, lança uma exceção caso não exista
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public static function get($name)
    {
        if ( !self::contains($name) ) {
            throw new \Exception("Objeto não existe no registro");
        }

        return self::$_instances[$name];
    }

    /**
     * Verifica se um dado objeto existe no registro
     * @param $name
     * @return bool
     */
    public static function contains($name)
    {
        if ( !isset(self::$_instances[$name]) ) {
            return false;
        }

        return true;
    }

    /**
     * Remove um objeto do registro
     * @param $name
     */
    public static function remove($name)
    {
        if ( self::contains($name) ) {
            unset(self::$_instances[$name]);
        }
    }
}