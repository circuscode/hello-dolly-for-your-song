<?php

/*
Plugin Name:  Hello Dolly For Your Song
Plugin URI:   https://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/
Description:  This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg. It shows a random line of any text in your blog. 
Version:	  0.10
Author:       Marco Hitschler
Author URI:   https://www.unmus.de/
License:      GPL3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Domain Path:  /languages
Text Domain:  hdfys
*/

/* 
Security
*/

if (!defined('ABSPATH')) 
{  
	exit;
}

/*
Basic Setup
*/

load_plugin_textdomain('hellodollyforyoursong', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');

/*
Installation
*/

function hdfys_activate () {
		
	if (! get_option('hdfys_activated') ) {
	
	/* Initialize Settings */
	
	add_option('hdfys_activated',"1");
	add_option('hdfys_song',"");
	add_option('hdfys_version', "9");
	add_option('widget_hdfys_widget');
	add_option('hdfys_admin_lyric',"1");
	}
}
register_activation_hook( __FILE__ , 'hdfys_activate' );

function hdfys_deactivate () {
	// nothing to do
}
register_deactivation_hook( __FILE__ , 'hdfys_deactivate' );

function hdfys_delete () {

		if ( get_option('hdfys_activated') ) {

		delete_option('hdfys_activated');
		delete_option('hdfys_song');
		delete_option('hdfys_version');
		delete_option('widget_hdfys_widget');
		delete_option('hdfys_admin_lyric');

	}
	
}
register_uninstall_hook( __FILE__ , 'hdfys_delete' ); 

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
	
} 
add_action( 'plugins_loaded', 'hdfys_update' );

/*
Content Functions
*/

function hdfys_get_lyric() {
	
	$lyrics = get_option('hdfys_song');
	$lyrics = hdfys_random_line($lyrics); 
	return $lyrics;

}

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

/*
Random Line
*/

function hdfys_random_line ($text) {
	$text = explode( "\n", $text );
    return wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );
}

/*
Display of the songtext @ admin head
*/

function hdfys() {	
	$hdfys_admin_show = get_option('hdfys_admin_lyric');
	if ($hdfys_admin_show==1) {
		$text = get_option('hdfys_song');
		$text = strlen($text);
		$line = ($text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
		echo "<p class='admin-hdfys'>".$line."</p>";
	}
}
add_action( 'admin_notices', 'hdfys' );

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

/*
Options Page
*/

function hdfys_options() {
	
	echo '
	<div class="wrap">
	<h1>'. __('Options','hellodollyforyoursong').' › Hello Dolly For Your Song</h1>
	
	<form method="post" action="options.php">';
	
	do_settings_sections( 'hdfys-options' );
	settings_fields( 'hdfys_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

function hdfys_options_display_songtext() {
	echo '<textarea style="width:600px;height:400px;" class="regular-text" type="text" name="hdfys_song" id="hdfys_song">'. get_option('hdfys_song') .'</textarea>';
}

function hdfys_options_content_description() { 
	echo '<p>'. __('Post your lyrics.','hellodollyforyoursong').'</p>'; 
}

function hdfys_options_display() {
	
	add_settings_section("content_settings_section", __('Just one thing','hellodollyforyoursong') , "hdfys_options_content_description", "hdfys-options");
	
	add_settings_field("hdfys_song", __('Text','hellodollyforyoursong') , "hdfys_options_display_songtext", "hdfys-options", "content_settings_section");
	
	register_setting("hdfys_settings", "hdfys_song", "hdfys_validate_songtext");
}
add_action("admin_init", "hdfys_options_display");

function hdfys_validate_songtext ( $songtext ) {

    return $songtext;
} 

function hdfys_show_options() {
	add_options_page('Hello Dolly For Your Song', 'Hello Dolly Your Song', 10, basename(__FILE__), "hdfys_options");
}
add_action( 'admin_menu', 'hdfys_show_options');

/*
Widget
*/

// The Unbelievable Widget ;-)
class hdfys_widget extends WP_Widget {
	
	// Definition
	public function __construct() {
		parent::__construct(
		'hdfys_widget', 
		'Hello Dolly For Your Song', 
		array( 'description' => __( 'Show a custom line of your text', 'hellodollyforyoursong'  ), ) 
		);
	}

	// Output
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$widget_text = get_option('hdfys_song');
		$widget_text = strlen($widget_text);
		$widget_line = ($widget_text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
		echo '<aside class="widget hdfys">';
		echo '<h3 class="widget-title hdfys">';
			if ( ! empty( $title ) )
				echo $title;
		echo '</h3>';
		echo '<p class="widget-hdfys">'.$widget_line.'</p>';
		echo '</aside>';
	}

	// Form
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	// Update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}

function register_hdfys_widget() {
    register_widget( 'Hdfys_widget' );
}
add_action( 'widgets_init', 'register_hdfys_widget' );

/*
Shortcode
*/

// The Unbelievable Shortcode ;-)

function hdfys_shortcode() {
	$shortcode_text = get_option('hdfys_song');
	$shortcode_length = strlen($shortcode_text);
	$shortcode_line = ($shortcode_length > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	return '<p class="hdfys shortcode">'. $shortcode_line .'</p>';
}
add_shortcode('hdfys','hdfys_shortcode');

/*
Template Tag
*/

// The Unbelievable Template Tag

function hello_dolly_for_your_song() {
	$hdfys_text = get_option('hdfys_song');
	$hdfys_text_length = strlen($hdfys_text);
	$hdfys_template_tag_output = ($hdfys_text_length > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	return '<div class="hdfys templatetag">'. $hdfys_template_tag_output .'</div>';
}

/*
Links @ Plugin Page
*/

function hdfys_add_plugin_page_links ( $links ) {
$hdfys_links = array('<a href="' . admin_url( 'options-general.php?page=hellodollyforyoursong' ) . '">'. __('Options','hellodollyforyoursong').'</a>',);
return array_merge( $links, $hdfys_links );
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'hdfys_add_plugin_page_links' );
 
?>