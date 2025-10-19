<?php
// ai-cron.php
if(!defined('ABSPATH')) exit;

/**
 * Cron Job: Günlük otomatik içerik üretimi
 */
function ai_daily_content_cron() {
    $topics = ['koltuk yıkama', 'halı temizliği', 'ev temizliği']; // Örnek konular
    foreach($topics as $topic) {
        $content = ai_generate_content($topic);
        $content = ai_optimize_seo($content);

        // Yeni içerik olarak WordPress'e ekleme
        $post_data = [
            'post_title'    => ucfirst($topic),
            'post_content'  => $content,
            'post_status'   => 'draft', // otomatik olarak taslak kaydedilir
            'post_author'   => 1
        ];
        wp_insert_post($post_data);
    }
}

// Cron Event Ayarı
if(!wp_next_scheduled('ai_daily_content_event')) {
    wp_schedule_event(time(), 'daily', 'ai_daily_content_event');
}

add_action('ai_daily_content_event', 'ai_daily_content_cron');
