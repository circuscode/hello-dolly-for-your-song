<?php

/*
Plugin Name:  Hello Dolly For Your Song
Plugin URI:   https://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/
Description:  This simple plugin shows a random line of any text in your blog.
Version:	  0.19
Author:       Marco Hitschler
Author URI:   https://www.unmus.de/
License:      GPL3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:  hello-dolly-for-your-song
Domain Path:  /languages
*/

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Include the code files of the plugin (basic setup).
 */

require_once('hdfys_translations.php');
require_once('hdfys_installation.php');
require_once('hdfys_update.php');
require_once('hdfys_random.php');
require_once('hdfys_display.php');
require_once('hdfys_settings.php');
require_once('hdfys_widget.php');
require_once('hdfys_shortcode.php');
require_once('hdfys_templatetag.php');
require_once('hdfys_rest.php');
require_once('hdfys_gutenberg.php');
require_once('hdfys_sitehealth.php');
require_once('hdfys_api.php');

/**
 * Installation & Deactivation
 */

register_activation_hook( __FILE__ , 'hdfys_activate' );
register_deactivation_hook( __FILE__ , 'hdfys_deactivate' );

/**
 * Add the settings link on the plugin page.
 * 
 * @package Hello Dolly For Your Song
 * @since 0.10
 */

function hdfys_add_plugin_page_links ( $links ) {
	$hdfys_links = array('<a href="' . admin_url( 'options-general.php?page=hdfys_settings.php' ) . '">'. __('Options','hello-dolly-for-your-song').'</a>',);
	return array_merge( $links, $hdfys_links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'hdfys_add_plugin_page_links' );

?>
