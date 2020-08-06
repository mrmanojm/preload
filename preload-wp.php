<?php
/*
Plugin Name: Preload For WordPress
Plugin URI: https://www.ipfy.com/preload-wp
Description: Load subsequent pages instantly.
Author: Manoj M
Version: 1.0
Author URI: https://www.ipfy.com/
*/

add_action( 'wp_enqueue_scripts', 'wppreload_wp_enqueue_scripts' );
add_filter( 'script_loader_tag', 'wppreload_script_loader_tag', 10, 2 );

function wppreload_wp_enqueue_scripts() {
  wp_enqueue_script( 'wppreload', plugin_dir_url( __FILE__ ) . 'preload.min.js', array(), '1.0', true );
}

function wppreload_script_loader_tag( $tag, $handle ) {
  if ( 'wppreload' === $handle ) {
    $tag = str_replace( 'text/javascript', 'module', $tag );
  }
  return $tag;
}
