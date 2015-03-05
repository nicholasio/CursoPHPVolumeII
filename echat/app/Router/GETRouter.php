<?php
namespace EChat\Router;
use \EChat\Exceptions\RouterException as RouterException;
use EChat\Helpers\URL\URLBuilder;

class GETRouter extends Router{
    private $getvalue;
    private $getvar;


    public function __construct($getvar, URLBuilder $URLBuilder ) {
        parent::__construct($URLBuilder);

        $this->getvar = $getvar;
        $this->getvalue = filter_input(INPUT_GET, $getvar );
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