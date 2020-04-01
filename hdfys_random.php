<?php

/*
All things related to the random line
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
Random Functions
*/

/* This returns a random line from the custom text */
function hdfys_get_lyric() {

	$lyrics = get_option('hdfys_song');
	$lyrics = hdfys_random_line($lyrics);
	return $lyrics;

}

/* This returns a random line from the song Hello Dolly */
function hdfys_get_hello_dolly() {

	/* Hello Dolly Lyric */
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

	$hdfys_hello_dolly = hdfys_random_line($hdfys_hello_dolly);
	return $hdfys_hello_dolly;

}

/* This catches a random line from a given text */
function hdfys_random_line ($text) {
	$text = explode( "\n", $text );
    return wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );
}

/* This delivers a random line from custom text or hello dolly fallback */
function hdfys_get_anything () {
	$text = get_option('hdfys_song');
	$text = strlen($text);
	$line = ($text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	return $line;
}

?>