<?php
/**
 * Plugin Name: Res Manager
 */

define('RM_VERSION', '0.0.1');

add_filter( 'template_include', function() { include dirname(__FILE__) . '/app.php'; } );

show_admin_bar(false);

/**
 * Retorna todos os handlers de scripts carregados pelo tema.
 * Usado para fizer uma limpeza no carrega do fron e evitar conflitos
 */
function theme_list_scripts() {
    global $wp_scripts;
    global $enqueued_scripts;
    $enqueued_scripts = array();
    foreach( $wp_scripts->queue as $handle ) {
        $enqueued_scripts[] = $handle;
    }
    return $enqueued_scripts;
}

/**
 * Retorna todos os handlers de styles carregados pelo tema.
 * Usado para fizer uma limpeza no carrega do fron e evitar conflitos
 */
function theme_list_styles() {
    global $wp_styles;
    global $enqueued_styles;
    $enqueued_styles = array();
    foreach( $wp_styles->queue as $handle ) {
        $enqueued_styles[] = $handle;
    }
    return $enqueued_styles;
}

/**
 * Remove todos os estilos do front ao acessar a página 
 * onde o sistema de contrato é exibido
 */
function remove_all_styles_from_theme() {
    global $wp_styles;
    if(get_the_ID() == get_option('contract_builder_page')) {
        foreach( $wp_styles->queue as $handle ) {
            if (strpos($wp_styles->registered[$handle]->src, 'contract-builder') === false) {
                wp_dequeue_style( $handle );
                wp_deregister_style( $handle);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'remove_all_styles_from_theme', 100);

/**
 * Acrescenta os scripts do plugin
 */
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