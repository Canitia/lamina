<?php

/* should be set for a proper WordPress theme*/

if ( ! isset( $content_width ) ) {
	
	$content_width = 1200;
	
}


/**
 * Proper way to enqueue scripts and styles
 *  wp_enqueue_script( $handle, $source, $dependencies, $version,
 */

function lamina_theme_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'tether', '//cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js' );
	wp_enqueue_style( 'bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' );
	wp_enqueue_script( 'font-awesome', '//use.fontawesome.com/releases/v5.8.1/js/all.js' );
	wp_enqueue_script( 'webfontloader', '//cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js' );
	wp_enqueue_script( 'bootstrapjs', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_style( 'sodalite',  get_stylesheet_directory_uri(). '/style.css' );	
}

add_action( 'wp_enqueue_scripts', 'lamina_theme_scripts' );

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "post-thumbnails" );

$lamina_headerargs = array(
	'height'        => 325,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $lamina_headerargs );


function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/**
 * sidebar
 */

function lamina_sidebars() {
	
	/* Register the 'primary' sidebar. */
	
	register_sidebar(
		array(
		'id' => 'primary',
		'name' => __( 'Primary', 'lamina' ),
		'description' => __( 'Bottom bar.', 'lamina' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title text-left-title-featured-sidebar">',
		'after_title' => '</h1>'
		)
	);
	
	
	/* Repeat register_sidebar() code for additional sidebars. */
	
}

add_action( 'widgets_init', 'lamina_sidebars' );

/* register main navigation */

function register_mainmenu() {
	
	register_nav_menu('header-menu',__( 'Header Menu', 'lamina' ));
	
}

add_action( 'init', 'register_mainmenu' );

// Register Custom Navigation Walker
require_once('libs/wp-bootstrap-navwalker.php');


// Bootstrap navigation
function bootstrap_nav()
{
	wp_nav_menu( array(
            'theme_location'    => 'header-menu',
            'depth'             => 2,
            'container'         => 'false',
            'menu_class'        => 'nav navbar-nav ml-auto w-100 justify-content-end',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
    );
}


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
        printf( "<div><ul class=\"pings commentlist\">%s</ul></div>", esc_html($pings) );

    return $theme_template;

}, 9 );

/* shoutout to WPBeginner -> http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/ */
function lamina_pagination_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="pagination"><ul class="mx-auto">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left" aria-hidden="true"></i>') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", esc_html($class), get_pagenum_link( 1, true ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="pagination-dash">-</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", esc_html($class), get_pagenum_link( $link, 1, true ), esc_html($link) );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="pagination-dash">-</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", esc_html($class), get_pagenum_link( $max, 1, true ), esc_html($max) );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right" aria-hidden="true"></i>') );

	echo '</ul></div>' . "\n";
}

/* sanitize checkbox as was asked by the theme checker */
function lamina_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/* sanitize select/inputs/radios as was asked by the theme checker */
function lamina_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function lamina_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'settings_section_lamina',
        array(
            'title' =>  __('Lamina Settings', 'lamina'),
            'description' => __('Tweak Lamina to your liking.', 'lamina'),
            'priority' => 55,
        )
    );

	$wp_customize->add_setting(
		'show_tags',
		array(
			'default' => 'showtags',
			'sanitize_callback' => 'lamina_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'show_author_section',
		array(
			'default' => 'hideauthor',
			'sanitize_callback' => 'lamina_sanitize_select',
		)
	);

	$wp_customize->add_control( 'show_tags', array(
		'label' => __('Show Tags', 'lamina'),
		'section' => 'settings_section_lamina',
		'type' => 'radio',
		'choices' => array(
			'showtags' => __('Show Tags', 'lamina'),
			'hidetags' => __('Hide Tags', 'lamina'),
		),
	) );

	$wp_customize->add_control( 'show_author_section', array(
		'label' => __('Show Author section', 'lamina'),
		'section' => 'settings_section_lamina',
		'type' => 'radio',
		'choices' => array(
			'showauthor' => __('Show Author section', 'lamina'),
			'hideauthor' => __('Hide Author section', 'lamina'),
		),
	) );
	}

add_action( 'customize_register', 'lamina_customizer' );


/**
 * add custom site logo (to header)
 */
function lamina_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 48,
		'width'       => 48,
		'flex-width' => false,
	) );
}
add_action( 'after_setup_theme', 'lamina_setup' );

load_theme_textdomain( 'lamina', get_template_directory().'/languages' );
