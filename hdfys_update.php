<?php

/**
 * Update Process
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
 * Run the update process.
 *
 * @since 0.7
 */

function hdfys_update () {

$hdfys_previous_version = get_option('hdfys_version');

/* Update Process Version 0.7 */
if($hdfys_previous_version==false) {
add_option('hdfys_activated',"1");
add_option('hdfys_version', "7");
$lyrics = get_option('hdfys_song');
$lyrics = stripcslashes($lyrics);
update_option('hdfys_song',$lyrics);
}
/* Update Process Version 0.8 */
if($hdfys_previous_version==7) {
update_option('hdfys_version','8');
}
/* Update Process Version 0.9 */
if($hdfys_previous_version==8) {
update_option('hdfys_version','9');
add_option('hdfys_admin_lyric',"1");
}
/* Update Process Version 0.10 */
if($hdfys_previous_version==9) {
update_option('hdfys_version','10');
}
/* Update Process Version 0.11 */
if($hdfys_previous_version==10) {
update_option('hdfys_version','11');
}
/* Update Process Version 0.12 */
if($hdfys_previous_version==11) {
update_option('hdfys_version','12');
}
/* Update Process Version 0.13 */
if($hdfys_previous_version==12) {
update_option('hdfys_version','13');
add_option('hdfys_text_updated',"0");
}
/* Update Process Version 0.14 */
if($hdfys_previous_version==13) {
update_option('hdfys_version','14');
}
/* Update Process Version 0.15 */
if($hdfys_previous_version==14) {
update_option('hdfys_version','15');
}
/* Update Process Version 0.16 */
if($hdfys_previous_version==15) {
update_option('hdfys_version','16');
}
/* Update Process Version 0.17 */
if($hdfys_previous_version==16) {
update_option('hdfys_version','17');
}
/* Update Process Version 0.18 */
if($hdfys_previous_version==17) {
update_option('hdfys_version','18');
}
/* Update Process Version 0.19 */
if($hdfys_previous_version==18) {
update_option('hdfys_version','19');
}
  
}
add_action( 'plugins_loaded', 'hdfys_update' );

?>