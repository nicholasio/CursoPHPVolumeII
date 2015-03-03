<?php
namespace EChat\Actions;


use EChat\Helpers\SessionHandler;

class IndexAction extends Action {

    public function run()
    {
        if ( SessionHandler::checkSession('user') ) {
            $this->loadChat();
        }
        else {
            $this->redirect( $this->UrlBuilder()->doAction('login') );
        }

    }

    public function loadChat() {
        $users = $this->Db()->fetchRowMany('SELECT * FROM Users WHERE status = "on" ');

        $sql   = "SELECT * FROM Users,Chat WHERE Users.user_hash = Chat.user_hash_from ";
        $sql  .= "AND Chat.user_hash_to IS NULL";

        $messages = $this->Db()->fetchRowMany($sql);



        $template_data = [
            'user_session' => SessionHandler::selectSession('user'),
            'users' => $users,
            'gravatar' => $this->Gravatar(),
            'messages' => $messages
        ];

        $this->loadTemplate('index', $template_data);
    }

}