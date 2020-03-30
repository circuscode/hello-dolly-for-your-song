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

/*
API ;-)
*/

/* This returns the random line and can be used in any Theme/Plugin code */
function get_hello_dolly_for_your_song() {
	$hdfys_string = hdfys_get_anything();
	return $hdfys_string;
}

/*
Actions & Filters
*/

// Code Example: How to use the action?
// function hdfys_do_anything() {

	// Add your code to execute here

// } 
// add_action( 'hdfys_new_song', 'hdfys_do_anything', 10, 3 );

// Code Example: How to use the filter?
// function hdfys_output_manipulate( $output ) {

	// Add your filter code here
	// Example: $output=strtolower( $output );

	// return $output;
// }
// add_filter( 'hdfys_output_filter', 'hdfys_output_manipulate', 10, 1 );

?>