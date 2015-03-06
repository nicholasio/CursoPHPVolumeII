<?php
namespace EChat\Router;
use EChat\Helpers\URL\URLBuilder as URLBuilder;

abstract class Router {
    protected $routes = [];
    protected $URLBuilder;

    public function __construct(URLBuilder $URLBuilder)
    {
        $this->routes = new \SplObjectStorage();
        $this->URLBuilder = $URLBuilder;
        $this->URLBuilder->setRouter($this);
    }

    public function addRoute(IRoute $route)
    {
        $this->routes->attach($route);
    }

    public function removeRoute(IRoute $route)
    {
        $this->routes->detach($route);
    }

    public function getUrlBuilder()
    {
        return $this->URLBuilder;
    }

    abstract protected function checkRoute($action, $route);
    abstract protected function fetchParams();
    abstract public function getAction();

    public function dispatch()
    {
        foreach( $this->routes as $route) {
            if ( $this->checkRoute($this->getAction(), $route) )  {
                $params = $this->fetchParams();
                $class = $route->getActionClass();
                $instance = new $class;
                $instance->setParams($params);
                $instance->run();
                return;
            }
        }

        //Se chegar até aqui é porquê nenhuma rota foi definida
        throw new RouterException("Nenhuma rota definida");
    }
}