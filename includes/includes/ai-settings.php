<?php
// ai-settings.php
if(!defined('ABSPATH')) exit;

/**
 * AI Ayarları Sayfası
 */
function ai_settings_page() {
    ?>
    <div class="wrap">
        <h1>Nisan-AI API ve Model Ayarları</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ai_settings_group');
            do_settings_sections('ai-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Ayarları Kayıt Etme
 */
add_action('admin_init', function() {
    register_setting('ai_settings_group', 'ai_openai_key');
    register_setting('ai_settings_group', 'ai_selected_model');

    add_settings_section('ai_main_section', 'Ana Ayarlar', null, 'ai-settings');

    add_settings_field('ai_openai_key', 'OpenAI API Key', function(){
        $val = get_option('ai_openai_key', '');
        echo "<input type='text' name='ai_openai_key' value='$val' style='width: 400px;' />";
    }, 'ai-settings', 'ai_main_section');

    add_settings_field('ai_selected_model', 'Seçilen Model', function(){
        $val = get_option('ai_selected_model', 'gpt-4-turbo');
        echo "<select name='ai_selected_model'>
                <option value='gpt-4-turbo' ".($val=='gpt-4-turbo'?'selected':'').">GPT-4 Turbo</option>
                <option value='gpt-5-mini' ".($val=='gpt-5-mini'?'selected':'').">GPT-5 Mini</option>
              </select>";
    }, 'ai-settings', 'ai_main_section');
});
