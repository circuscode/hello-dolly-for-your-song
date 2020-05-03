<?php

/*
All things related to the options page
*/

/*
Security
*/

/* This avoids code execution without WordPress is loaded. */
if (!defined('ABSPATH'))
{
	exit;
}

/*
Options Page
*/

/* This generates the option page of hello dolly for your song */
function hdfys_options() {

	/* Fire Action if Text was updated */
	$hdfys_text_update=get_option('hdfys_text_updated');
	if($hdfys_text_update==1)
	{	
		do_action('hdfys_new_song');
		update_option('hdfys_text_updated','0');
	}
	
	echo '
	<div class="wrap">
	<h1>'. __('Options','hello-dolly-for-your-song').' › Hello Dolly For Your Song</h1>

	<form method="post" action="options.php">';

	do_settings_sections( 'hdfys-options' );
	settings_fields( 'hdfys_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

/* This defines the textfield on the options page */
function hdfys_options_display_songtext() {
	echo '<textarea style="width:600px;height:400px;" class="regular-text" type="text" name="hdfys_song" id="hdfys_song">'. get_option('hdfys_song') .'</textarea>';
}

/* This defines the label of the textfield on the options page */
function hdfys_options_content_description() {
	echo '<p>'. __('Insert a text.','hello-dolly-for-your-song').'</p>';
}

/* This generates the content on options page */
function hdfys_options_display() {

	add_settings_section("content_settings_section", __('Basic Settings','hello-dolly-for-your-song') , "hdfys_options_content_description", "hdfys-options");

	add_settings_field("hdfys_song", __('Custom Text','hello-dolly-for-your-song') , "hdfys_options_display_songtext", "hdfys-options", "content_settings_section");

	register_setting("hdfys_settings", "hdfys_song", "hdfys_validate_songtext");
}
add_action("admin_init", "hdfys_options_display");

/* This is the validation of the user input */
function hdfys_validate_songtext ( $songtext ) {
	update_option('hdfys_text_updated',"1");
	$songtext = preg_replace("/[\r\n]+[\s\t]*[\r\n]+/","\n", $songtext);
    return $songtext;
}

/* This integrates the plugin options page into the wordpress options menu */
function hdfys_show_options() {
	add_options_page('Hello Dolly For Your Song', 'Hello Dolly Your Song', 10, basename(__FILE__), "hdfys_options");
}
add_action( 'admin_menu', 'hdfys_show_options');

?>