<?php

/**
 * Plugin Installation Process
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Initialize the plugin.
 *
 * @since 0.7
 */

function hdfys_activate () {

	/* Checks, if the plugin was installed newly */
	if (! get_option('hdfys_activated') ) {

	/* Initialize Settings */
	add_option('hdfys_activated',"1");
	add_option('hdfys_song',"");
	add_option('hdfys_version', "19");
	add_option('widget_hdfys_widget');
	add_option('hdfys_admin_lyric',"1");
	add_option('hdfys_text_updated',"0");
	}
}

/**
 * Deactivate the plugin.
 *
 * @since 0.7
 */

function hdfys_deactivate () {
	// nothing to do
}

?>