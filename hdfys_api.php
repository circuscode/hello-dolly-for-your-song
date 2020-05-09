<?php

/**
 * API
 * 
 * Interface, Hooks, Actions, Filters, Code Templates
 *
 * @link https://developer.wordpress.org/plugins/hooks/
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Returns the random line.
 *
 * This api function can be used to get the random line in external code. 
 * Filter will not be applied on this getter function.
 *
 * @since 0.11
 *
 * @return string Random Line
 */

function get_hello_dolly_for_your_song() {
	$hdfys_random = hdfys_get_anything();
	return $hdfys_random;
}

/**
 * Does anything when new text will be saved in the plugin settings.
 *
 * Code Example Action Usage:
 * 
 *		function hdfys_do_anything() {
 * 
 * 			// Add your code to execute here
 * 
 * 		} 
 *		add_action( 'hdfys_new_song', 'hdfys_do_anything', 10, 3 );
 * 
 * @link https://developer.wordpress.org/plugins/hooks/actions/
 *
 * @since 0.13
 * @see hdfys_new_song
 */

/**
 * Filters the output before it will rendered on the user interface.
 *
 * Code Example Filter Usage:
 * 
 * 		function hdfys_output_manipulate( $output ) {
 * 
 * 			// Add your filter code here
 *			// Example: $output=strtolower( $output );
 *
 *		return $output;
 *
 * 		}
 * 		add_filter( 'hdfys_output_filter', 'hdfys_output_manipulate', 10, 1 );
 * 
 * @link https://developer.wordpress.org/plugins/hooks/filters/
 * 
 * @since 0.13
 * @see hdfys_output_filter
 * 
 * @return string Manipulated Output
 */

?>