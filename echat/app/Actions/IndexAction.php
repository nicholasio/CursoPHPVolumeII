<?php
namespace EChat\Actions;


class IndexAction extends Action {

    public function run()
    {
        $this->loadTemplate('index', ['data' => 'teste']);
    }

}