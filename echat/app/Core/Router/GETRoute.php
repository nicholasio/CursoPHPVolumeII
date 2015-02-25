<?php
namespace EChat\Core\Router;
use \EChat\Core\Exceptions\RouterException as RouterException;

class GETRoute implements IRoute {
    public function __construct(Array $params ) {
        if ( empty($params) )
            throw new RouterException("Rota inválida");

        $this->setRoute($params);
    }
    public function setRoute(Array $params)
    {

    }
}