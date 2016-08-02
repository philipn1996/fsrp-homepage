<?php
//Toller Bootstrap-Menü-Code

require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );

//Header-Image

$defaults = array(
	'default-image'          => '',
	'width'                  => 415,
	'height'                 => 150,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => ''	,
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

//Widgets
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 ">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Page left sidebar',
		'id'            => 'page_left_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 ">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Home left sidebar',
		'id'            => 'home_left_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 ">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

//Add Social-Media Widget
include_once("widget1.php");
//Add Meta-Widget
include_once("widget2.php");
//Add Upcoming-Widget
include_once("widget3.php");
//Customizer

function mytheme_customize_register( $wp_customize ) {

$wp_customize->add_setting( 'bgcolor' , array(
    'default'     => 'rgb(57, 64, 72)',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bgcolor_control', array(
  'label' => __( 'Hintergrundfarbe', 'bgcolor' ),
  'section' => 'colors',
  'settings' => 'bgcolor',
) ) );

$wp_customize->add_setting( 'sidebarrcolor' , array(
    'default'     => 'white',
    'transport'   => 'refresh',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebarrcolor_control', array(
  'label' => __( 'Hintergrundfarbe rechte Sidebar', 'sidebarrcolor' ),
  'section' => 'colors',
  'settings' => 'sidebarrcolor',
) ) );

$wp_customize->add_setting( 'sidebarropacity' , array(
    'default'     => '1',
    'transport'   => 'refresh',
) );
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'sidebarropacity_control',
        array(
			'label' => __( 'Transparenz rechte Sidebar', 'sidebarropacity' ),
			'section' => 'colors',
			'settings' => 'sidebarropacity',
            'type'           => 'text',
        )
    )
);

}
add_action( 'customize_register', 'mytheme_customize_register' );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
}
?>
