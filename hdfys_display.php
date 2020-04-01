<?php

/*
All things related to User Interface
*/

/*
Security
*/

/* This avoids code execution without WordPress is loaded. */
if (!defined('ABSPATH'))
{
	exit;
}

/* This prints the random line to the admin head in the wordpress backend */
function hdfys() {
	$hdfys_admin_show = get_option('hdfys_admin_lyric');
	if ($hdfys_admin_show==1 AND (hdfys_where_am_i()) ) {
		$line=hdfys_get_anything();
		echo "<p class='admin-hdfys'>".$line."</p>";
	}
}
add_action( 'admin_notices', 'hdfys' );

/* This checks the page and decide to print the line or not */
function hdfys_where_am_i() {

	global $pagenow;
    if ( $pagenow == 'index.php' OR $pagenow == 'edit.php' OR $pagenow == 'upload.php' OR $pagenow == 'edit-comments.php' OR $pagenow == 'post.php') {
		
		if (isset($_GET['post_type'])) {
			$postscope=$_GET["post_type"];
		}
		else {
			$postscope='';
		}
		
		if ( $pagenow == 'edit.php' AND (!($postscope == '' OR $postscope == 'page')) ) {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}

}

/* This is adding required CSS styles in the wordpress backend */
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