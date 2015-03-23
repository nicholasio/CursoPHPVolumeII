<?php
session_start();

define('PUBLIC_DIR', __DIR__ );
define('TEMPLATES_DIR', PUBLIC_DIR . '/templates');

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/app');

define('ROOT_URL', 'http://php.local/phpvolume2/echat/public_html/');
define('IDLE_TIME_SECS', 30);

date_default_timezone_set('America/Fortaleza');

include( ROOT_DIR . '/vendor/autoload.php');

try{
    $dbconfig = include(APP_DIR . '/Config/database.php');

    $dbConn   = new \Simplon\Mysql\Mysql(
        $dbconfig['host'],
        $dbconfig['user'],
        $dbconfig['password'],
        $dbconfig['database'],
        $dbconfig['fetchMode'],
        $dbconfig['charset'],
        $dbconfig['options']
    );

    EChat\Registry::add($dbConn, 'appdb');

    if ( isset($_GET['action']) ) {
        $router = new EChat\Router\GETRouter('action', new \EChat\Helpers\URL\GETURLBuilder() );
    } else {
        $router = new EChat\Router\FriendRouter('url', new \EChat\Helpers\URL\FriendURLBuilder() );
    }


    EChat\Registry::add($router, 'approuter');
    include(APP_DIR . '/Config/routes.php');

    EChat\Registry::get('approuter')->dispatch();

}catch( \EChat\Exceptions\RouterException $e ) {
    echo "Erro de rotas: " . $e->getMessage();
} catch( \Exception $e) {
    echo $e->getMessage();
}