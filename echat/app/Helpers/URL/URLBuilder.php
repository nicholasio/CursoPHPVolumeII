<?php
namespace EChat\Helpers\URL;
use EChat\Router\Router as Router;

/**
 * Define uma interface comum para todos os URLBuilder
 * @package EChat\Helpers\URL
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 */
abstract class URLBuilder {
    protected $router;

    public function __construct()
    {
        $this->router = null;
    }

    /**
     * Recebe o Router em uso pois um URLBuilder precisa de informações do Router.
     * @param Router $router

     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Recebe uma action e os parâmetros e monta uma URL de acordo com o Router em uso
     * @param $action
     * @param array $params
     * @return mixed
     */
    abstract public function doAction($action, Array $params = []);
}