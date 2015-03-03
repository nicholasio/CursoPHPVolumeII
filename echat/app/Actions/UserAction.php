<?php
namespace EChat\Actions;


class UserAction extends Action {

    public function run()
    {
        if ( isset($this->params['alivemsg']) ) {
            $this->aliveMsg();
        }

        if ( isset($this->params['update_users']) ) {
            $this->updateUsers();
        }
    }

    public function aliveMsg() {
        $this->Db()->update('Users', ['user_hash' => $this->params['user_hash']], ['lastactivity' => date('Y-m-d H:i:s')]);
        die();
    }

    public function updateUsers() {
        $user_hash = $this->params['user_hash'];
        $users = $this->Db()->fetchRowMany("SELECT * FROM Users WHERE status = 'on' AND user_hash != :hash ", array(':hash' => $user_hash));
        echo json_encode($users);
        die();
    }
}