<?php
/**
 * Plugin Name: Childress Agency Core Functionality
 * Description: This contains all your site's core functionality so that it is theme independent. <strong>It should always be activated.</strong>
 * Author: Childress Agency
 * Author URI: https://childressagency.com
 * Version: 1.0
 * Text Domain: cai
 */
if(!defined('ABSPATH')){ exit; }

define('BURNSDENTAL_PLUGIN_DIR', dirname(__FILE__));
define('BURNSDENTAL_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Load ACF if not already loaded
 */
if(!class_exists('acf')){
  require_once BURNSDENTAL_PLUGIN_DIR . '/vendors/advanced-custom-fields-pro/acf.php';
  add_filter('acf/settings/path', 'burnsdental_acf_settings_path');
  add_filter('acf/settings/dir', 'burnsdental_acf_settings_dir');
}

function burnsdental_acf_settings_path($path){
  $path = plugin_dir_path(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $path;
}

function burnsdental_acf_settings_dir($dir){
  $dir = plugin_dir_url(__FILE__) . 'vendors/advanced-custom-fields-pro/';
  return $dir;
}

add_action('plugins_loaded', 'burnsdental_load_textdomain');
function burnsdental_load_textdomain(){
  load_plugin_textdomain('burnsdental', false, basename(BURNSDENTAL_PLUGIN_DIR) . '/languages');
}

require_once BURNSDENTAL_PLUGIN_DIR . '/includes/burnsdental-create-post-types.php';
add_action('init', 'burnsdental_create_post_types');

add_action('acf/init', 'burnsdental_acf_options_page');
function burnsdental_acf_options_page(){
  acf_add_options_page(array(
    'page_title' => esc_html__('General Settings', 'burnsdental'),
    'menu_title' => esc_html__('General Settings', 'burnsdental'),
    'menu_slug' => 'general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}