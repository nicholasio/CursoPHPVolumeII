<?php
namespace EChat\Helpers\URL;

/**
 * Class FriendURLBuilder
 * @package EChat\Helpers\URL
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 * @see EChat\Router\FriendRouter    Um Rounter que implementa URL's amigáveis
 * Gera URL's seguindo o padrão do FriendRouter.
 */
class FriendURLBuilder extends URLBuilder{

    /**
     * @param $action
     * @param array $params
     * @return string
     * Monta uma URL no formato do FriendRouter
     */
    public function doAction($action, Array $params = [])
    {
        $urlaction = ROOT_URL . "{$action}/";

        if ( !empty($params) ) {
            $params_key_value = [];

            array_walk($params, function ($value, $key) use (&$params_key_value) {
                $params_key_value[] = $key;
                $params_key_value[] = urlencode($value);
            });

            $urlaction .= implode('/', $params_key_value);

        }

        return $urlaction;
    }
}