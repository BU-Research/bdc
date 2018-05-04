<?php
/**
 * Plugin BDC Moth
 *
 * @package plugin-bdcmoth
 */

/**
 * Plugin Name: Plugin BDC Moth
 * Plugin URI:  http://mothdesign.net
 * Description: BDC theme utility plugin.
 * Version:     1.0.0
 * Author:      Moth Design Webteam
 * Author URI:  http://mothdesign.net/
 * Text Domain: plugin-bdcmoth
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_BDCMOTH_INC_PATH' , plugin_dir_path( __FILE__ ) . 'inc/' );

// Load custom post types, taxonomies and meta-boxes
// Post Layouts.
require_once( PLUGIN_BDCMOTH_INC_PATH . 'class-plugin-bdcmoth-postlayouts.php' );
$plugin_bdcmoth_postlayouts = new Plugin_Bdcmoth_Postlayouts();
$plugin_bdcmoth_postlayouts->init();

// Team.
require_once( PLUGIN_BDCMOTH_INC_PATH . 'class-plugin-bdcmoth-team.php' );
$plugin_bdcmoth_team = new Plugin_Bdcmoth_Team();
$plugin_bdcmoth_team->init();

// Tools/Tech.
require_once( PLUGIN_BDCMOTH_INC_PATH . 'class-plugin-bdcmoth-tools.php' );
$plugin_bdcmoth_tools = new Plugin_Bdcmoth_Tools();
$plugin_bdcmoth_tools->init();

// Theme functions.
require_once( PLUGIN_BDCMOTH_INC_PATH . 'theme-functions.php' );
