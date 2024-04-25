<?php

/**
 * Settings Page
 * 
 * @link https://codex.wordpress.org/Settings_API
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Create the options page.
 *
 * @since 0.7
 */

function hdfys_options() {

	/* Fire Action if custom text was updated */
	$hdfys_text_update=get_option('hdfys_text_updated');
	if($hdfys_text_update==1)
	{	
		do_action('hdfys_new_song');
		update_option('hdfys_text_updated','0');
	}
	
	// Output the headline
	echo '
	<div class="wrap">
	<h1>'. __('Options','hello-dolly-for-your-song').' › Hello Dolly For Your Song</h1>

	<form method="post" action="options.php">';

	// Create the option
	do_settings_sections( 'hdfys-options' );
	settings_fields( 'hdfys_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

/**
 * Create input field for the custom text.
 *
 * @since 0.7
 */

function hdfys_options_display_songtext() {
	echo '<textarea style="width:600px;height:400px;" class="regular-text" type="text" name="hdfys_song" id="hdfys_song">'.esc_textarea( get_option('hdfys_song')) .'</textarea>';
}

/**
 * Create label of the input field for the custom text.
 *
 * @since 0.7
 */

function hdfys_options_content_description() {
	echo '<p>'. __('Basic Settings','hello-dolly-for-your-song').'</p>';
}

/**
 * Output the options
 * 
 * The functions uses the settings API of WordPress
 *
 * @since 0.7
 */

function hdfys_options_display() {

	add_settings_section("content_settings_section", '' , "hdfys_options_content_description", "hdfys-options");
	
	add_settings_section("content_settings_section", __('Plugin','hello-dolly-for-your-song') , "hdfys_options_content_description", "hdfys-options");

	add_settings_field("hdfys_song", __('Custom Text','hello-dolly-for-your-song') , "hdfys_options_display_songtext", "hdfys-options", "content_settings_section");

	register_setting("hdfys_settings", "hdfys_song", "hdfys_validate_songtext");
}
add_action("admin_init", "hdfys_options_display");

/**
 * Validate the user input
 *
 * @since 0.7
 */

function hdfys_validate_songtext ( $songtext ) {
	update_option('hdfys_text_updated',"1");
	$songtext = preg_replace("/[\r\n]+[\s\t]*[\r\n]+/","\n", $songtext);
    return $songtext;
}

/**
 * Integrate the options page into the menu
 *
 * @since 0.7
 */

function hdfys_show_options() {
	add_options_page('Hello Dolly For Your Song', 'Hello Dolly Your Song', 'manage_options', basename(__FILE__), "hdfys_options");
}
add_action( 'admin_menu', 'hdfys_show_options');

?>