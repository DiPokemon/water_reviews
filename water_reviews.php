<?php
/*
Plugin Name: Отзывы
Description: Слайдер с отзывами
Version: 1.0
*/

global $wpdb;

if ( ! defined( 'ABSPATH' ) ) exit;

/**************
 * Константы
 **************/
define( 'WATER_REVIEWS_PLUGIN_DB_VERSION', '1.1' );
define( 'WATER_REVIEWS_PLUGIN_NAME',       'water_reviews' );
define( 'WATER_REVIEWS_PLUGIN_NAME_RU',    'Отзывы' );
define( 'WATER_REVIEWS_DB_TABLE_NAME',     $wpdb->prefix . WATER_REVIEWS_PLUGIN_NAME );
define( 'WATER_REVIEWS_PLUGIN_DIR',        plugin_dir_path( __FILE__ ) );
define( 'WATER_REVIEWS_PLUGIN_ADMIN_URL',  admin_url('?page=' . WATER_REVIEWS_PLUGIN_NAME) );

/**************
 * Class
 **************/
require_once dirname(__FILE__) . '/inc/class-main.php';
require_once dirname(__FILE__) . '/inc/class-model.php';
$water_main_class = new WaterReviews( __FILE__ );


/**************
 * Run
 **************/

// Правила активации:
// register_activation_hook() должен вызываться из основного файла плагина, из того где расположена директива Plugin Name
register_activation_hook(__FILE__, array($water_main_class, 'activate'));

function reviews_plugin_load_scripts()
{    
  wp_enqueue_script('init_reviews_slider', '/wp-content/plugins/water_reviews/static/js/init_reviews_slider.js', array('slick'), NULL, true);
} 
add_action('wp_enqueue_scripts', 'reviews_plugin_load_scripts', 10);