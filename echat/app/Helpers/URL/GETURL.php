<?php
namespace EChat\Helpers\URL;

class GETURL extends URL{

    public function doAction($action, Array $params = [])
    {
        $actionKey = \EChat\Registry::get('approuter')->getGetVar();

        $urlaction = "?{$actionKey}={$action}";

        if ( !empty($params) ) {
            $params_key_value = [];

            array_walk($params, function ($value, $key) use (&$params_key_value) {
                $params_key_value[] = $key . '=' . $value;
            });

            $urlaction .= '&' . implode('&', $params_key_value);

        }

        return $urlaction;

    }

    public function redirect($url)
    {
        header("Location: {$url} ");
        exit();
    }
}