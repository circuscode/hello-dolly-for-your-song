<?php

/*
Plugin Name:  Hello Dolly For Your Song
Plugin URI:   https://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/
Description:  This simple plugin shows a random line of any text in your blog.
Version:	  0.16
Author:       Marco Hitschler
Author URI:   https://www.unmus.de/
License:      GPL3
License URI:  https://www.gnu.org/licenses/gpl-3.0.html
Text Domain:  hello-dolly-for-your-song
Domain Path:  /languages
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
Basic Setup
*/

/* This creates the url, where the plugin translations can be found */
function hdfys_load_textdomain() {
	load_plugin_textdomain('hello-dolly-for-your-song', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action( 'init', 'hdfys_load_textdomain' );

/*
Installation
*/

/* This is the installation process */
function hdfys_activate () {

		/* Checks, if the plugin was only deactivated */
		if (! get_option('hdfys_activated') ) {

		/* Initialize Settings */
		add_option('hdfys_activated',"1");
		add_option('hdfys_song',"");
		add_option('hdfys_version', "16");
		add_option('widget_hdfys_widget');
		add_option('hdfys_admin_lyric',"1");
		add_option('hdfys_text_updated',"0");
		}
}
register_activation_hook( __FILE__ , 'hdfys_activate' );

/* This is the plugin deactivation process */
function hdfys_deactivate () {
		// nothing to do
}
register_deactivation_hook( __FILE__ , 'hdfys_deactivate' );

/* This is the plugin deinstallation process */ 
function hdfys_delete () {

		/* Checks, if the plugin have been activated before */
		if ( get_option('hdfys_activated') ) {

		/* Remove all settings */
		delete_option('hdfys_activated');
		delete_option('hdfys_song');
		delete_option('hdfys_version');
		delete_option('widget_hdfys_widget');
		delete_option('hdfys_admin_lyric');
		delete_option('hdfys_text_updated');
	}
}
register_uninstall_hook( __FILE__ , 'hdfys_delete' );

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

/*
Content Functions
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

/*
Random Line
*/

/* This catches a random line from a given text */
function hdfys_random_line ($text) {
	$text = explode( "\n", $text );
    return wptexturize( $text[ mt_rand( 0, count( $text ) - 1 ) ] );
}

/*
Processing
*/

/* This delivers a random line from custom text or hello dolly fallback */
function hdfys_get_anything () {
	$text = get_option('hdfys_song');
	$text = strlen($text);
	$line = ($text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	return $line;
}

/*
Display of the songtext @ admin head
*/

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

/*
Options Page
*/

/* This generates the option page of hello dolly for your song */
function hdfys_options() {

	/* Fire Action if Text was updated */
	$hdfys_text_update=get_option('hdfys_text_updated');
	if($hdfys_text_update==1)
	{	
		do_action('hdfys_new_song');
		update_option('hdfys_text_updated','0');
	}
	
	echo '
	<div class="wrap">
	<h1>'. __('Options','hello-dolly-for-your-song').' › Hello Dolly For Your Song</h1>

	<form method="post" action="options.php">';

	do_settings_sections( 'hdfys-options' );
	settings_fields( 'hdfys_settings' );
	submit_button();

	echo '</form></div><div class="clear"></div>';
}

/* This defines the textfield on the options page */
function hdfys_options_display_songtext() {
	echo '<textarea style="width:600px;height:400px;" class="regular-text" type="text" name="hdfys_song" id="hdfys_song">'. get_option('hdfys_song') .'</textarea>';
}

/* This defines the label of the textfield on the options page */
function hdfys_options_content_description() {
	echo '<p>'. __('Post your lyrics.','hello-dolly-for-your-song').'</p>';
}

/* This generates the content on options page */
function hdfys_options_display() {

	add_settings_section("content_settings_section", __('Just one thing','hello-dolly-for-your-song') , "hdfys_options_content_description", "hdfys-options");

	add_settings_field("hdfys_song", __('Text','hello-dolly-for-your-song') , "hdfys_options_display_songtext", "hdfys-options", "content_settings_section");

	register_setting("hdfys_settings", "hdfys_song", "hdfys_validate_songtext");
}
add_action("admin_init", "hdfys_options_display");

/* This is the validation of the user input */
function hdfys_validate_songtext ( $songtext ) {
	update_option('hdfys_text_updated',"1");
	$songtext = preg_replace("/[\r\n]+[\s\t]*[\r\n]+/","\n", $songtext);
    return $songtext;
}

/* This integrates the plugin options page into the wordpress options menu */
function hdfys_show_options() {
	add_options_page('Hello Dolly For Your Song', 'Hello Dolly Your Song', 10, basename(__FILE__), "hdfys_options");
}
add_action( 'admin_menu', 'hdfys_show_options');

/*
Customizing @ Plugin Page
*/

/* This adds the settings link on the plugin page */
function hdfys_add_plugin_page_links ( $links ) {
	$hdfys_links = array('<a href="' . admin_url( 'options-general.php?page=hellodollyforyoursong' ) . '">'. __('Options','hello-dolly-for-your-song').'</a>',);
	return array_merge( $links, $hdfys_links );
	}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'hdfys_add_plugin_page_links' );

/*
Widget
*/

/* The Unbelievable Widget ;-) */
class hdfys_widget extends WP_Widget {

	// Widget Definition
	public function __construct() {
		parent::__construct(
		'hdfys_widget',
		'Hello Dolly For Your Song',
		array( 'description' => __( 'Show a custom line of your text', 'hello-dolly-for-your-song'  ), )
		);
	}

	// Widget Output
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$widget_line=hdfys_get_anything();
		echo '<aside class="widget hdfys">';
		echo '<h3 class="widget-title hdfys">';
			if ( ! empty( $title ) )
				echo $title;
		echo '</h3>';
		echo '<p class="widget-hdfys">'.$widget_line.'</p>';
		echo '</aside>';
	}

	// Widget Form
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

	// Widget Update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}

/* This activates the widget in wordpress */
function register_hdfys_widget() {
    register_widget( 'hdfys_widget' );
}
add_action( 'widgets_init', 'register_hdfys_widget' );

/*
Shortcode
*/

/* The Unbelievable Shortcode ;-) */
function hdfys_shortcode() {
	$shortcode_line=hdfys_get_anything();
	$hdfys_shortcode_output= '<p class="hdfys shortcode">'. $shortcode_line .'</p>';
	$hdfys_shortcode_output=apply_filters( 'hdfys_output_filter', $hdfys_shortcode_output );
	return $hdfys_shortcode_output;
}
add_shortcode('hdfys','hdfys_shortcode');

/*
Template Tag
*/

/* The Unbelievable Template Tag ;-) */
function hello_dolly_for_your_song() {
	$hdfys_template_tag_line = hdfys_get_anything();
	$hdfys_template_tag_output='<div class="hdfys templatetag">'. $hdfys_template_tag_line .'</div>';
	$hdfys_template_tag_output=apply_filters( 'hdfys_output_filter', $hdfys_template_tag_output );
	echo $hdfys_template_tag_output;
}

/*
API ;-)
*/

/* This returns the random line and can be used in any Theme/Plugin code */
function get_hello_dolly_for_your_song() {
	$hdfys_string = hdfys_get_anything();
	return $hdfys_string;
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

/*
Gutenberg
*/

/* Run only if WordPress 5.0 or above */

global $wp_version;
if ( version_compare( $wp_version, '5', '>=' ) ) {

/* Prepare Block Content */
function hdfys_gutenberg_block() {
	$gutenberg_line = hdfys_get_anything();
	$gutenberg_output = '<p class="hdfys gutenberg-block">'. $gutenberg_line .'</p>';
	$gutenberg_output=apply_filters( 'hdfys_output_filter', $gutenberg_output );
	return $gutenberg_output;
}

/*
Following code is based on the Gutenberg Boilerplates from Ahmad Awais
https://ahmadawais.com/gutenberg-boilerplate/
*/

/* Gutenberg Block Assets */
function hdfys_block_editor_assets() {

	/* Get Hello Dolly for Your Song */
	$hdfys_params = array(
		'hdfys_random' => get_hello_dolly_for_your_song()
	);

	/* Block Java Script */
	wp_enqueue_script(
		'gb-block-hdfys',
		plugins_url( 'block.js', __FILE__ ), 
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'block.js' )
	);

	/* Bring the Random Line from here into the Block Java Script */
	wp_localize_script( 'gb-block-hdfys', 'hdfysParams', $hdfys_params );

} 
add_action( 'enqueue_block_editor_assets', 'hdfys_block_editor_assets' );

/* Fallback Rendering @ FrontEnd */
register_block_type( 'hdfys/hdfys', array(
	'render_callback' => 'hdfys_gutenberg_block'
) );

} // End WordPress 5 Check

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

/*
Actions & Filters
*/

// Code Example: How to use the action?
// function hdfys_do_anything() {

	// Add your code to execute here

// } 
// add_action( 'hdfys_new_song', 'hdfys_do_anything', 10, 3 );

// Code Example: How to use the filter?
// function hdfys_output_manipulate( $output ) {

	// Add your filter code here
	// Example: $output=strtolower( $output );

	// return $output;
// }
// add_filter( 'hdfys_output_filter', 'hdfys_output_manipulate', 10, 1 );

?>