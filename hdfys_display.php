<?php

/**
 * User Interface
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */


// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Prints the random line to the admin head in WordPress.
 *
 * @since 0.3
 * @since 0.9 Hidden Setting
 */

function hdfys() {

	// Read setting
	$hdfys_admin_show = get_option('hdfys_admin_lyric');

	// Should I print or not?
	if ( $hdfys_admin_show==1 AND ( hdfys_where_am_i() ) ) {

		// Get text
		$line=hdfys_get_anything();

		// Output
		echo "<p class='admin-hdfys'>".esc_html($line)."</p>";
	}
}
add_action( 'admin_notices', 'hdfys' );

/**
 * Checks the page and decides to print the line or not.
 *
 * @since 0.14
 * 
 * @return boolean true=yes false=no
 */

function hdfys_where_am_i() {

	// Get current page
	global $pagenow;

	// Run on specific pages only
    if ( $pagenow == 'index.php' OR $pagenow == 'edit.php' OR $pagenow == 'edit-comments.php' OR $pagenow == 'post.php') {
		
		// Get Post Type
		if (isset($_GET['post_type'])) {
			$postscope=$_GET["post_type"];
		}
		else {
			$postscope='';
		}
		
		// Sorry, I do not remember, what is the idea here
		if ( $pagenow == 'edit.php' AND (!($postscope == '' OR $postscope == 'page')) ) {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}

}

/**
 * Adds the required CSS styling in the WordPress Backend.
 *
 * @since 0.1
 */

function hdfys_css() {
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	.admin-hdfys {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}
add_action( 'admin_head', 'hdfys_css' );

?>