<?php
trait Singleton {
    private static $_instance = null;

    public static function getInstance() {
        $class = __CLASS__;

        if (  self::$_instance == null ) {
            self::$_instance = new $class();
        }

        return self::$_instance;
    }
}