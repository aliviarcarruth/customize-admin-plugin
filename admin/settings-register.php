<?php // customizeadmin - Register Settings



// disable direct file access
if (!defined('ABSPATH')) {

	exit;
}



// register plugin settings
function customizeadmin_register_settings()
{

	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback = ''
	);
	
	*/

	register_setting(
		'customizeadmin_options',
		'customizeadmin_options',
		'customizeadmin_callback_validate_options'
	);

	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/

	add_settings_section(
		'customizeadmin_section_login',
		esc_html__('Customize Login Page', 'customizeadmin'),
		'customizeadmin_callback_section_login',
		'customizeadmin'
	);

	add_settings_section(
		'customizeadmin_section_admin',
		esc_html__('Customize Admin Area', 'customizeadmin'),
		'customizeadmin_callback_section_admin',
		'customizeadmin'
	);

	/*
	
	add_settings_field(
    	string   $id, 
		string   $title, 
		callable $callback, 
		string   $page, 
		string   $section = 'default', 
		array    $args = []
	);
	
	*/

	add_settings_field(
		'custom_url',
		esc_html__('Custom URL', 'customizeadmin'),
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_login',
		['id' => 'custom_url', 'label' => esc_html__('Custom URL for the login logo link', 'customizeadmin')]
	);

	add_settings_field(
		'custom_title',
		esc_html__('Custom Title', 'customizeadmin'),
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_login',
		['id' => 'custom_title', 'label' => esc_html__('Custom title attribute for the logo link', 'customizeadmin')]
	);

	add_settings_field(
		'custom_style',
		esc_html__('Custom Style', 'customizeadmin'),
		'customizeadmin_callback_field_radio',
		'customizeadmin',
		'customizeadmin_section_login',
		['id' => 'custom_style', 'label' => esc_html__('Custom CSS for the Login screen', 'customizeadmin')]
	);

	add_settings_field(
		'custom_message',
		esc_html__('Custom Message', 'customizeadmin'),
		'customizeadmin_callback_field_textarea',
		'customizeadmin',
		'customizeadmin_section_login',
		['id' => 'custom_message', 'label' => esc_html__('Custom text and/or markup', 'customizeadmin')]
	);

	add_settings_field(
		'custom_footer',
		esc_html__('Custom Footer', 'customizeadmin'),
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_admin',
		['id' => 'custom_footer', 'label' => esc_html__('Custom footer text', 'customizeadmin')]
	);

	add_settings_field(
		'custom_toolbar',
		esc_html__('Custom Toolbar', 'customizeadmin'),
		'customizeadmin_callback_field_checkbox',
		'customizeadmin',
		'customizeadmin_section_admin',
		['id' => 'custom_toolbar', 'label' => esc_html__('Remove new post and comment links from the Toolbar', 'customizeadmin')]
	);

	add_settings_field(
		'custom_scheme',
		esc_html__('Custom Scheme', 'customizeadmin'),
		'customizeadmin_callback_field_select',
		'customizeadmin',
		'customizeadmin_section_admin',
		['id' => 'custom_scheme', 'label' => esc_html__('Default color scheme for new users', 'customizeadmin')]
	);
}
add_action('admin_init', 'customizeadmin_register_settings');
