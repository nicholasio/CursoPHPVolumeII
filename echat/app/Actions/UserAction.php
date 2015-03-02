<?php
namespace EChat\Actions;


class UserAction extends Action{

    public function run()
    {
        if ( isset($this->params['alivemsg']) ) {
            $this->aliveMsg();
        }
    }

    public function aliveMsg() {
        $this->Db()->update('Users', ['user_hash' => $this->params['user_hash']], ['lastactivity' => date('Y-m-d H:i:s')]);
        die();
    }
}