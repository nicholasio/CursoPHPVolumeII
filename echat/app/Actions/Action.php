<?php
namespace EChat\Actions;

abstract class Action {
    protected $params;

    abstract public function run();

    public function setParams($params = null) {
        $this->params = $params;
    }

    protected function loadTemplate($template, $data = null) {

    }
}