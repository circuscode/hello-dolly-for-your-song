<?php

/*
All things related to other minor functions
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
Customizing @ Plugin Page
*/

/* This adds the settings link on the plugin page */
function hdfys_add_plugin_page_links ( $links ) {
	$hdfys_links = array('<a href="' . admin_url( 'options-general.php?page=hellodollyforyoursong' ) . '">'. __('Options','hello-dolly-for-your-song').'</a>',);
	return array_merge( $links, $hdfys_links );
	}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'hdfys_add_plugin_page_links' );

?>