(function($){

    function convertToJsDate(date) {
        var t = date.split(/[- :]/);
        var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);

        return d;
    }

    var Chat = {
        $user_data      : null,
        $sendMsgBtn     : null,
        $history        : null,
        $users          : null,
        user_hash       : null,
        lastMessageSend : null,
        timeout         : 3 * 1000,
        msgTimeout      : 95 * 1000,

        init : function() {
            this.$user_data         = $('#user_data');
            this.$sendMsgBtn        = $('.send-message');
            this.$history           = $('.conversation-history');
            this.$users             = $('.users-list');
            this.user_hash          = this.$user_data.find('.user_hash').text();
            this.lastMessageSend    = new Date();


            this.$sendMsgBtn.on('click', $.proxy(this.sendMessage, this) );

            this.sendAliveMsg();

            var self = this;
            setInterval( function() {
                self.aliveMsg();
                self.updateChat();
                self.updateUsers();
            }, this.timeout );

            this.scrollToBotton();
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
        updateUsers : function() {
            var self = this;
            $.getJSON('?action=user', { 'update_users' : true, 'user_hash' : this.user_hash}, function(users) {
                if ( users !== undefined && users.length > 0) {
                    self.insertNewUsers(users);
                }
            });
        },

        insertNewUsers : function(users) {
            this.$users.html('');
            var self = this;
            var list = '';
            $.each(users, function(key, user) {
                list += '<li class="media">\
                            <div class="media-body">\
                                <div class="media">\
                                    <a class="pull-left" href="#">\
                                        <img class="media-object img-circle" style="max-height:40px;" src="' + user.gravatar + '" />\
                                    </a>\
                                    <div class="media-body" >\
                                        <h5>\
                                            <a href="#" class="new-private-chat" data-hash="'+ user.user_hash+'">\
                                            '+user.name+'\
                                            </a>\
                                        </h5>\
                                        <small class="text-muted">\
                                        Entrou em\
                                        '+ convertToJsDate(msg.date).toString() +'\
                                        </small>\
                                    </div>\
                                </div>\
                            </div>\
                        </li>';
            });

            var $list = $(list)
            this.$users.append($list);
        },
        updateChat : function() {
            var lastMsgDate = this.$history.find(' > ul > li:last-child').data('msg-date');

            if ( lastMsgDate !== undefined ) {
                var self = this;
                $.getJSON('?action=message', {'update_messages' : true, 'last_msg_date' : lastMsgDate}, function(newMessages) {
                    if ( newMessages !== undefined && newMessages.length > 0 ) {
                        self.insertNewMessages(newMessages);
                    }
                } );
            }
        },

        insertNewMessages : function(newMessages) {
            var self =this;
            $.each(newMessages, function(key,msg) {
                /*var msgDate = new Date(msg.date);
                console.log(msgDate);*/
                var li = '<li class="media" data-msg-date="' + msg.date + '">\
                                <div class="media-body">\
                                    <div class="media">\
                                        <a class="pull-left" href="#">\
                                            <img class="media-object img-circle " src="' + msg.gravatar + '" />\
                                        </a>\
                                        <div class="media-body" >\
                                            '+msg.message+'\
                                            <br />\
                                            <small class="text-muted">' + msg.name +'| </small>\
                                            <hr />\
                                        </div>\
                                    </div>\
                                </div>\
                            </li>';

                var $li = $(li).hide();
                self.$history.find('> ul').append($li);
                $li.fadeIn('slow');
                self.scrollToBotton();
            });
        },

        scrollToBotton : function() {
            this.$history.scrollTop(this.$history[0].scrollHeight);
        }

    }

    $(document).ready(function() {
        Chat.init();
    });

})(jQuery);
