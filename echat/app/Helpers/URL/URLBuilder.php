<?php
namespace EChat\Helpers\URL;
use EChat\Router\Router as Router;

abstract class URLBuilder {
    protected $router;

    public function __construct() {
        $this->router = null;
    }

    public function setRouter(Router $router) {
        $this->router = $router;
    }

    abstract public function doAction($action, Array $params = []);

    public function redirect($url) {
        header("Location: {$url} ");
        exit();
    }

    /*public static function getInstance($name = null) {
        if ( $name == NULL ) {
            $name = static::class;
        }

        if ( ! \EChat\Registry::contains($name) ) {
            $instance = new $name();
            \EChat\Registry::add($instance, $name);

            return $instance;
        }

        return \EChat\Registry::get($name);

    }*/
}