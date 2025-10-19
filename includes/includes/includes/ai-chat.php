<?php
// ai-chat.php
if(!defined('ABSPATH')) exit;

/**
 * AI Sohbet Kutusu
 */
function ai_chat_box() {
    ?>
    <div id="ai-chat-container" style="margin-top:20px;">
        <h2>AI Sohbet</h2>
        <textarea id="ai-chat-input" rows="4" style="width:100%;"></textarea>
        <button id="ai-chat-send" class="button button-primary" style="margin-top:5px;">Gönder</button>
        <div id="ai-chat-output" style="margin-top:10px; padding:10px; border:1px solid #ddd;"></div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#ai-chat-send').on('click', function(){
                var message = $('#ai-chat-input').val();
                if(message.trim()=='') return;
                $('#ai-chat-output').append('<p><strong>Sen:</strong> '+message+'</p>');

                // Basit demo yanıt
                var reply = "AI: Bu mesaj için demo yanıt: "+message;
                $('#ai-chat-output').append('<p>'+reply+'</p>');
                $('#ai-chat-input').val('');
            });
        });
    </script>
    <?php
}
