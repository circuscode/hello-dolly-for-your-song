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
Template Tag
*/

/* The Unbelievable Template Tag ;-) */
function hello_dolly_for_your_song() {
	$hdfys_template_tag_line = hdfys_get_anything();
	$hdfys_template_tag_output='<div class="hdfys templatetag">'. $hdfys_template_tag_line .'</div>';
	$hdfys_template_tag_output=apply_filters( 'hdfys_output_filter', $hdfys_template_tag_output );
	echo $hdfys_template_tag_output;
}

?>