<?php

/**
 * Gutenberg Block
 * 
 * @link https://developer.wordpress.org/block-editor/developers/
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

// Get WordPress Version
global $wp_version;

// Run only if WordPress 5 or above
if ( version_compare( $wp_version, '5', '>=' ) ) {

/**
 * Prepare Block Content.
 *
 * @since 0.13
 *
 * @return string Random Line with HTML markup
 */

function hdfys_gutenberg_block() {

	// Get Random
	$gutenberg_line = hdfys_get_anything();

	// Add HTML Markup
	$gutenberg_output = '<p class="hdfys gutenberg-block">'.esc_html($gutenberg_line).'</p>';

	// Process Filter
	$gutenberg_output=apply_filters( 'hdfys_output_filter', $gutenberg_output );

	// Return Random Line with Markup
	return $gutenberg_output;
}

/**
 * Gutenberg Block Assets.
 *
 * Following code is based on the Gutenberg Boilerplates from Ahmad Awais.
 * 
 * @link https://ahmadawais.com/gutenberg-boilerplate/
 * 
 * @since 0.13
 */

function hdfys_block_editor_assets() {

	// Get Hello Dolly for Your Song
	$hdfys_params = array(
		'hdfys_random' => get_hello_dolly_for_your_song()
	);

	// Block Java Script
	wp_enqueue_script(
		'gb-block-hdfys',
		plugins_url( 'block.js', __FILE__ ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	// Bring the Random Line from here into the Block Java Script
	wp_localize_script( 'gb-block-hdfys', 'hdfysParams', $hdfys_params );

} 
add_action( 'enqueue_block_editor_assets', 'hdfys_block_editor_assets' );

// Fallback Rendering @ FrontEnd
register_block_type( 'hdfys/hdfys', array(
	'render_callback' => 'hdfys_gutenberg_block'
) );

} // End WordPress 5 Check

?>