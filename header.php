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

    <!-- close with wp_head -->
    <?php wp_head();?>
</head>

<body <?php body_class();?>>

<!-- start of the actual header -->
<header>
<nav class="navbar fixed-top navbar-light navbar-toggleable-sm justify-content-center" style="<?php if ( is_admin_bar_showing() ) { echo 'margin-top: 32px'; }?>">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <?php if ( function_exists( 'the_custom_logo' ) ) {  the_custom_logo(); }  ?>
    <a class="navbar-brand d-flex mr-auto site-title hidden-sm-down" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #<?php echo get_header_textcolor();?> !important;">
    <?php    
        bloginfo('name');
     ?>
    </a>
    <div class="navbar-collapse collapse" id="collapsingNavbar3">
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
            <?php bootstrap_nav(); ?>
        </ul>
    </div>
</nav>

</header>
<?php
    if ( is_home() ) {

        if ( get_theme_mod( 'display_slider' ) == 1 ) :
            get_template_part( 'partials/slider' );
        endif;
    }
        
    if ( is_single() ) {
        the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']);
    }

        if ( is_page() ) {
        the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']);
    }
?>
