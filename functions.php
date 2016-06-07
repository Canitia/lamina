<?php
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Enqueue a script with jQuery as a dependency.
 */

 	// Add Material scripts and styles
 	if( !is_admin()){
 		wp_deregister_script('jquery');
 		wp_enqueue_script( 'jquery', 'http://code.jquery.com/jquery-2.2.4.min.js', array(), '1.0', false );

 	}
 	wp_enqueue_style( 'material-style', get_template_directory_uri() . '/css/materialize.min.css' );
 	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css' );
 	wp_enqueue_script( 'material-script', get_template_directory_uri() . '/js/materialize.min.js', array(), '1.0', false );




add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "post-thumbnails" );
add_action( 'widgets_init', 'my_register_sidebars' );

$args = array(
	'width'         => 960,
	'height'        => 360,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'Main sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<li class="collection-header center"><h1 class="widget-title text-left-title-featured-sidebar accentcolor2 center-align">',
			'after_title' => '</h1></li>'
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}

function add_excerpt_class( $excerpt )
{
    $excerpt = str_replace( "<p", "<p class=\"text-justify\"", $excerpt );
    return $excerpt;
}

add_filter( "the_excerpt", "add_excerpt_class" );

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

function theme_prefix_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 58,
		'width'       => 58,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

function theme_prefix_the_custom_logo() {

	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}

?>
