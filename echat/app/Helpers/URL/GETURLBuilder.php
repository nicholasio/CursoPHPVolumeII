<?php
namespace EChat\Helpers\URL;

/**
 * Gera URL's seguindo o padrão do GETRouter
 * @package EChat\Helpers\URL
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 * @see EChat\Router\GETRouter GETRouter
 */
class GETURLBuilder extends URLBuilder{

    /**
     * Monta uma URL no formato do Router GETRouter
     * @param $action
     * @param array $params
     * @return string
     */
    public function doAction($action, Array $params = [])
    {
        $actionKey = $this->router->getGetVar();

        $urlaction = ROOT_URL . "?{$actionKey}={$action}";

        if ( !empty($params) ) {
            $params_key_value = [];

            array_walk($params, function ($value, $key) use (&$params_key_value) {
                $params_key_value[] = $key . '=' . urlencode($value);
            });

            $urlaction .= '&' . implode('&', $params_key_value);

        }

        return $urlaction;

    }


}
