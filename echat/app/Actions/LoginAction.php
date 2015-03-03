<?php
namespace EChat\Actions;


use EChat\Helpers\SessionHandler;

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
            $nickname   = $this->getPost('nickname');
            $email      = $this->getPost('email');

            if ( ! filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $this->redirect($this->UrlBuilder()->doAction('login'));
            }

            if ( strlen($nickname) <= 3 )
                $this->redirect($this->UrlBuilder()->doAction('login'));

            $user_hash = sha1($nickname . time());

            $curr_date = date('Y-m-d H:i:s');
            $data = [   'user_hash' => $user_hash,
                        'name' => $nickname,
                        'email' => $email,
                        'gravatar' => $this->Gravatar()->avatar($email),
                        'lastactivity' => $curr_date,
                        'entered_at' => $curr_date,
                        'status' => 'on'

            ];

            if ( $this->Db()->insert('Users',  $data) ) {
                SessionHandler::createSession('user', $data);
                $this->redirect($this->UrlBuilder()->doAction('index'));
            }




        }
    }
}