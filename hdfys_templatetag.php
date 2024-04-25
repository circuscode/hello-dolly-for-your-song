<?php

/**
 * Template Tag
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
 * Create the unbelievable template tag ;-)
 *
 * @since 0.8
 */

function hello_dolly_for_your_song() {
	$hdfys_template_tag_line = hdfys_get_anything();
	$hdfys_template_tag_output='<div class="hdfys templatetag">'. esc_html($hdfys_template_tag_line) .'</div>';
	$hdfys_template_tag_output=apply_filters( 'hdfys_output_filter', $hdfys_template_tag_output );
	echo $hdfys_template_tag_output;
}

?>