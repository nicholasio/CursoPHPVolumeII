<?php
namespace EChat\Actions;


class IndexAction extends Action {

    public function __construct() {
        echo "Estou sendo executado";
    }

    public function run()
    {
        var_dump($this->params);
    }
}