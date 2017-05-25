<?php
/* should be set for a proper Wordpress theme*/

if ( ! isset( $content_width ) ) {
	
	$content_width = 777;
	
}



/**
 * Proper way to enqueue scripts and styles
 *  wp_enqueue_script( $handle, $source, $dependencies, $version,
 */


function cerulean_theme_scripts() {
	
	wp_enqueue_style( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css', false );
	
	wp_enqueue_style( 'core',  get_stylesheet_directory_uri(). '/style.css', false );
	
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false );
	
	wp_enqueue_script( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js', array('jquery'), false, true );
	
	wp_enqueue_script( 'sidenav', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery', 'materialize'), false, true );
	
}

add_action( 'wp_enqueue_scripts', 'cerulean_theme_scripts' );

add_theme_support( "title-tag" );

add_theme_support( 'automatic-feed-links' );

add_theme_support( "post-thumbnails" );

add_action( 'widgets_init', 'cerulean_sidebars' );



/**
 * custom background-color
 */



$args = array(
'default-color' => 'ffffff',
);

add_theme_support( 'custom-background', $args );



/**
 * sidebar
 */

function cerulean_sidebars() {
	
	/* Register the 'primary' sidebar. */
	
	register_sidebar(
		array(
		'id' => 'primary',
		'name' => __( 'Primary', 'cerulean-for-wordpress' ),
		'description' => __( 'Main sidebar.', 'cerulean-for-wordpress' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<li class="collection-header"><h1 class="widget-title text-left-title-featured-sidebar">',
		'after_title' => '</h1></li>'
		)
	);
	
	
	/* Repeat register_sidebar() code for additional sidebars. */
	
}

/* register main navigation */

function register_mainmenu() {
	
	register_nav_menu('header-menu',__( 'Header Menu', 'cerulean-for-wordpress' ));
	
}

add_action( 'init', 'register_mainmenu' );


/** Display a list of pingbacks and trackbacks with the Disqus plugin **/

add_filter( 'comments_template', function( $theme_template) {

    // Check if the Disqus plugin is installed:
    if( ! function_exists( 'dsq_is_installed' ) || ! dsq_is_installed() )
        return $theme_template;

    // List comments with filters:
    $pings = wp_list_comments( 
        array(  
            'type'     => 'pings', 
            'style'    => 'ul', 
            'echo'     => 0 
        ) 
    ); 

    // Display:
    if( $pings )
        printf( "<div><ul class=\"pings commentlist\">%s</ul></div>", $pings );

    return $theme_template;

}, 9 );

/**
 * add custom site logo (to header)
 */

function cerulean_setup() {
	
	
	add_theme_support( 'custom-logo', array(
	'height'      => 64,
	'width'       => 64,
	'flex-width' => true,
	'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	
}

add_action( 'after_setup_theme', 'cerulean_setup' );



function cerulean_the_custom_logo() {
	
	
	if ( function_exists( 'the_custom_logo' ) ) {
		
		the_custom_logo();
		
	}
	
	
}

load_theme_textdomain( 'cerulean-for-wordpress', get_template_directory().'/languages' );

?>
