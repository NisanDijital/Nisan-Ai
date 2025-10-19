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
 * Ayarları Kayıt Et*
