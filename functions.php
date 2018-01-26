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
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'tether', '//cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js' );
	wp_enqueue_style( 'bootstrap', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'slabo-27px', '//fonts.googleapis.com/css?family=Slabo+27px:400,700' );
	wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:300,400,700' );
	wp_enqueue_script( 'bootstrapjs', '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js', array('jquery') );
	wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'));
	wp_enqueue_style( 'orange-sphalerite',  get_stylesheet_directory_uri(). '/style.css' );	

	if ( get_theme_mod( 'theme_preset', 'orange-sphalerite' ) == 'pinkruby') :
		wp_enqueue_style( 'pinkruby',  get_stylesheet_directory_uri(). '/css/style.pinkruby.css' );
	endif;

	if ( get_theme_mod( 'theme_preset', 'orange-sphalerite' ) == 'blackopal') :
		wp_enqueue_style( 'blackopal',  get_stylesheet_directory_uri(). '/css/style.blackopal.css' );	
	endif;

	if ( get_theme_mod( 'theme_preset', 'orange-sphalerite' ) == 'pinkmelanite') :
		wp_enqueue_style( 'pinkmelanite',  get_stylesheet_directory_uri(). '/css/style.pinkmelanite.css' );	
	endif;

	if ( get_theme_mod( 'theme_preset' , 'orange-sphalerite' ) == 'brownsinhalite') :
		wp_enqueue_style( 'brownsinhalite',  get_stylesheet_directory_uri(). '/css/style.brownsinhalite.css' );	
	endif;

	if ( get_theme_mod( 'theme_preset' , 'orange-sphalerite' ) == 'bluesapphire') :
		wp_enqueue_style( 'bluesapphire',  get_stylesheet_directory_uri(). '/css/style.bluesapphire.css' );	
	endif;
}

add_action( 'wp_enqueue_scripts', 'canitia_theme_scripts' );

$bgargs = array(
	'default-color' => 'ffffff',
);

add_theme_support( "title-tag" );
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
		'before_title' => '<h1 class="widget-title text-left-title-featured-sidebar">',
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

/* sanitize select/inputs/radios as was asked by the theme checker */
function canitia_sanitize_select( $input, $setting ) {
	
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
function canitia_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'settings_section_canitia',
        array(
            'title' =>  __('Canitia Settings', 'canitia'),
            'description' => __('Tweak Canitia to your liking.', 'canitia'),
            'priority' => 55,
        )
    );

	$wp_customize->add_setting(
		'display_featured_content',
		array(
			'default' => 'hidefeatured',
			'sanitize_callback' => 'canitia_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default' => 'right',
			'sanitize_callback' => 'canitia_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'show_tags',
		array(
			'default' => 'showtags',
			'sanitize_callback' => 'canitia_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'show_categories',
		array(
			'default' => 'showcategories',
			'sanitize_callback' => 'canitia_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'show_author_section',
		array(
			'default' => 'hideauthor',
			'sanitize_callback' => 'canitia_sanitize_select',
		)
	);

	$wp_customize->add_setting(
		'theme_preset',
		array(
			'default' => 'orange-sphalerite',
			'sanitize_callback' => 'canitia_sanitize_select',
			'settings' => 'theme_preset',
		)
	);

	$wp_customize->add_control( 'display_featured_content', array(
		'label' => __('Featured content', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'showslider' => __('Show Slider', 'canitia'),
			'showfeatured' => __('Show Featured Row', 'canitia'),
			'hidefeatured' => __('Hide all', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'sidebar_position', array(
		'label' => __('Sidebar position', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'left' => __('Left', 'canitia'),
			'right' => __('Right', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'show_tags', array(
		'label' => __('Show Tags', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'showtags' => __('Show Tags', 'canitia'),
			'hidetags' => __('Hide Tags', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'show_categories', array(
		'label' => __('Show Categories', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'showcategories' => __('Show Categories', 'canitia'),
			'hidecategories' => __('Hide Categories', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'show_author_section', array(
		'label' => __('Show Author section', 'canitia'),
		'section' => 'settings_section_canitia',
		'type' => 'radio',
		'choices' => array(
			'showauthor' => __('Show Author section', 'canitia'),
			'hideauthor' => __('Hide Author section', 'canitia'),
		),
	) );

	$wp_customize->add_control( 'theme_preset', array(
		'label' => __('Theme preset', 'canitia'),
		'section' => 'colors',
		'type' => 'radio',
		'choices' => array(
			'default' => __('Orange Sphalerite (default)', 'canitia'),
			'pinkruby' => __('Pink Ruby', 'canitia'),
			'pinkmelanite' => __('Pink Melanite', 'canitia'),
			'blackopal' => __('Black Opal', 'canitia'),
			'brownsinhalite' => __('Brown Sinhalite', 'canitia'),
			'bluesapphire' => __('Blue Sapphire', 'canitia'),
		),
	) );

	}

add_action( 'customize_register', 'canitia_customizer' );


function canitia_change_logo_class( $html ) {
	
		$html = str_replace( 'custom-logo', 'brand-logo', $html );
	
		return $html;
	}

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
add_filter( 'get_custom_logo', 'canitia_change_logo_class' );

load_theme_textdomain( 'canitia', get_template_directory().'/languages' );


/**
 * This function filters the post content when viewing a post with the "chat" post format.  It formats the 
 * content with structured HTML markup to make it easy for theme developers to style chat posts.  The 
 * advantage of this solution is that it allows for more than two speakers (like most solutions).  You can 
 * have 100s of speakers in your chat post, each with their own, unique classes for styling.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $content The content of the post.
 * @return string $chat_output The formatted content of the post.
 */
function my_format_chat_content( $content ) {
	global $_post_format_chat_ids;

	/* If this is not a 'chat' post, return the content. */
	if ( !has_post_format( 'chat' ) )
		return $content;

	/* Set the global variable of speaker IDs to a new, empty array for this chat. */
	$_post_format_chat_ids = array();

	/* Allow the separator (separator for speaker/text) to be filtered. */
	$separator = apply_filters( 'my_post_format_chat_separator', ' ' );

	/* Open the chat transcript div and give it a unique ID based on the post ID. */
	$chat_output = "\n\t\t\t" . '<div id="chat-transcript-' . esc_attr( get_the_ID() ) . '" class="chat-transcript">';

	/* Split the content to get individual chat rows. */
	$chat_rows = preg_split( "/(\r?\n)+|(<br\s*\/?>\s*)+/", $content );

	/* Loop through each row and format the output. */
	foreach ( $chat_rows as $chat_row ) {

		/* If a speaker is found, create a new chat row with speaker and text. */
		if ( strpos( $chat_row, $separator ) ) {

			/* Split the chat row into author/text. */
			$chat_row_split = explode( $separator, trim( $chat_row ), 2 );

			/* Get the chat author and strip tags. */
			$chat_author = strip_tags( trim( $chat_row_split[0] ) );

			/* Get the chat text. */
			$chat_text = trim( $chat_row_split[1] );

			/* Get the chat row ID (based on chat author) to give a specific class to each row for styling. */
			$speaker_id = my_format_chat_row_id( $chat_author );

			/* Open the chat row. */
			$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

			/* Add the chat row author. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-author ' . sanitize_html_class( strtolower( "chat-author-{$chat_author}" ) ) . ' vcard"><cite class="fn">' . apply_filters( 'my_post_format_chat_author', $chat_author, $speaker_id ) . '</cite>' . $separator . '</div>';

			/* Add the chat row text. */
			$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_text, $chat_author, $speaker_id ) ) . '</div>';

			/* Close the chat row. */
			$chat_output .= "\n\t\t\t\t" . '</div><!-- .chat-row -->';
		}

		/**
		 * If no author is found, assume this is a separate paragraph of text that belongs to the
		 * previous speaker and label it as such, but let's still create a new row.
		 */
		else {

			/* Make sure we have text. */
			if ( !empty( $chat_row ) ) {

				/* Open the chat row. */
				$chat_output .= "\n\t\t\t\t" . '<div class="chat-row ' . sanitize_html_class( "chat-speaker-{$speaker_id}" ) . '">';

				/* Don't add a chat row author.  The label for the previous row should suffice. */

				/* Add the chat row text. */
				$chat_output .= "\n\t\t\t\t\t" . '<div class="chat-text">' . str_replace( array( "\r", "\n", "\t" ), '', apply_filters( 'my_post_format_chat_text', $chat_row, $chat_author, $speaker_id ) ) . '</div>';

				/* Close the chat row. */
				$chat_output .= "\n\t\t\t</div><!-- .chat-row -->";
			}
		}
	}

	/* Close the chat transcript div. */
	$chat_output .= "\n\t\t\t</div><!-- .chat-transcript -->\n";

	/* Return the chat content and apply filters for developers. */
	return apply_filters( 'my_post_format_chat_content', $chat_output );
}

/**
 * This function returns an ID based on the provided chat author name.  It keeps these IDs in a global 
 * array and makes sure we have a unique set of IDs.  The purpose of this function is to provide an "ID"
 * that will be used in an HTML class for individual chat rows so they can be styled.  So, speaker "John" 
 * will always have the same class each time he speaks.  And, speaker "Mary" will have a different class 
 * from "John" but will have the same class each time she speaks.
 *
 * @author David Chandra
 * @link http://www.turtlepod.org
 * @author Justin Tadlock
 * @link http://justintadlock.com
 * @copyright Copyright (c) 2012
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @link http://justintadlock.com/archives/2012/08/21/post-formats-chat
 *
 * @global array $_post_format_chat_ids An array of IDs for the chat rows based on the author.
 * @param string $chat_author Author of the current chat row.
 * @return int The ID for the chat row based on the author.
 */
function my_format_chat_row_id( $chat_author ) {
	global $_post_format_chat_ids;

	/* Let's sanitize the chat author to avoid craziness and differences like "John" and "john". */
	$chat_author = strtolower( strip_tags( $chat_author ) );

	/* Add the chat author to the array. */
	$_post_format_chat_ids[] = $chat_author;

	/* Make sure the array only holds unique values. */
	$_post_format_chat_ids = array_unique( $_post_format_chat_ids );

	/* Return the array key for the chat author and add "1" to avoid an ID of "0". */
	return absint( array_search( $chat_author, $_post_format_chat_ids ) ) + 1;
}

/* Filter the content of chat posts. */
add_filter( 'the_content', 'my_format_chat_content' );

/* Auto-add paragraphs to the chat text. */
add_filter( 'my_post_format_chat_text', 'wpautop' );

?>
