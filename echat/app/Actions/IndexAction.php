<?php
namespace EChat\Actions;


use EChat\Helpers\SessionHandler;

class IndexAction extends Action {

    public function run()
    {
        if ( SessionHandler::checkSession('user') )
            $this->loadTemplate('index', ['user_session' => SessionHandler::selectSession('user') ]);
        else
            $this->redirect( $this->UrlBuilder()->doAction('login') );
    }

}