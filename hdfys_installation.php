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
	add_option('hdfys_version', "17");
	add_option('widget_hdfys_widget');
	add_option('hdfys_admin_lyric',"1");
	add_option('hdfys_text_updated',"0");
	}
}
register_activation_hook( __FILE__ , 'hdfys_activate' );

/**
 * Deactivate the plugin.
 *
 * @since 0.7
 */

function hdfys_deactivate () {
	// nothing to do
}
register_deactivation_hook( __FILE__ , 'hdfys_deactivate' );

/**
 * Deinstall the plugin.
 *
 * @since 0.7
 */

function hdfys_delete () {

	/* Checks, if the plugin have been activated before */
	if ( get_option('hdfys_activated') ) {

	/* Remove all settings */
	delete_option('hdfys_activated');
	delete_option('hdfys_song');
	delete_option('hdfys_version');
	delete_option('widget_hdfys_widget');
	delete_option('hdfys_admin_lyric');
	delete_option('hdfys_text_updated');
}
}
register_uninstall_hook( __FILE__ , 'hdfys_delete' );

?>