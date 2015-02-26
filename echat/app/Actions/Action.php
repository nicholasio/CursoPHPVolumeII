<?php
namespace EChat\Actions;

abstract class Action {
    protected $params;

    abstract public function run();

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
}