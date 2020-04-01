<?php

/*
All things related to Plugin Updates
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
Update
*/

/* This is the update process */
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

}
add_action( 'plugins_loaded', 'hdfys_update' );

?>