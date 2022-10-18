<?php // customizeadmin - Admin Menu



// disable direct file access
if (!defined('ABSPATH')) {

	exit;
}



// add sub-level administrative menu
function customizeadmin_add_sublevel_menu()
{

	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug, 
		callable $function = ''
	);
	
	*/

	add_submenu_page(
		'options-general.php',
		esc_html__('Customize Admin Settings', 'customizeadmin'),
		esc_html__('Customize Admin', 'customizeadmin'),
		'manage_options',
		'customizeadmin',
		'customizeadmin_display_settings_page'
	);
}
add_action('admin_menu', 'customizeadmin_add_sublevel_menu');
