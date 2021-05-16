<?php
/**
 * Plugin Name: Res Manager
 */

define('RM_VERSION', '0.0.1');

add_filter( 'template_include', function() { include dirname(__FILE__) . '/app.php'; } );

add_action('wp_enqueue_scripts', function(){
    $plugin_url = plugin_dir_url(__FILE__);
    $baseurl = site_url();
    wp_add_inline_script( 'baseconfig', "window.baseurl='{$baseurl}'");
    wp_register_style( 'app-style', $plugin_url . '/front/dist/app.css', theme_list_styles(), time());
    wp_enqueue_style( 'app-style' );
    wp_register_style( 'vendors-style', $plugin_url . '/front/dist/chunk-vendors.css', theme_list_styles(), time());
    wp_enqueue_style( 'vendors-style' );
    wp_register_script( 'vendors-js', $plugin_url . '/front/dist/chunk-vendors.js', theme_list_scripts(), time());
    wp_enqueue_script( 'vendors-js' );
    wp_register_script( 'app-js', $plugin_url . '/front/dist/app.js', theme_list_scripts(), time());
    wp_enqueue_script( 'app-js' );
}, 999);