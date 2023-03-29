<?php

/**
 * Random Core Functions
 * 
 * @package Hello Dolly For Your Song
 * @since 0.17
 */

// Avoids code execution if WordPress is not loaded (Security Measure)
if ( !defined('ABSPATH') ) {
	exit;
}

/**
 * Returns a random line from custom text.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function hdfys_get_lyric() {

	// Get custom text
	$lyrics = get_option('hdfys_song');

	// Get a random line
	$lyrics = hdfys_random_line($lyrics);

	return $lyrics;

}

/**
 * Returns a random line from Hello Dolly.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function hdfys_get_hello_dolly() {

	// Hello Dolly Lyric
	$hdfys_hello_dolly="Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	We feel the room swayin'
	While the band's playin'
	One of your old favourite songs from way back when
	So, take her wrap, fellas
	Find her an empty lap, fellas
	Dolly'll never go away again
	Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	We feel the room swayin'
	While the band's playin'
	One of your old favourite songs from way back when
	Golly, gee, fellas
	Find her a vacant knee, fellas
	Dolly'll never go away
	Dolly'll never go away
	Dolly'll never go away again";

	// Get random line
	$hdfys_hello_dolly = hdfys_random_line($hdfys_hello_dolly);

	return $hdfys_hello_dolly;

}

/**
 * Catches a random line from a given text.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function hdfys_random_line ($text) {
	$text = explode( "\n", $text );
    $text = wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );

	// If the last character of the line is blank, remove it
	$lastchar = substr($text, -1);
	if($lastchar == ' ') {$text = rtrim($text, " ");}

	return $text;
}

/**
 * Deliver a random line from custom text or Hello Dolly.
 *
 * @since 0.1
 * 
 * @return string Random Line
 */

function hdfys_get_anything () {

	// Get Custom Text
	$text = get_option('hdfys_song');

	// If Length=0 > No text is maintained
	$text = strlen($text);

	// Decide which text to take
	$line = ($text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;

	return $line;
}

?>