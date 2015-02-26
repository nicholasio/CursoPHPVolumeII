<?php
use \EChat\Router\GETRoute as GETRoute;

$approuter = \EChat\Registry::get('approuter');

$approuter->addRoute(
    new GETRoute( [
        'match' => ['index', ''],
        'action' => 'index'
    ] )
);

$approuter->addRoute(
    new GETRoute( [
        'match' => ['login'],
        'action' => 'login'
    ] )
);

/*
$approuter->addRoute(
  new GETRoute( [
      'match' => 'chat',
      'action' => 'ChatAction'
  ] )
);*/