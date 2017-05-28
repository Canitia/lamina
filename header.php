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

<nav class="navbar navbar-toggleable-md navbar-light">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #<?php echo get_header_textcolor();?> !important;"><?php bloginfo('name');?></a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <?php bootstrap_nav(); ?>
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
        the_post_thumbnail('full', ['class' => 'responsive-img', 'title' => 'Feature image']);
    }

        if ( is_page() ) {
        the_post_thumbnail('full', ['class' => 'responsive-img', 'title' => 'Feature image']);
    }
?>
