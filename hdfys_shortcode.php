<?php

/*
All things related to the shortcode
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
Shortcode
*/

/* The Unbelievable Shortcode ;-) */
function hdfys_shortcode() {
	$shortcode_line=hdfys_get_anything();
	$hdfys_shortcode_output= '<p class="hdfys shortcode">'. $shortcode_line .'</p>';
	$hdfys_shortcode_output=apply_filters( 'hdfys_output_filter', $hdfys_shortcode_output );
	return $hdfys_shortcode_output;
}
add_shortcode('hdfys','hdfys_shortcode');

?>