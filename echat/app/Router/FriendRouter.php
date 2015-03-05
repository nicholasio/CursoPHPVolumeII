<?php
namespace EChat\Router;
use EChat\Exceptions\RouterException;
use EChat\Helpers\URL\URLBuilder;

class FriendRouter extends Router{

    private $url;
    private $getvar;

    public function __construct($getvar, URLBuilder $URLBuilder) {
        parent::__construct($URLBuilder);

        $this->getvar = $getvar;
        $this->url = filter_input(INPUT_GET, $getvar);
    }

    private function fetchParams($url_parts) {
        $params = [];
        if ( ! empty($url_parts) ) {
            if ( (count($url_parts) - 1) % 2 != 0 ) {
                throw new RouterException("URL Mal formada");
            }


            for($i = 1; $i< count($url_parts); $i+=2) {
                $params[$url_parts[$i]] = $url_parts[$i+1];
            }
        }

        return $params;
    }

    public function dispatch()
    {

        $action = '';
        $params = [];
        if ( ! empty($this->url) ) {
            if ( $this->url[strlen($this->url)-1] == '/' )
                $this->url = substr(0, strlen($this->url) -1);

            $url_parts = explode('/', $this->url);

            $action = $url_parts[0];
            $params = $this->fetchParams($url_parts);
        }


        foreach( $this->routes as $route) {
            if ( in_array($action, $route->getActionsKey()) ) {

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