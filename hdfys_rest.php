<?php

/*
All things related to the REST API
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
Integration into WordPress REST API
*/

/*
Following code was written from Jake Spurlock
Taken from the restful hello dolly plugin
Author URI: http://jakespurlock.com
Plugin URI: https://wordpress.org/plugins/restful-hello-dolly/
*/

/* RESTful Hello Dolly For Your Song Class. */
class RESTful_Hello_Dolly_For_Your_Song {

	/* The one instance of RESTful Hello Dolly Routes. */
	private static $instance;
	
	/* Instantiate or return the one RESTful Hello Dolly Routes instance. */
	public static function instance() {
	
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
	
		return self::$instance;
	}
	
	/* Construct the object. */
	public function __construct() {
			add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}
	
	/* Register the API routes */
	public function register_routes() {
	
		// Return a random Hello Dolly For Your Song line
		register_rest_route( 'restful-hello-dolly-for-your-song', '/text', array(
			'methods' => WP_REST_Server::READABLE,
			'callback' => array( $this, 'rest_get_hello_dolly_for_your_song' ),
		) );
	}
	
	/* Use the search endpoint to get a list of recent articles that were published */
	public function rest_get_hello_dolly_for_your_song( $request ) {
		$hdfys_rest_output=hdfys_get_anything();
		return $hdfys_rest_output;
	}
	
	} // class RESTful_Hello_Dolly_For_Your_Song
	
	/* Wrapper function to return the one RESTful Hello Dolly Output instance. */
	function RESTful_Hello_Dolly_For_Your_Song() {
		return RESTful_Hello_Dolly_For_Your_Song::instance();
	}
	
	/* Kick off the class. */
	add_action( 'init', 'RESTful_Hello_Dolly_For_Your_Song' );

?>