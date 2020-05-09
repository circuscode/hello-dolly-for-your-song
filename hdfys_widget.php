<?php

/*
All things related to the widget
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
Widget
*/

/* The Unbelievable Widget ;-) */
class hdfys_widget extends WP_Widget {

	// Widget Definition
	public function __construct() {
		parent::__construct(
		'hdfys_widget',
		'Hello Dolly For Your Song',
		array( 'description' => __( 'Displays a random line of your text', 'hello-dolly-for-your-song'  ), )
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

?>