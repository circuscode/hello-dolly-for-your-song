<?php

/**
 * API
 *
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

/*
Security
*/

/* Avoids code execution without WordPress is loaded. */
if (!defined('ABSPATH'))
{
	exit;
}

/*
API ;-)
*/

/**
 * Returns the random line
 *
 * This function can be used to get the random line in external code. 
 *
 * @since 0.11
 *
 * @return string Random Line.
 */

function get_hello_dolly_for_your_song() {
	$hdfys_string = hdfys_get_anything();
	return $hdfys_string;
}

/*
Hooks: Actions & Filters
https://developer.wordpress.org/plugins/hooks/
*/

/*
Action
https://developer.wordpress.org/plugins/hooks/actions/
*/

/**
 * Does anything when new text will be saved in the plugin settings
 *
 * Action hdfys_new_song
 * Code Example
 *
 * @since 0.13
 */

// function hdfys_do_anything() {

	// Add your code to execute here

// } 
// add_action( 'hdfys_new_song', 'hdfys_do_anything', 10, 3 );

/*
Filter
https://developer.wordpress.org/plugins/hooks/filters/
*/

/**
 * Filters the output before it will rendered on the user interface
 *
 * Filter hdfys_output_filter
 * Code Example
 * 
 * @since 0.13
 * 
 * @return string Manipulated Output.
 */

// function hdfys_output_manipulate( $output ) {

	// Add your filter code here
	// Example: $output=strtolower( $output );

	// return $output;
// }
// add_filter( 'hdfys_output_filter', 'hdfys_output_manipulate', 10, 1 );

?>