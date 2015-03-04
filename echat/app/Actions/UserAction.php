<?php
namespace EChat\Actions;


class UserAction extends Action {

    public function run()
    {
        if ( isset($this->params['update_users']) ) {
            $this->updateUsers();
        }
    }

    public function updateLastActivity() {
        $this->Db()->update('Users', ['user_hash' => $this->params['user_hash']], ['lastactivity' => date('Y-m-d H:i:s')]);
    }

    public function updateUsers() {
        $this->updateLastActivity();

        $user_hash = $this->params['user_hash'];
        $users = $this->Db()->fetchRowMany("SELECT * FROM Users WHERE status = 'on' AND user_hash != :hash ", array(':hash' => $user_hash));
        echo json_encode($users);
        die();
    }
}