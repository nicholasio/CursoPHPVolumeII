(function($){

    var Chat = {
        $user_data : null,
        $sendMsgBtn : null,
        $history : null,
        user_hash : null,
        lastMessageSend : null,
        timeout : 100 * 1000,
        msgTimeout : 95 * 1000,



        init : function() {
            this.$user_data = $('#user_data');
            this.$sendMsgBtn = $('.send-message');
            this.$history = $('.conversation-history'),
            this.user_hash = this.$user_data.find('.user_hash').text();
            this.lastMessageSend = new Date();


            this.$sendMsgBtn.on('click', $.proxy(this.sendMessage, this) );

            this.sendAliveMsg();

            var self = this;
            setInterval( function() {
                self.aliveMsg();
            }, this.timeout );
        },

        aliveMsg : function() {
            if ( this.checkMessageInterval() ) {
                this.sendAliveMsg();
            }
        },

        sendAliveMsg : function() {
            $.get("?action=user", { 'alivemsg' : true, 'user_hash' : this.user_hash} , function( data ) {  });
        },

        checkMessageInterval: function() {
            var curr_date = new Date();

            var diff = (curr_date - this.lastMessageSend);
            if ( diff >= this.msgTimeout ) {
                return true;
            }
            return false;
        },

        sendMessage : function(evt) {
            var $chatMsg = $('.chat-message');
            var $btn = $(evt.target);

            var msg  = $chatMsg.val();
            var user_hash_to = '*';


            if ( msg.length > 0 ) {
                var self = this;
                $.get('?action=message', { 'user_hash_from' : this.user_hash, 'user_hash_to' : user_hash_to, 'message' : msg}, function(data) {
                    if ( data == 1 ) {
                        $chatMsg.val('');
                        self.lastMessageSend = new Date();
                        self.updateChat();
                    }
                } );
            }
        },

        updateChat : function() {
            var lastMsgDate = this.$history.find(' > ul > li:last-child').data('msg-date');

            if ( lastMsgDate !== undefined ) {
                var self = this;
                $.getJSON('?action=message', {'update_messages' : true, 'last_msg_date' : lastMsgDate}, function(newMessages) {

                } );
            }
        }

    }

    $(document).ready(function() {
        Chat.init();
    });

})(jQuery);
