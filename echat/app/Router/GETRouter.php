<?php
namespace EChat\Router;
use \EChat\Exceptions\RouterException as RouterException;
use EChat\Helpers\URL\URLBuilder;

class GETRouter extends Router{
    private $getvalue;
    private $getvar;


    public function __construct(Array $params = array(), URLBuilder $URLBuilder ) {
        parent::__construct($URLBuilder);

        if ( empty($params) || !isset($params['GET_VAR']) ) {
            throw new RouterException("Nenhum GET_VAR definido");
        }

        $this->getvar = $params['GET_VAR'];
        $this->getvalue = filter_input(INPUT_GET, $params['GET_VAR'] );
    }

    public function getGetVar() { return $this->getvar; }
    public function getGetValue() { return $this->getvalue; }

    public function fetchGetParams( ) {
        if ( ! empty($_GET) ) {
            $params = $_GET;

            if ( isset($params[$this->getvar]))
                unset($params[$this->getvar]);

            foreach($params as $key => &$param) {
                $param = filter_var($param, FILTER_SANITIZE_STRING);
            }

            return $params;
        }

        return array();
    }

    public function dispatch()
    {
        foreach( $this->routes as $route) {
            if ( in_array($this->getvalue, $route->getActionsKey()) ) {
                $params = $this->fetchGetParams();
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