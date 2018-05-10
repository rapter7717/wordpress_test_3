<?php
/*
Plugin Name: NVC-Interactive
Plugin URI:
Description: Removes dashboard meta boxes and imports Google fonts.
Version: 0.1.0
Author: Austin Smith
Author URI:
Text Domain: nvc-interactive
Domain Path: /languages
*/


add_action('admin_init', 'nvcwp_removing-dashboards');

function nvcwp_removing_dashboards() {
  remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal') ;
  remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
  remove_action ('welcome_panel', 'wp_welcome_panel');
}

function nvcwp_google_fonts(){
  wp_enqueue_style('nvc-wp-google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans', false);

}
add_action('wp_enqueue_scripts', 'nvcwp_google_fonts');
