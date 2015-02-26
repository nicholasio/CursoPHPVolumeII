<?php
namespace EChat\Router;

abstract class Router {
    protected $routes = [];

    public function __construct() {
        $this->routes = new \SplObjectStorage();
    }

    public function addRoute(IRoute $route) {
        $this->routes->attach($route);
    }

    public function removeRoute(IRoute $route) {
        $this->routes->detach($route);
    }

    abstract public function dispatch();
}