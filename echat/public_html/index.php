<?php
define('PUBLIC_DIR', __DIR__ );
define('TEMPLATES_DIR', PUBLIC_DIR . '/templates');

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/app');

//Carrega autoload do Composer
include(__DIR__ . '/../vendor/autoload.php');

EChat\Registry::add(new EChat\Router\GETRouter( ['GET_VAR' => 'action'] ), 'approuter');

include(__DIR__ . '/../app/Config/routes.php');

EChat\Registry::get('approuter')->dispatch();