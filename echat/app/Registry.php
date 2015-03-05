<?php
namespace EChat;

/**
 * Class Registry
 * @package EChat
 */
class Registry {
    static private $_instances = [];

    public static function add($object, $name = null) {
        $name = ( !is_null($name) ) ? $name : get_class($object);
        $name = strtolower($name);

        $return = null;

        if ( isset(self::$_instances[$name]) ) {
            $return = self::$_instances[$name];
        }

        self::$_instances[$name] = $object;
        return $return;
    }

    public static function get($name) {
        if ( !self::contains($name) ) {
            throw new \Exception("Objeto não existe no registro");
        }

        return self::$_instances[$name];
    }

    public static function contains($name) {
        if ( !isset(self::$_instances[$name]) ) {
            return false;
        }

        return true;
    }

    public static function remove($name) {
        if ( self::contains($name) ) {
            unset(self::$_instances[$name]);
        }
    }
}