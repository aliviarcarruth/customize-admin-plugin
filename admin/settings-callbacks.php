<?php // customizeadmin - Settings Callbacks



// disable direct file access
if (!defined('ABSPATH')) {

	exit;
}



// callback: login section
function customizeadmin_callback_section_login()
{

	echo '<p>' . esc_html__('These settings enable you to customize the WP Login screen.', 'customizeadmin') . '</p>';
}



// callback: admin section
function customizeadmin_callback_section_admin()
{

	echo '<p>' . esc_html__('These settings enable you to customize the WP Admin Area.', 'customizeadmin') . '</p>';
}



// callback: text field
function customizeadmin_callback_field_text($args)
{

	$options = get_option('customizeadmin_options', customizeadmin_options_default());

	$id    = isset($args['id'])    ? $args['id']    : '';
	$label = isset($args['label']) ? $args['label'] : '';

	$value = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

	echo '<input id="customizeadmin_options_' . $id . '" name="customizeadmin_options[' . $id . ']" type="text" size="40" value="' . $value . '"><br />';
	echo '<label for="customizeadmin_options_' . $id . '">' . $label . '</label>';
}



// radio field options
function customizeadmin_options_radio()
{

	return array(

		'enable'  => esc_html__('Enable custom styles', 'customizeadmin'),
		'disable' => esc_html__('Disable custom styles', 'customizeadmin')

	);
}



// callback: radio field
function customizeadmin_callback_field_radio($args)
{

	$options = get_option('customizeadmin_options', customizeadmin_options_default());

	$id    = isset($args['id'])    ? $args['id']    : '';
	$label = isset($args['label']) ? $args['label'] : '';

	$selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

	$radio_options = customizeadmin_options_radio();

	foreach ($radio_options as $value => $label) {

		$checked = checked($selected_option === $value, true, false);

		echo '<label><input name="customizeadmin_options[' . $id . ']" type="radio" value="' . $value . '"' . $checked . '> ';
		echo '<span>' . $label . '</span></label><br />';
	}
}



// callback: textarea field
function customizeadmin_callback_field_textarea($args)
{

	$options = get_option('customizeadmin_options', customizeadmin_options_default());

	$id    = isset($args['id'])    ? $args['id']    : '';
	$label = isset($args['label']) ? $args['label'] : '';

	$allowed_tags = wp_kses_allowed_html('post');

	$value = isset($options[$id]) ? wp_kses(stripslashes_deep($options[$id]), $allowed_tags) : '';

	echo '<textarea id="customizeadmin_options_' . $id . '" name="customizeadmin_options[' . $id . ']" rows="5" cols="50">' . $value . '</textarea><br />';
	echo '<label for="customizeadmin_options_' . $id . '">' . $label . '</label>';
}



// callback: checkbox field
function customizeadmin_callback_field_checkbox($args)
{

	$options = get_option('customizeadmin_options', customizeadmin_options_default());

	$id    = isset($args['id'])    ? $args['id']    : '';
	$label = isset($args['label']) ? $args['label'] : '';

	$checked = isset($options[$id]) ? checked($options[$id], 1, false) : '';

	echo '<input id="customizeadmin_options_' . $id . '" name="customizeadmin_options[' . $id . ']" type="checkbox" value="1"' . $checked . '> ';
	echo '<label for="customizeadmin_options_' . $id . '">' . $label . '</label>';
}



// select field options
function customizeadmin_options_select()
{

	return array(

		'default'   => esc_html__('Default',   'customizeadmin'),
		'light'     => esc_html__('Light',     'customizeadmin'),
		'blue'      => esc_html__('Blue',      'customizeadmin'),
		'coffee'    => esc_html__('Coffee',    'customizeadmin'),
		'ectoplasm' => esc_html__('Ectoplasm', 'customizeadmin'),
		'midnight'  => esc_html__('Midnight',  'customizeadmin'),
		'ocean'     => esc_html__('Ocean',     'customizeadmin'),
		'sunrise'   => esc_html__('Sunrise',   'customizeadmin'),

	);
}



// callback: select field
function customizeadmin_callback_field_select($args)
{

	$options = get_option('customizeadmin_options', customizeadmin_options_default());

	$id    = isset($args['id'])    ? $args['id']    : '';
	$label = isset($args['label']) ? $args['label'] : '';

	$selected_option = isset($options[$id]) ? sanitize_text_field($options[$id]) : '';

	$select_options = customizeadmin_options_select();

	echo '<select id="customizeadmin_options_' . $id . '" name="customizeadmin_options[' . $id . ']">';

	foreach ($select_options as $value => $option) {

		$selected = selected($selected_option === $value, true, false);

		echo '<option value="' . $value . '"' . $selected . '>' . $option . '</option>';
	}

	echo '</select> <label for="customizeadmin_options_' . $id . '">' . $label . '</label>';
}
