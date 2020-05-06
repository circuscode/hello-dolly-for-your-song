<?php

/**
 * Translations
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution without WordPress is loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Create url to translation files.
 *
 * @since 0.4
 */

function hdfys_load_textdomain() {
	load_plugin_textdomain('hello-dolly-for-your-song', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action( 'init', 'hdfys_load_textdomain' );

?>