<?php

/**
 * Plugin Uninstall Process
 * 
 * The uninstall routine will be triggered by WordPress automaticly.
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

/*
 * Deinstall the plugin.
 *
 * @since 0.7
 */

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

?>