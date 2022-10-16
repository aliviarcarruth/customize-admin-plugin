<?php
/*
Plugin Name:  CustomizeAdmin
Description:  A plugin to customize the admin screen
Plugin URI:   https://profiles.wordpress.org/aliviacarruth/
Author:       Alivia Carruth
Version:      1.0
Text Domain:  customizeadmin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

// exit if file is called directly
if (!defined('ABSPATH')) {

	exit;
}



// if admin area 
if (is_admin()) {

	//include dependencies
	require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';
}


// default plugin options
function customizeadmin_options_default()
{

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => 'Powered by WordPress',
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">My custom message</p>',
		'custom_footer'  => 'Special message for users',
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);
}
