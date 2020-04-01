<?php

/*
All things related to translations
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
Translations
*/

/* This creates the url, where the plugin translations can be found */
function hdfys_load_textdomain() {
	load_plugin_textdomain('hello-dolly-for-your-song', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action( 'init', 'hdfys_load_textdomain' );

?>