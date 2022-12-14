<?php
/*
Plugin Name:  Customize Admin
Description:  A plugin to customize the admin and login screen
Plugin URI:   https://profiles.wordpress.org/specialk
Author:       Alivia Carruth
Version:      1.0
Text Domain:  customizeadmin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// disable direct file access
if (!defined('ABSPATH')) {

	exit;
}



// load text domain
function customizeadmin_load_textdomain()
{

	load_plugin_textdomain('customizeadmin', false, plugin_dir_path(__FILE__) . 'languages/');
}
add_action('plugins_loaded', 'customizeadmin_load_textdomain');



// include plugin dependencies: admin only
if (is_admin()) {

	require_once plugin_dir_path(__FILE__) . 'admin/admin-menu.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';
}



// include plugin dependencies: admin and public
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';



// default plugin options
function customizeadmin_options_default()
{

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'customizeadmin'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">' . esc_html__('My custom message', 'customizeadmin') . '</p>',
		'custom_footer'  => esc_html__('Special message for users', 'customizeadmin'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);
}
