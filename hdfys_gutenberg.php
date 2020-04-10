<?php

/*
All things related to Gutenberg
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
Gutenberg
*/

/* Run only if WordPress 5.0 or above */

global $wp_version;
if ( version_compare( $wp_version, '5', '>=' ) ) {

/* Prepare Block Content */
function hdfys_gutenberg_block() {
	$gutenberg_line = hdfys_get_anything();
	$gutenberg_output = '<p class="hdfys gutenberg-block">'. $gutenberg_line .'</p>';
	$gutenberg_output=apply_filters( 'hdfys_output_filter', $gutenberg_output );
	return $gutenberg_output;
}

/*
Following code is based on the Gutenberg Boilerplates from Ahmad Awais
https://ahmadawais.com/gutenberg-boilerplate/
*/

/* Gutenberg Block Assets */
function hdfys_block_editor_assets() {

	/* Get Hello Dolly for Your Song */
	$hdfys_params = array(
		'hdfys_random' => get_hello_dolly_for_your_song()
	);

	/* Block Java Script */
	wp_enqueue_script(
		'gb-block-hdfys',
		plugins_url( 'block.js', __FILE__ ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	/* Bring the Random Line from here into the Block Java Script */
	wp_localize_script( 'gb-block-hdfys', 'hdfysParams', $hdfys_params );

} 
add_action( 'enqueue_block_editor_assets', 'hdfys_block_editor_assets' );

/* Fallback Rendering @ FrontEnd */
register_block_type( 'hdfys/hdfys', array(
	'render_callback' => 'hdfys_gutenberg_block'
) );

} // End WordPress 5 Check

?>