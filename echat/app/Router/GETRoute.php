<?php
namespace EChat\Router;
use \EChat\Exceptions\RouteException as RouteException;

class GETRoute implements IRoute {
    private $actionsKey;
    private $actionClass;

    public function __construct(Array $params ) {
        if ( empty($params) )
            throw new RouteException("Rota inválida");

        $this->setRoute($params);
    }

    /**
     * @return Array
     */
    public function getActionsKey()
    {
        return $this->actionsKey;
    }

    /**
     * @return mixed
     */
    public function getActionClass()
    {
        return $this->actionClass;
    }

    /**
     * @param array $params
     * @throws RouteException
     * 'match' indica qual valor da get_var casar e action indica o nome da action.
     * O seguinte padrão deverá ser seguido: A Classe IndexAction tem o nome de action igual a index e assim por diante
     */
    public function setRoute(Array $params)
    {
        if( !isset($params['match']) || !isset($params['action']) )
            throw new RouteException("Faltando parâmetros para a rota");

        if ( ! is_array($params['match']) )
            throw new RouteException("match deve ser um array");

        $this->actionsKey    = $params['match'];
        $className = '\\EChat\\Actions\\' . ucfirst($params['action']) . 'Action';

        if ( ! class_exists($className) )
            throw new RouteException("Classe $className não encontrada");

        $this->actionClass = $className;
    }
}