<?php
//Carrega autoload do Composer
include(__DIR__ . '/../vendor/autoload.php');

EChat\Registry::add(new EChat\Router\GETRouter( ['GET_VAR' => 'action'] ), 'approuter');

include(__DIR__ . '/../app/Config/routes.php');

EChat\Registry::get('approuter')->dispatch();