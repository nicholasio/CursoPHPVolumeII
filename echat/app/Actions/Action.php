<?php
namespace EChat\Actions;

use EChat\Helpers\SessionHandler;

/**
 * Class Action
 * @package EChat\Actions
 * @author Nícholas André<nicholas@iotecnologia.com.br>
 */
abstract class Action {
    protected $params;
    private $db;
    private $urlbuilder;
    private $gravatar;

    protected $template;

    public function __construct() {
        $this->db = \EChat\Registry::get('appdb');
        $this->urlbuilder = \EChat\Registry::get('approuter')->getUrlBuilder();

        $this->template = new \stdClass();
        $this->gravatar = new \Gravatar\UrlBuilder();
        $this->gravatar->useHttps(true);

        $this->checkOnlineUsers();
        $this->checkActualUser();
    }

    public function setParams($params = null) {
        $this->params = $params;
    }

    /**
     * @param $template
     * @param null $data
     * Carrega um template e coloca os parâmetros $data em $this->template
     */
    protected function loadTemplate($template, $data = null) {

        $templatePath = TEMPLATES_DIR . '/' . $template . '.phtml';
        if ( file_exists($templatePath) ) {

            if ( $data && ! empty($data) ) {
                foreach($data as $key => $value ) {
                    $this->template->{$key} = $value;
                }
            }


            include_once($templatePath);
        }
    }

    protected function loadHeader() {
        $this->loadTemplate('layout/header', null);
    }

    protected function loadFooter() {
        $this->loadTemplate('layout/footer', null);
    }

    protected function redirect($url) {
        header("Location: {$url}");
        die();
    }

    public function UrlBuilder() {
        return $this->urlbuilder;
    }

    public function Db() {
        return $this->db;
    }

    public function Gravatar() {
        return $this->gravatar;
    }

    public function getPost($key) {
        if ( isset($_POST[$key]) )
            return filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }

    public function checkOnlineUsers() {
        $this->db->executeSql("UPDATE Users SET status = 'off' WHERE TIME_TO_SEC(TIMEDIFF('"  .date('Y-m-d H:i:s') . "', lastactivity)) >= '". IDLE_TIME_SECS . "'");
    }

    public function checkActualUser() {
        $user = SessionHandler::selectSession('user');

        if ( $user ) {
            $status = $this->db->fetchColumn('SELECT status FROM Users WHERE user_hash = "' . $user['user_hash'] . '"' );

            if ( $status == 'off' || !$status )
                SessionHandler::deleteSession('user');
        }


    }

    abstract public function run();
}