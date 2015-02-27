<?php
namespace EChat\Actions;


class LoginAction extends Action {

    public function run()
    {
        if ( isset($this->params['init_user']) && $this->params['init_user'] ) {
            $this->initUser();
        } else {
            $this->loadTemplate('login');
        }
    }

    protected function initUser() {

    }
}