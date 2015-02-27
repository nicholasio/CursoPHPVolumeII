<?php
namespace EChat\Helpers\URL;

abstract class URL {
    abstract public static function doAction($action, Array $params = []);
    abstract public static function redirect($url);
}