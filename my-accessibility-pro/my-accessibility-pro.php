<?php
/*
Plugin Name: My Accessibility Pro
Description: תוסף נגישות מקצועי הכולל תפריט צף ושמירת הגדרות גולש
Version: 1.0
Author: Gemini Partner
Text Domain: my-accessibility-pro
*/

if ( ! defined( 'ABSPATH' ) ) exit;

// טעינת קבצים
add_action('wp_enqueue_scripts', 'ma_pro_assets');
function ma_pro_assets() {
    wp_enqueue_style('ma-pro-style', plugins_url('/style.css', __FILE__));
    wp_enqueue_script('ma-pro-script', plugins_url('/script.js', __FILE__), array(), '1.0', true);
}

// הזרקת ה-HTML
add_action('wp_footer', 'ma_pro_render_widget');
function ma_pro_render_widget() {
    ?>
    <div id="ma-widget-container">
        <button id="ma-trigger-btn" aria-label="תפריט נגישות">♿</button>
        <div id="ma-accessibility-menu" role="dialog">
            <h3>התאמת נגישות</h3>
            <div class="ma-button-grid">
                <button onclick="maApply('big-text')">טקסט גדול</button>
                <button onclick="maApply('readable-font')">גופן קריא</button>
                <button onclick="maApply('grayscale')">גווני אפור</button>
                <button onclick="maApply('high-contrast')">ניגודיות</button>
                <button onclick="maApply('underline')">הדגשת קישורים</button>
                <button onclick="maApply('stop-animations')">עצירת אנימציה</button>
                <button id="ma-reset-btn" onclick="maApply('reset')">איפוס הגדרות</button>
            </div>
        </div>
    </div>
    <?php
}
