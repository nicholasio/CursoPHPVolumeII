(function($){

    var Chat = {
        $user_data : null,
        user_hash : null,
        lastMessageSend : null,
        timeout : 100 * 1000,
        msgTimeout : 95 * 1000,

        init : function() {
            this.$user_data = $('#user_data');
            this.user_hash = this.$user_data.find('.user_hash').text();
            this.lastMessageSend = new Date();

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
        }

    }

    $(document).ready(function() {
        Chat.init();
    });

})(jQuery);
