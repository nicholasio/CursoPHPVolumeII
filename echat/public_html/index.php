<?php
define('PUBLIC_DIR', __DIR__ );
define('TEMPLATES_DIR', PUBLIC_DIR . '/templates');

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/app');

//Carrega autoload do Composer
include(__DIR__ . '/../vendor/autoload.php');

$router = new EChat\Router\GETRouter( ['GET_VAR' => 'action'] );

EChat\Registry::add( $router, 'approuter');

include(__DIR__ . '/../app/Config/routes.php');

try{
    EChat\Registry::get('approuter')->dispatch();
} catch ( EChat\Exceptions\RouterException $e) {
    echo "Erro: " . $e->getMessage();
}
