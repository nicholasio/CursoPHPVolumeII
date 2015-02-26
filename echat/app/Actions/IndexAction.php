<?php
namespace EChat\Actions;


class IndexAction extends Action {

    public function __construct() {

    }

    public function run()
    {
        $this->loadTemplate('index', ['data' => 'teste']);
    }
}