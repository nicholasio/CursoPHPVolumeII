<?php
namespace EChat\Router;
use EChat\Helpers\URL\URLBuilder as URLBuilder;

/**
 * Classe abstrata que define o comportamento de um router e obriga as classes filhas a
 * definirem Hook Methods complementando o funcionamento do Router.
 * @package EChat\Router
 * @author Nícholas André <nicholas@iotecnologia.com.br>
 */
abstract class Router {
    protected $routes = [];
    protected $URLBuilder;

    /**
     * Inicializa o Router.
     * @param $getvar
     * @param URLBuilder $URLBuilder
     */
    public function __construct(URLBuilder $URLBuilder)
    {
        $this->routes = new \SplObjectStorage();
        $this->URLBuilder = $URLBuilder;
        $this->URLBuilder->setRouter($this);
    }

    /**
     * Adiciona uma Rota
     * @param IRoute $route
     */
    public function addRoute(IRoute $route)
    {
        $this->routes->attach($route);
    }

    /**
     * Remoe uma Rota
     * @param IRoute $route
     */
    public function removeRoute(IRoute $route)
    {
        $this->routes->detach($route);
    }

    /**
     * Retorna o URLBuilder definido
     * @return URLBuilder
     */
    public function getUrlBuilder()
    {
        return $this->URLBuilder;
    }

    /**
     * Verifica se $route casou com a $action
     * @param $action
     * @param $route
     * @return bool
     */
    abstract protected function checkRoute($action, $route);

    /**
     * Extrai os parâmetros da URL
     * @return array
     * @throws RouterException
     */
    abstract protected function fetchParams();

    /**
     * Retorna a action corrent
     * @return mixed
     */
    abstract public function getAction();

    /**
     * Executa o router em busca de uma rota que casou com a action corrente.
     * @throws RouterException
     */
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