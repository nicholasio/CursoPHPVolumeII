<?php
namespace EChat\Helpers\URL;

abstract class URL {
    protected function __construct() {}

    abstract public function doAction($action, Array $params = []);
    abstract public function redirect($url);

    public static function getInstance($name = null) {
        if ( $name == NULL ) {
            $name = static::class;
        }

        if ( ! \EChat\Registry::contains($name) ) {
            $instance = new $name();
            \EChat\Registry::add($instance, $name);

            return $instance;
        }

        return \EChat\Registry::get($name);

    }
}