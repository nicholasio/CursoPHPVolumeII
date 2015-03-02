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
}