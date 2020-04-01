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
Site Health
*/

/* This adds an additional Test to Site Health */
function hdfys_add_hello_dolly_test( $tests ) {
    $tests['direct']['hdfys_plugin'] = array(
        'label' => __( 'Hello Dolly For Your Song', 'hello-dolly-for-your-song' ),
        'test'  => 'hdfys_hello_dolly_test',
    );
    return $tests;
}
add_filter( 'site_status_tests', 'hdfys_add_hello_dolly_test' );

/* This prints the Test Results on the Site Health Page */
function hdfys_hello_dolly_test() {

	// Positive Check
    $result = array(
        'label'       => __( 'Plugin Hello Dolly is not active.', 'hello-dolly-for-your-song' ),
        'status'      => 'good',
        'badge'       => array(
            'label' => __( 'Performance', 'hello-dolly-for-your-song' ),
            'color' => 'green',
        ),
        'description' => sprintf(
            '<p>%s</p>',
            __( 'It does not make sense, running the plugins Hello Dolly For Your Song and Hello Dolly in parallel.', 'hello-dolly-for-your-song' )
        ),
        'actions'     => '',
        'test'        => 'hdfys_plugin',
    );
 
	// Overwrite: Negative Check
    if ( hdfys_check_hello_dolly() ) {
        $result['status'] = 'recommended';
        $result['label'] = __( 'Plugin Hello Dolly is active.', 'hello-dolly-for-your-song' );
        $result['description'] = sprintf(
            '<p>%s</p>',
            __( 'The Plugin Hello Dolly is active. Hello Dolly For Your Song and Hello Dolly should not run in parallel. One of them should be deactivated.', 'hello-dolly-for-your-song' )
        );
        $result['actions'] .= sprintf(
            '<p><a href="%s">%s</a></p>',
            esc_url( admin_url( 'plugins.php' ) ),
            __( 'Plugin Administration', 'hello-dolly-for-your-song' )
        );
    }
 
    return $result;
}

/* This is the test to execute */
function hdfys_check_hello_dolly() {
	if ( is_plugin_active('hello-dolly/hello.php') ) {
		return true;
	} else {
		return false;
	}
}

/* This adds debug info to Site Health */
function hdfys_add_debug_info( $debug_info ) {
    $debug_info['hdfys'] = array(
        'label'    => __( 'Hello Dolly For Your Song', 'hello-dolly-for-your-song' ),
        'fields'   => array(
            'license' => array(
                'label'    => __( 'Text', 'hello-dolly-for-your-song' ),
                'value'   => get_option( 'hdfys_song' ),
                'private' => true,
            ),
        ),
    );
 
    return $debug_info;
}
add_filter( 'debug_information', 'hdfys_add_debug_info' );

?>