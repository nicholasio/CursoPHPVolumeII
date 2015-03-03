<?php
namespace EChat\Actions;

class MessageAction extends Action{

    public function run()
    {
        if ( isset($this->params['user_hash_to']) && isset($this->params['message']) && isset($this->params['user_hash_from']) ) {
            $this->sendMessage();
        } else if ( isset($this->params['update_messages']) && isset($this->params['last_msg_date'])) {
            $this->updateMessages();
        }

    }

    public function sendMessage() {

        $user_hash_to = $this->params['user_hash_to'] == '*' ? NULL : $this->params['user_hash_to'];
        $data = [
            'message' => $this->params['message'],
            'user_hash_from' => $this->params['user_hash_from'],
            'user_hash_to'   =>$user_hash_to,
            'date' => date('Y-m-d H:i:s')
        ];

        if ( $this->Db()->insert('Chat', $data) ) {
            echo 1;
        } else {
            echo 0;
        }

        die();
    }

    public function updateMessages() {
        $lastMsgDate = $this->params['last_msg_date'];

        $sql   = "SELECT * FROM Users,Chat WHERE Users.user_hash = Chat.user_hash_from ";
        $sql  .= "AND Chat.date > '{$lastMsgDate}'";

        $newMessages = $this->Db()->fetchRowMany($sql);

        echo json_encode($newMessages);
        die();
    }
}