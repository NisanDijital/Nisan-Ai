<?php
// ai-dashboard.php
if(!defined('ABSPATH')) exit;

/**
 * Admin Dashboard Sayfası
 */
function ai_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Nisan-AI Yönetici Paneli</h1>
        <p>Buradan AI modellerinizi yönetebilir, içerik üretimini ve otomasyonu kontrol edebilirsiniz.</p>

        <h2>AI Modeli Seçimi</h2>
        <form method="post" action="">
            <select name="ai_model">
                <option value="gpt-4-turbo">GPT-4 Turbo</option>
                <option value="gpt-5-mini">GPT-5 Mini</option>
            </select>
            <input type="submit" value="Kaydet" class="button button-primary">
        </form>

        <h2>Son Üretilen İçerikler</h2>
        <ul>
            <?php
            $recent_posts = wp_get_recent_posts([
                'numberposts' => 5,
                'post_status' => 'draft'
            ]);
            foreach($recent_posts as $post) {
                echo "<li>{$post['post_title']} - Taslak</li>";
            }
            ?>
        </ul>
    </div>
    <?php
}
