<?php
if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

/**
 * Proper way to enqueue scripts and styles
 *  wp_enqueue_script( $handle, $source, $dependencies, $version,
 */

function insideuwp_theme_name_scripts() {
	wp_enqueue_style( 'core',  get_stylesheet_directory_uri(). '/style.css', false );
	wp_enqueue_style( 'screen', get_stylesheet_directory_uri() . '/css/style.screen.css', false );
	wp_enqueue_style( 'materialize', get_stylesheet_directory_uri() . '/css/materialize.min.css', false );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', false );
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-2.2.4.min.js', false );
	wp_enqueue_script( 'materialize', get_stylesheet_directory_uri() . '/js/materialize.min.js', false );
	wp_enqueue_script( 'sidenav', get_stylesheet_directory_uri() . '/js/sidenav.js', false );
}
add_action( 'wp_enqueue_scripts', 'insideuwp_theme_name_scripts' );

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "post-thumbnails" );
add_action( 'widgets_init', 'my_register_sidebars' );

$args = array(
	'width'         => 960,
	'height'        => 360,
	'default-text-color'     => '#ffffff',
  'header-text'            => true,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

$args = array(
	'default-color' => '696969',
);
add_theme_support( 'custom-background', $args );


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

add_theme_support( 'infinite-scroll', array(
'container' => 'main-content',
'footer' => 'pagination',
) );

?>
