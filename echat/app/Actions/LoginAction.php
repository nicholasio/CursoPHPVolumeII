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

    protected function initUser()
    {
        if ( isset($_POST['nickname']) && isset($_POST['email']) ) {
            $nickname = $this->getPost('nickname');
            $email = $this->getPost('email');


        }
    }
}