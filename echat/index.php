<?php
//Carrega autoload do Composer
include( __DIR__ . '/vendor/autoload.php');

EChat\Core\Registry::add(new EChat\Core\Router\GETRouter( ['GET_VAR' => 'action'] ), 'approuter');

include( __DIR__ . '/app/Config/routes.php');

EChat\Core\Registry::get('approuter')->dispatch();