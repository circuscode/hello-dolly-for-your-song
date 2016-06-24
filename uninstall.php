<?php

if ( !defined('WP_UNINSTALL_PLUGIN') ) {
    exit();
}
delete_option('hdfys_song');
delete_option('widget_hdfys_widget');

?>