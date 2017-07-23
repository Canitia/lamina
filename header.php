<!DOCTYPE html>
<html <?php language_attributes();?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- some meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version');?>" />
    <meta name="description" content="<?php bloginfo( 'description' );?>" />
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() );?>/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- rss, pingback -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo( 'rss2_url' )?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
    <style type="text/css">
        #wp-calendar caption { color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?> !important; }
        .post-errortext, .post-content p, th, tr, td, dl, dt, ul > li, li, address, pre, author-bio { color: <?php echo get_theme_mod( 'set_text_color', '#000000' ); ?> !important; }
        .container-fluid a, .container-fluid a p, .comment-meta > a { color: <?php echo get_theme_mod( 'set_link_color', '#000000' ); ?> !important; }
        .container-fluid a:hover, .container-fluid a > p:hover, .container-fluid > p a:focus, .container-fluid > p a:hover { color: <?php echo get_theme_mod( 'set_link_hover_color', '#979797' ); ?> !important; }
    </style>
    <!-- close with wp_head -->
    <?php wp_head();?>
</head>

<body <?php body_class();?>>

<!-- start of the actual header -->
<header>
<nav class="navbar navbar-light navbar-toggleable-sm justify-content-center">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <?php if ( function_exists( 'the_custom_logo' ) ) {  the_custom_logo(); }  ?>
    <a class="navbar-brand d-flex mr-auto site-title hidden-sm-down" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <?php    
        bloginfo('name');
     ?>
    </a>
    <div class="navbar-collapse collapse" id="collapsingNavbar">
            <?php bootstrap_nav(); ?>
    </div>
</nav>

</header>
<?php
    if ( is_home() || is_category() || is_author() ) {

        if ( get_theme_mod( 'display_featured_content', 'showslider' ) == 'showslider') :
            get_template_part( 'partials/slider' );
        endif;

        if ( get_theme_mod( 'display_featured_content', 'showfeatured' )  == 'showfeatured' ) :
            get_template_part( 'partials/featured-post' );
        endif;

        if ( get_theme_mod( 'display_featured_content', 'hide' ) == 'hide' ) :
            set_theme_mod ('display_featured_content', 'hide' ); // disable featured section as the slider replaces it
        endif;
    }

    if ( is_single() || is_page() ) {

        if ( has_post_thumbnail() ) {
            the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']);
        }
    }
?>
