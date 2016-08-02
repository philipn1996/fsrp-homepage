<?php
//Widget zur Anzeige sozialer Links in der Seitenleiste
class Widget1 extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'widget1', // ID
			__( 'Das soziale Widget', 'text_domain' ), // Name
			array( 'description' => __( 'Facebook-Bildchen anzeigen', 'text_domain' ), )
		);
		add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
	}
	function admin_setup(){ //Skripte nachladen

		wp_enqueue_media();
		wp_register_script('widget1-admin-js', get_template_directory_uri().'/widget1-admin.js', array( 'jquery', 'media-upload', 'media-views' ), 0 );
		wp_enqueue_script('widget1-admin-js');
		//wp_enqueue_style('widget1-admin', plugins_url('widget1-admin.css', __FILE__) );

	}
	
	//Frontend
	public function widget( $args, $instance ) { //Wofür genau dienen die before/after_title/widget sachen...? 
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		include("widget1-content.php");
		
		echo $args['after_widget'];
	}
	
	//Backend
	public function form( $instance ) {
		$title = $instance['title'];
		
		$img_1 = ( isset( $instance['img_1'] ) ) ? $instance['img_1'] : '';
		$caption_1 = ( isset( $instance['caption_1'] ) ) ? $instance['caption_1'] : '';
		$link_1 = ( isset( $instance['link_1'] ) ) ? $instance['link_1'] : '';
		
		$img_2 = ( isset( $instance['img_2'] ) ) ? $instance['img_2'] : '';
		$caption_2 = ( isset( $instance['caption_2'] ) ) ? $instance['caption_2'] : '';
		$link_2 = ( isset( $instance['link_2'] ) ) ? $instance['link_2'] : '';
		
		$img_3 = ( isset( $instance['img_3'] ) ) ? $instance['img_3'] : '';
		$caption_3 = ( isset( $instance['caption_3'] ) ) ? $instance['caption_3'] : '';
		$link_3 = ( isset( $instance['link_3'] ) ) ? $instance['link_3'] : '';
		$vars = array(0, $img_1, $img_2, $img_3); 
		$vars_l = array(0, $link_1, $link_2, $link_3); 
		$vars_c = array(0, $caption_1, $caption_2, $caption_3); 
		$names = array(0, "img_1", "img_2", "img_3");
		$names_l = array(0, "link_1", "link_2", "link_3");
		$names_c = array(0, "caption_1", "caption_2", "caption_3");
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Überschrift:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php for($i=1; $i<4; $i++) { ?>
		<div>
		<p class="widget_input">
			<label for="<?php echo $this->get_field_id( $names[$i] ); ?>"><?php _e( 'Bild '.$i.':' ); ?></label> 	
			<input class="" id="<?php echo $this->get_field_id( $names[$i] ); ?>" 
				name="<?php echo $this->get_field_name( $names[$i] ); ?>" value="<?php echo $vars[$i] ?>" type="text">
			<button id="title_image_button" class="button" 
				onclick="image_button_click('Bild auswählen','Select Image','image','title_image_preview','<?php echo $this->get_field_id( $names[$i] );  ?>');">Bild auswählen</button>			
		</p>
		<div id="title_image_preview" style="text-align:center" class="preview_placholder">
		<?php 
			if ($vars[$i]!='') echo '<img style="height:50px; width:50px;" src="' . $vars[$i] . '">';
		?>
		</div>
		<div style="position:relative; height:70px;">
			<div class="widget_input" style="position:absolute; left:0;">
				<label for="<?php echo $this->get_field_id( $names_c[$i] ); ?>"><?php _e( 'Unterschrift '.$i.':' ); ?></label> <br>
				<input class="" id="<?php echo $this->get_field_id( $names_c[$i] ); ?>" 
					name="<?php echo $this->get_field_name( $names_c[$i] ); ?>" value="<?php echo $vars_c[$i] ?>" type="text">
			</div>
			<div class="widget_input" style="position:absolute; right:0;">
				<label for="<?php echo $this->get_field_id( $names_l[$i] ); ?>"><?php _e( 'Link '.$i.':' ); ?></label> 	<br>
				<input class="" id="<?php echo $this->get_field_id( $names_l[$i] ); ?>" 
					name="<?php echo $this->get_field_name( $names_l[$i] ); ?>" value="<?php echo $vars_l[$i] ?>" type="text">
			</div>
		</div>
		</div>
		<hr/>
		<?php 
		}
	}

	//Sanitize & update
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['caption_1'] = ( ! empty( $new_instance['caption_1'] ) ) ? strip_tags( $new_instance['caption_1'] ) : '';
		$instance['caption_2'] = ( ! empty( $new_instance['caption_2'] ) ) ? strip_tags( $new_instance['caption_2'] ) : '';
		$instance['caption_3'] = ( ! empty( $new_instance['caption_3'] ) ) ? strip_tags( $new_instance['caption_3'] ) : '';
		for($i=1; $i<4; $i++) {
			$instance['img_'.$i] = $new_instance['img_'.$i];
			$instance['link_'.$i] = $new_instance['link_'.$i];
		}
		return $instance;
	}

}
// register Social-Media widget
function register_widget1() {
    register_widget( 'Widget1' );
}
add_action( 'widgets_init', 'register_widget1' );
?>
