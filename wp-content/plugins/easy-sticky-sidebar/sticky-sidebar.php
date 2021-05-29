<?php
/**
 * Plugin Name: WordPress CTA Plugin
 * Description: WordPress CTA - Sticky WordPress Call To Action Plugin helps promote content, new blog posts and products. The WordPress CTA Plugin will show on every page and after you a scroll a bit, it will collapse.
 * Version: 1.1.9
 * Author: Blend Media
 * Author URI: https://blendmedia.ca
 * Text Domain: easy-sticky-sidebar
 *
 * @package sticky-sidebar
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define SSuprydp_PLUGIN_FILE.
if (!defined('SSuprydp_PLUGIN_FILE')) {
    define('SSuprydp_PLUGIN_FILE', __FILE__);
}

// Include the main UltimatePageBuilder class.
if (!class_exists('SSuprydpClassStickySidebar')) {
	 include_once dirname(__FILE__) . '/inc/ClassStickySidebar.php';
}


/**
 * Main instance of SSuprydpStickySidebar.
 *
 * Returns the main instance of SSuprydpStickySidebar.
 *
 * @since  1.0.0
 * @return ClassStickySidebar
 */
function SSuprydpStickySidebar() {
    return SSuprydpStickySidebar::instance();
}

// Global for backwards compatibility.
$GLOBALS['SSuprydp_shortcodes'] = SSuprydpStickySidebar();


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_easy_sticky_sidebar() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( 'e9661fae-2fcb-4985-b7ad-eca7a17e9d75', 'Easy Sticky Sidebar', __FILE__ );

    // Active insights
    $client->insights()->init();

    // Active automatic updater
    $client->updater();

}

appsero_init_tracker_easy_sticky_sidebar();
