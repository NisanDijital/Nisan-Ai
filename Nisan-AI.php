<?php
/**
 * Plugin Name: Nisan-AI
 * Description: Full AI Automation for WordPress - Blog, SEO, Hız, Güvenlik ve Sohbet Modülü
 * Version: 1.0
 * Author: Lee
 */

if(!defined('ABSPATH')) exit;

// Includes
require_once plugin_dir_path(__FILE__) . 'includes/ai-core.php';
require_once plugin_dir_path(__FILE__) . 'includes/ai-cron.php';
require_once plugin_dir_path(__FILE__) . 'includes/ai-dashboard.php';
require_once plugin_dir_path(__FILE__) . 'includes/ai-settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/ai-chat.php';

// Admin Menu
add_action('admin_menu', function(){
    add_menu_page(
        'AI Yöneticisi',
        'AI Yöneticisi',
        'manage_options',
        'nisan-ai_dashboard',
        'ai_dashboard_page',
        'dashicons-admin-site',
        2
    );
});

// Enqueue Scripts & Styles
add_action('admin_enqueue_scripts', function($hook){
    if(strpos($hook,'nisan-ai_dashboard')!==false){
        wp_enqueue_style('ai-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin-style.css');
        wp_enqueue_script('ai-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin-script.js', ['jquery'], null, true);
    }
});
