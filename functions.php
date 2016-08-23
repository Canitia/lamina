<?php

/* should be set for a proper Wordpress theme*/
if ( ! isset( $content_width ) ) {
	$content_width = 700;
}

/**
 * Proper way to enqueue scripts and styles
 *  wp_enqueue_script( $handle, $source, $dependencies, $version,
 */

function insideuwp_theme_name_scripts() {
	wp_enqueue_style( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css', false );
	wp_enqueue_style( 'core',  get_stylesheet_directory_uri(). '/style.css', false );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css', false );


	if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js'), false, '3.0.0', true);
	wp_enqueue_script('jquery');
} else {
		wp_enqueue_script('jquery');
}

	wp_enqueue_script( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'sidenav', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery', 'materialize'), false, true );
	wp_enqueue_script( 'livetile', get_stylesheet_directory_uri() . '/js/updatetile.js', false, false, true );
}
add_action( 'wp_enqueue_scripts', 'insideuwp_theme_name_scripts' );

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "post-thumbnails" );
add_action( 'widgets_init', 'my_register_sidebars' );

/**
 * site header
 */

$args = array(
	'width'         => 960,
	'height'        => 360,
	'default-text-color'     => '#ffffff',
  'header-text'            => true,
	'default-image' => get_template_directory_uri() . '/images/header.png',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'apps',
    array(
      'labels' => array(
        'name' => __( 'App Updates' ),
        'singular_name' => __( 'Updates' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}

/**
 * custom background-color
 */


$args = array(
	'default-color' => 'ebebeb',
);
add_theme_support( 'custom-background', $args );

/**
 * sidebar
 */
function my_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Primary' ),
			'description' => __( 'Main sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s card">',
			'after_widget' => '</div>',
			'before_title' => '<li class="collection-header center"><h1 class="widget-title text-left-title-featured-sidebar accentcolor2 center-align">',
			'after_title' => '</h1></li>'
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}

/* add text-justiry class to excerpt */
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


/**
 * add custom site logo (to header)
 */
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
