<?php 
    /**
* We create an advanced Wordpress  Copyright Volkan Kücükbudak
* @file my-demo-plugin.php
* @link https://wasistseo.de
* @since 1.0.0
* @package WIS
*
* @wordpress-plugin
* Plugin Name: My advanced Wordpress Testplugin
* Plugin URI: https://wasistseo.de
* Description: How to create an advanced Wordpress Plugin from scratch?
* Version: 1.0.0
* Author: Was ist SEO?
* Author URI: https://wasistseo.de
* License: GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: wis-textdomain
* Domain Path: /languages
*/
/* 
If call direct, DIE!
*/
if ( ! defined( 'WPINC' ) ) { die; }

// ------------------------------------------------------------------------------------------------- start#advanced menu
function wis_menu_pages() {
// TopLevel Menu
   $page_title = 'YourSettings'; //
   $menu_title = 'Global Settings;
   $capability = 'manage_options';
   $menu_slug = 'wis-settings';
   $function = 'wis_settings';
   add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function);
// Add submenu0 
   $sub_menu_title = 'Global Settings';
   add_submenu_page($menu_slug, $page_title, $sub_menu_title, $capability, $menu_slug, $function);
// 1 //
   $submenu_page_title = 'Help & Support ';
   $submenu_title = 'Help & Support';
   $submenu_slug = 'wis-help';
   $submenu_function = 'wis_help';
 add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
// 2 //
   $submenu_page_title = 'Info ';
   $submenu_title = 'Global Infos';
   $submenu_slug = 'wis-info';
   $submenu_function = 'wis_info';
 add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
// 3 //
   $submenu_page_title = 'Check ';
   $submenu_title = 'Security Check';
   $submenu_slug = 'wis-securitycheck';
   $submenu_function = 'wis_securitycheck';
 add_submenu_page($menu_slug, $submenu_page_title, $submenu_title, $capability, $submenu_slug, $submenu_function);
}
// -------------------------------------------------------------------------------------------------  end#advanced menu
//..
// Load core
function wis_settings() {
  if (!current_user_can('manage_options')) {
  wp_die('You can not do this!');
  }
// get file for config site
  require_once(dirname(__FILE__) .'/wis-global-conf.php');
  }
function wis_help() {
  if (!current_user_can('manage_options')) {
  wp_die('You can not do this!');
  }
// get file for config site
  require_once(dirname(__FILE__) .'/wis-support.php');
  }
function wis_info() {
  if (!current_user_can('manage_options')) {
  wp_die('You can not do this!');
  }
// get file for config site
  require_once(dirname(__FILE__) .'/wis-global-info.php');
  }
function wis_securitycheck() {
  if (!current_user_can('manage_options')) {
  wp_die('You can not do this!');
  }
// get file for config site
  require_once(dirname(__FILE__) .'/wis-secure-conf.php');
  }
add_action('admin_menu', 'wis_menu_pages');
  // end Menu
// ..
