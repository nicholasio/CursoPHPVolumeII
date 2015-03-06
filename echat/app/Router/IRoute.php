<?php
namespace EChat\Router;
/**
 * Define uma interface que todo tipo de rota deve implementar
 * @package EChat\Router
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 */
interface IRoute {
    public function setRoute( Array $params );
}