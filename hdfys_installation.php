<?php

/*
All things related to Installation & Deinstallation
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
Installation
*/

/* This is the installation process */
function hdfys_activate () {

	/* Checks, if the plugin was only deactivated */
	if (! get_option('hdfys_activated') ) {

	/* Initialize Settings */
	add_option('hdfys_activated',"1");
	add_option('hdfys_song',"");
	add_option('hdfys_version', "16");
	add_option('widget_hdfys_widget');
	add_option('hdfys_admin_lyric',"1");
	add_option('hdfys_text_updated',"0");
	}
}
register_activation_hook( __FILE__ , 'hdfys_activate' );

/*
Deactivation
*/

/* This is the plugin deactivation process */
function hdfys_deactivate () {
	// nothing to do
}
register_deactivation_hook( __FILE__ , 'hdfys_deactivate' );

/*
Deinstallation
*/

/* This is the plugin deinstallation process */ 
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