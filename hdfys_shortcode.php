<?php

/**
 * Shortcode
 * 
 * @link https://developer.wordpress.org/plugins/shortcodes/
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if (!defined('ABSPATH'))
{
	exit;
}

/**
 * Create the unbelievable shortcode ;-)
 *
 * @since 0.5
 *
 * @return string Shortcode HTML markup
 */

function hdfys_shortcode() {
	$shortcode_line=hdfys_get_anything();
	$hdfys_shortcode_output= '<p class="hdfys shortcode">'.esc_html($shortcode_line).'</p>';
	$hdfys_shortcode_output=apply_filters( 'hdfys_output_filter', $hdfys_shortcode_output );
	return $hdfys_shortcode_output;
}
add_shortcode('hdfys','hdfys_shortcode');

?>