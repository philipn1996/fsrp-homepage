<?php
//Widget zur Anzeige von "Meta"infos
class Widget2 extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget2', // ID
			__( 'Das Zeitspar-Widget', 'text_domain' ), // Name
			array( 'description' => __( 'TL;DR , weiterführende Links, dringende Termine, Kontakte: Als Custom Field an den Post hängen und es wird daneben angezeigt.', 'text_domain' ), )
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
		
		include("widget2-content.php");
		
		echo $args['after_widget'];
	}
	
	//Backend
	public function form( $instance ) {
		$title = $instance['title'];
		$key1 = $instance['key1'];
		$key2 = $instance['key2'];
		$key3 = $instance['key3'];
		
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Überschrift:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'key1' ) ); ?>"><?php _e( esc_attr( 'Zusammenfassungsbereich' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'key1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'key1' ) ); ?>" type="text" value="<?php echo esc_attr( $key1 ); ?>">
		</p>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'key2' ) ); ?>"><?php _e( esc_attr( 'Terminbereich:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'key2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'key2' ) ); ?>" type="text" value="<?php echo esc_attr( $key2 ); ?>">
		</p>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'key3' ) ); ?>"><?php _e( esc_attr( 'Ressourcenbereich:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'key3' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'key3' ) ); ?>" type="text" value="<?php echo esc_attr( $key3 ); ?>">
		</p>
		<?php
	}

	//Sanitize & update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['key1'] = ( ! empty( $new_instance['key1'] ) ) ? strip_tags( $new_instance['key1'] ) : '';
		$instance['key2'] = ( ! empty( $new_instance['key2'] ) ) ? strip_tags( $new_instance['key2'] ) : '';
		$instance['key3'] = ( ! empty( $new_instance['key3'] ) ) ? strip_tags( $new_instance['key3'] ) : '';
		return $instance;
	}

}
// register
function register_widget2() {
    register_widget( 'Widget2' );
}
add_action( 'widgets_init', 'register_widget2' );
?>
