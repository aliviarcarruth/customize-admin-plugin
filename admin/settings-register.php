<?php // Customize Admin - Settings Register

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

// register plugin settings
function customizeadmin_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback
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
		'Customize Login Page', 
		'customizeadmin_callback_section_login', 
		'customizeadmin'
	);
	
	add_settings_section( 
		'customizeadmin_section_admin', 
		'Customize Admin Area', 
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
		'Custom URL',
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_login',
		[ 'id' => 'custom_url', 'label' => 'Custom URL for the login logo link' ]
	);

	add_settings_field(
		'custom_title',
		'Custom Title',
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_login',
		[ 'id' => 'custom_title', 'label' => 'Custom title attribute for the logo link' ]
	);

	add_settings_field(
		'custom_style',
		'Custom Style',
		'customizeadmin_callback_field_radio',
		'customizeadmin',
		'customizeadmin_section_login',
		[ 'id' => 'custom_style', 'label' => 'Custom CSS for the Login screen' ]
	);

	add_settings_field(
		'custom_message',
		'Custom Message',
		'customizeadmin_callback_field_textarea',
		'customizeadmin',
		'customizeadmin_section_login',
		[ 'id' => 'custom_message', 'label' => 'Custom text and/or markup' ]
	);

	add_settings_field(
		'custom_footer',
		'Custom Footer',
		'customizeadmin_callback_field_text',
		'customizeadmin',
		'customizeadmin_section_admin',
		[ 'id' => 'custom_footer', 'label' => 'Custom footer text' ]
	);

	add_settings_field(
		'custom_toolbar',
		'Custom Toolbar',
		'customizeadmin_callback_field_checkbox',
		'customizeadmin',
		'customizeadmin_section_admin',
		[ 'id' => 'custom_toolbar', 'label' => 'Remove new post and comment links from the Toolbar' ]
	);

	add_settings_field(
		'custom_scheme',
		'Custom Scheme',
		'customizeadmin_callback_field_select',
		'customizeadmin',
		'customizeadmin_section_admin',
		[ 'id' => 'custom_scheme', 'label' => 'Default color scheme for new users' ]
	);


}
add_action( 'admin_init', 'customizeadmin_register_settings' );