<?php
use \EChat\Core\Router\GETRoute as GETRoute;

$approuter = \EChat\Core\Registry::get('approuter');

$approuter->addRoute(
    new GETRoute( [
        'match' => 'index',
        'action' => 'IndexAction'
    ] )
);

$approuter->addRoute(
  new GETRoute( [
      'match' => 'chat',
      'action' => 'ChatAction'
  ] )
);