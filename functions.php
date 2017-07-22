<?php

/* should be set for a proper Wordpress theme*/

if ( ! isset( $content_width ) ) {
	
	$content_width = 777;
	
}


/**
 * Proper way to enqueue scripts and styles
 *  wp_enqueue_script( $handle, $source, $dependencies, $version,
 */


function canitia_theme_scripts() {
	wp_enqueue_script( 'tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', false );
	wp_enqueue_style( 'bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', false );
	wp_enqueue_script( 'bootstrapjs', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array('jquery'), false, true );
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', false );
	wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'), false, false );
	wp_enqueue_style( 'core',  get_stylesheet_directory_uri(). '/style.css', false );	
}

add_action( 'wp_enqueue_scripts', 'canitia_theme_scripts' );

$bgargs = array(
	'default-color' => 'ffffff',
);

add_theme_support( "title-tag" );
add_theme_support( 'custom-background', $bgargs );
add_theme_support( 'automatic-feed-links' );
add_theme_support( "post-thumbnails" );


/**
 * sidebar
 */

function canitia_sidebars() {
	
	/* Register the 'primary' sidebar. */
	
	register_sidebar(
		array(
		'id' => 'primary',
		'name' => __( 'Primary', 'canitia' ),
		'description' => __( 'Main sidebar.', 'canitia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="widget-title text-left-title-featured-sidebar" style="color:' . get_theme_mod( 'set_itemheader_color', '#979797' ) . '">',
		'after_title' => '</h1>'
		)
	);
	
	
	/* Repeat register_sidebar() code for additional sidebars. */
	
}

add_action( 'widgets_init', 'canitia_sidebars' );

/* register main navigation */

function register_mainmenu() {
	
	register_nav_menu('header-menu',__( 'Header Menu', 'canitia' ));
	
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
        printf( "<div><ul class=\"pings commentlist\">%s</ul></div>", $pings );

    return $theme_template;

}, 9 );

/* shoutout to WPBeginner -> http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/ */
function canitia_pagination_numeric_posts_nav() {

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

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( 1, true ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li class="pagination-dash">-</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( $link, 1, true ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li class="pagination-dash">-</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, get_pagenum_link( $max, 1, true ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right" aria-hidden="true"></i>') );

	echo '</ul></div>' . "\n";
}

/* sanitize checkbox as was asked by the theme checker */
function canitia_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function canitia_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'settings_section_canitia',
        array(
            'title' =>  __('Canitia Settings', 'canitia'),
            'description' => __('Tweak Canitia to your liking.', 'canitia'),
            'priority' => 35,
        )
    );

    $wp_customize->add_section(
        'settings_section_canitia_labs',
        array(
            'title' =>  __('Canitia Labs', 'canitia'),
            'description' => __('Experimental Canitia Labs features.', 'canitia'),
            'priority' => 35,
        )
    );

	$wp_customize->add_setting(
		'display_featured_content',
		array(
			'default' => 'show',
		)
	);

	$wp_customize->add_setting(
		'display_today',
		array(
			'default' => 'show',
		)
	);

	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default' => 'right',
		)
	);

	$wp_customize->add_setting(
		'set_itemheader_color',
		array(
			'default'     => '#979797',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_setting(
		'set_text_color',
		array(
			'default'     => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_setting(
		'set_link_color',
		array(
			'default'     => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_setting(
		'set_link_hover_color',
		array(
			'default'     => '#979797',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_setting(
		'show_tags',
		array(
			'default'     => true,
			'sanitize_callback'	=> 'canitia_sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_categories',
		array(
			'default'     => true,
			'sanitize_callback'	=> 'canitia_sanitize_checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_author_section',
		array(
			'default'     => true,
			'sanitize_callback'	=> 'canitia_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'display_featured_content', array(
		'label' => __('Show featured content', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'showslider' => __('Show Slider', 'canitia'),
			'showfeatured' => __('Show Featured Row', 'canitia'),
			'hide' => __('Hide all', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'display_today', array(
		'label' => __('Show Today section?', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'show' => __('Show Today section', 'canitia'),
			'hide' => __('Hide Today section', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'sidebar_position', array(
		'label' => __('Sidebar position', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'left' => __('Sidebar on the left', 'canitia'),
			'right' => __('Sidebar on the right', 'canitia'),
		),
	) );

	$wp_customize->add_control(	'show_tags', array(
			'label' =>  __('Show tags within a post?', 'canitia'),
			'section' => 'settings_section_canitia',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_control(	'show_categories',	array(
			'label' =>  __('Show categories within a post?', 'canitia'),
			'section' => 'settings_section_canitia',
			'type' => 'checkbox',
		)
	);

	$wp_customize->add_control(	'show_author_section', array(
			'label' =>  __('Show the full author section below a post/page?', 'canitia'),
			'section' => 'settings_section_canitia',
			'type' => 'checkbox',
		)
	);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'itemheader_color',
				array(
					'label'      => __( 'Header item Color', 'canitia' ),
					'section'    => 'colors',
					'settings'   => 'set_itemheader_color'
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'text_color',
				array(
					'label'      => __( 'Text color', 'canitia' ),
					'section'    => 'colors',
					'settings'   => 'set_text_color'
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'link_color',
				array(
					'label'      => __( 'Link color', 'canitia' ),
					'section'    => 'colors',
					'settings'   => 'set_link_color'
				)
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'link_hover_color',
				array(
					'label'      => __( 'Link hover color', 'canitia' ),
					'section'    => 'colors',
					'settings'   => 'set_link_hover_color'
				)
			)
		);

	$wp_customize->add_control( 'theme_preset', array(
		'label' => __('Theme preset', 'canitia'),
		'section' => 'settings_section_canitia_labs',
		'type' => 'radio',
		'choices' => array(
			'light' => __('Light', 'canitia'),
			'dark' => __('Dark', 'canitia'),
		),
	) );
	}
	
add_action( 'customize_register', 'canitia_customizer' );


/**
 * add custom site logo (to header)
 */

function canitia_setup() {
	
	
	add_theme_support( 'custom-logo', array(
	'height'      => 64,
	'width'       => 64,
	'flex-width' => true,
	'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	
}

add_action( 'after_setup_theme', 'canitia_setup' );

load_theme_textdomain( 'canitia', get_template_directory().'/languages' );

?>
