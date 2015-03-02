<?php
namespace EChat\Router;
use EChat\Helpers\URL\URLBuilder as URLBuilder;

abstract class Router {
    protected $routes = [];
    protected $URLBuilder;

    public function __construct(URLBuilder $URLBuilder) {
        $this->routes = new \SplObjectStorage();
        $this->URLBuilder = $URLBuilder;
        $this->URLBuilder->setRouter($this);
    }

    public function addRoute(IRoute $route) {
        $this->routes->attach($route);
    }

    public function removeRoute(IRoute $route) {
        $this->routes->detach($route);
    }

    public function getUrlBuilder() {
        return $this->URLBuilder;
    }

    abstract public function dispatch();
}