(function($){
    var Chat = {
        $user_data      : null,
        $sendMsgBtn     : null,
        $history        : null,
        $users          : null,
        $chatMessage    : null,
        user_hash       : null,
        timeout         : 3 * 1000,

        init : function() {
            this.$user_data         = $('#user_data');
            this.$sendMsgBtn        = $('.send-message');
            this.$history           = $('.conversation-history');
            this.$users             = $('.users-list');
            this.user_hash          = this.$user_data.find('.user_hash').text();
            this.$chatMessage       = $('.chat-message');


            var self = this;

            this.$sendMsgBtn.on('click', $.proxy(this.sendMessage, this) );
            this.$chatMessage.on('keypress', function(evt) {
                if ( evt.which == 13 ) {
                    self.sendMessage();
                }
            });


            setInterval( function() {
                self.updateUsers();
                self.updateChat();
            }, this.timeout );

            this.scrollToBotton();
        },
        sendMessage : function() {
            var msg  = this.$chatMessage.val();

            if ( msg.length > 0 ) {
                var self = this;
                $.get('?action=message', { 'user_hash_from' : this.user_hash, 'message' : msg}, function(data) {
                    if ( data == 1 ) {
                        self.$chatMessage.val('');
                        self.updateChat();
                    }
                } );
            }
        },

        updateUsers : function() {
            var self = this;
            $.getJSON('?action=user', { 'update_users' : 1, 'user_hash' : this.user_hash}, function(users) {
                if ( users !== undefined && users.length > 0) {
                    self.insertNewUsers(users);
                } else {
                    self.$users.html('');
                }
            });
        },

        insertNewUsers : function(users) {
            this.$users.html('');
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
                                        '+ moment(user.entered_at).format('DD/MM/YYYY hh:mm:ss') +'\
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

            if ( lastMsgDate === undefined ) lastMsgDate = 0;

            var self = this;
            $.getJSON('?action=message', {'update_messages' : 1, 'last_msg_date' : lastMsgDate}, function(newMessages) {
                if ( newMessages !== undefined && newMessages.length > 0 ) {
                    self.insertNewMessages(newMessages);
                }
            } );

        },

        insertNewMessages : function(newMessages) {
            var list = '';
            $.each(newMessages, function(key,msg) {
                list += '<li class="media" data-msg-date="' + msg.date + '">\
                                <div class="media-body">\
                                    <div class="media">\
                                        <a class="pull-left" href="#">\
                                            <img class="media-object img-circle " src="' + msg.gravatar + '" />\
                                        </a>\
                                        <div class="media-body" >\
                                            '+msg.message+'\
                                            <br />\
                                            <small class="text-muted">' + msg.name +' | ' + moment(msg.date).format('DD/MM/YYYY hh:mm:ss') + '</small>\
                                            <hr />\
                                        </div>\
                                    </div>\
                                </div>\
                            </li>';
            });
            var $list = $(list).hide();
            this.$history.find('> ul').append($list);
            $list.fadeIn('slow');
            this.scrollToBotton();
        },

        scrollToBotton : function() {
            this.$history.scrollTop(this.$history[0].scrollHeight);
        }

    }

    $(document).ready(function() {
        Chat.init();
    });

})(jQuery);
