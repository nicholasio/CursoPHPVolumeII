<?php
namespace EChat\Core\Router;
use \EChat\Core\Exceptions\RouterException as RouterException;

class GETRouter extends Router{
    private $get_var;


    public function __construct(Array $params = array() ) {
        if ( empty($params) || !isset($params['GET_VAR']) ) {
            throw new RouterException("Nenhum GET_VAR definido");
        }

        $this->get_var = $params['GET_VAR'];
    }


    public function dispatch()
    {

    }
}