<?php
namespace EChat\Actions;

abstract class Action {
    protected $params;
    protected $db;
    protected $urlbuilder;


    public function __construct() {
        $this->db = \EChat\Registry::get('appdb');
        $this->urlbuilder = \EChat\Registry::get('approuter')->getUrlBuilder();
    }

    public function setParams($params = null) {
        $this->params = $params;
    }

    protected function loadTemplate($template, $data = null) {
        $templatePath = TEMPLATES_DIR . '/' . $template . '.phtml';
        if ( file_exists($templatePath) ) {

            if ( $data && ! empty($data) )
                extract($data);

            include_once($templatePath);
        }
    }

    protected function loadHeader() {
        $this->loadTemplate('layout/header', null);
    }

    protected function loadFooter() {
        $this->loadTemplate('layout/footer', null);
    }

    protected function redirect() {

    }

    public function UrlBuilder() {
        return $this->urlbuilder;
    }

    public function getPost($key) {
        if ( isset($_POST[$key]) )
            return filter_input(INPUT_POST, $_POST[$key], FILTER_SANITIZE_STRING);
    }

    abstract public function run();
}