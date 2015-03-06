<?php
session_start();

use EChat\Helpers\URL\GETURLBuilder;
use EChat\Helpers\URL\FriendURLBuilder;

define('PUBLIC_DIR', __DIR__ );
define('TEMPLATES_DIR', PUBLIC_DIR . '/templates');

define('ROOT_DIR', __DIR__ . '/..');
define('APP_DIR', ROOT_DIR . '/app');

define('ROOT_URL', 'http://scotchbox/cursophpvolume2/echat/public_html/');
define('IDLE_TIME_SECS', 30);

date_default_timezone_set('America/Fortaleza');

//Carrega autoload do Composer
include(ROOT_DIR . '/vendor/autoload.php');

try{

    /**
     * Configurando conexão com banco de dados
     */
    $dbconfig = include(APP_DIR . '/Config/database.php');

    $dbConn = new \Simplon\Mysql\Mysql(
        $dbconfig['host'],
        $dbconfig['user'],
        $dbconfig['password'],
        $dbconfig['database'],
        $dbconfig['fetchMode'],
        $dbconfig['charset'],
        $dbconfig['options']
    );

    EChat\Registry::add($dbConn, 'appdb');

    /**
     * Configurando Rotas e Dispachando
     */
    if ( isset($_GET['action']) ) {
        $router = new EChat\Router\GETRouter( 'action', new GETURLBuilder() );
    } else {
        $router = new EChat\Router\FriendRouter( 'url', new FriendURLBuilder() );

    }

    EChat\Registry::add( $router, 'approuter');

    include(APP_DIR . '/Config/routes.php');

    EChat\Registry::get('approuter')->dispatch();

} catch( \Exception $e ) {
    echo  $e->getMessage();
} catch ( EChat\Exceptions\RouterException $e) {
    echo "Erro: " . $e->getMessage();
}








