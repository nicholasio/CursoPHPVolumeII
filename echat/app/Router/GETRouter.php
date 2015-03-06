<?php
namespace EChat\Router;
use \EChat\Exceptions\RouterException as RouterException;
use EChat\Helpers\URL\URLBuilder;

/**
 * Um Router que trabalha diretamente com uma variável GET
 * @package EChat\Router
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 */
class GETRouter extends Router{
    private $getvalue;
    private $getvar;


    public function __construct($getvar, URLBuilder $URLBuilder )
    {
        parent::__construct($URLBuilder);

        $this->getvar = $getvar;
        $this->getvalue = filter_input(INPUT_GET, $getvar );
    }

    public function getGetVar()
    {
        return $this->getvar;
    }

    public function getAction()
    {
        return $this->getvalue;
    }

    protected function checkRoute($action, $route)
    {
        return in_array($action, $route->getActionsKey());
    }

    protected function fetchParams()
    {
        if ( ! empty($_GET) ) {
            $params = $_GET;

            if ( isset($params[$this->getvar]))
                unset($params[$this->getvar]);

            foreach($params as $key => &$param) {
                $param = filter_var($param, FILTER_SANITIZE_STRING);
            }

            return $params;
        }

        return [];
    }


}