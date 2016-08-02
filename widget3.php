<?php
//Widget zur Anzeige von aktuellen Events
class Widget3 extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget3', // ID
			__( 'Upcoming-Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Termine aus Seite auslesen und anzeigen', 'text_domain' ), )
		);
		add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
	}

	function admin_setup(){ //Skripte nachladen

		//nothin to do

	}
	
	//Frontend
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		include("widget3-content.php");
		
		echo $args['after_widget'];
	}
	
	//Backend
	public function form( $instance ) {
		$title = $instance['title'];
		$theID = $instance['theID'];
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Überschrift:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'theID' ) ); ?>"><?php _e( esc_attr( 'Aktuelles-ID | NICHT ÄNDERN:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'theID' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'theID' ) ); ?>" type="text" value="<?php echo esc_attr( $theID ); ?>">
		</p>
		<?php
	}

	//Sanitize & update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['theID'] = ( ! empty( $new_instance['theID'] ) ) ? strip_tags( $new_instance['theID'] ) : '';
		return $instance;
	}

}
// register
function register_widget3() {
    register_widget( 'Widget3' );
}
add_action( 'widgets_init', 'register_widget3' );
?>
