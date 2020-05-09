<?php

/**
 * Site Health
 * 
 * @link https://make.wordpress.org/core/2019/04/25/site-health-check-in-5-2/
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
 * Add Hello Dolly for Your Song test to Site Health.
 *
 * @since 0.16
 *
 * @return array Site Health Test
 */

function hdfys_add_hello_dolly_test( $tests ) {
    $tests['direct']['hdfys_plugin'] = array(
        'label' => __( 'Hello Dolly For Your Song', 'hello-dolly-for-your-song' ),
        'test'  => 'hdfys_hello_dolly_test',
    );
    return $tests;
}
add_filter( 'site_status_tests', 'hdfys_add_hello_dolly_test' );

/**
 * Create the Site Health Test Output.
 *
 * @since 0.16
 *
 * @return array Test Results
 */

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
            __( 'It makes no sense to run the plugins Hello Dolly and Hello Dolly For Your Song simultaneously.', 'hello-dolly-for-your-song' )
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
            __( 'Hello Dolly and Hello Dolly For Your Song should not run at the same time. One of them should be deactivated.', 'hello-dolly-for-your-song' )
        );
        $result['actions'] .= sprintf(
            '<p><a href="%s">%s</a></p>',
            esc_url( admin_url( 'plugins.php' ) ),
            __( 'Plugin Administration', 'hello-dolly-for-your-song' )
        );
    }
 
    return $result;
}

/**
 * Execute the site health test.
 * 
 * Checks if the plugin Hello Dolly is active
 *
 * @since 0.16
 *
 * @return boolean Result of the test
 */

function hdfys_check_hello_dolly() {
	if ( is_plugin_active('hello-dolly/hello.php') ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Add Hello Dolly to WordPress debug info.
 * 
 * Functions adds the maintained text to debug info.
 *
 * @since 0.16
 *
 * @return array debug information
 */

function hdfys_add_debug_info( $debug_info ) {
    $debug_info['hdfys'] = array(
        'label'    => __( 'Hello Dolly For Your Song', 'hello-dolly-for-your-song' ),
        'fields'   => array(
            'license' => array(
                'label'    => __( 'Custom Text', 'hello-dolly-for-your-song' ),
                'value'   => get_option( 'hdfys_song' ),
                'private' => true,
            ),
        ),
    );
 
    return $debug_info;
}
add_filter( 'debug_information', 'hdfys_add_debug_info' );

?>