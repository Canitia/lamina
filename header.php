<!DOCTYPE html>
<html <?php language_attributes();?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- some meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version');?>" />
    <meta name="description" content="<?php bloginfo( 'description' );?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- rss, pingback -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo( 'rss2_url' )?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
    <!-- close with wp_head -->
    <?php wp_head();?>
</head>

<body <?php body_class();?> >
<?php wp_body_open(); ?>
<!-- start of the actual header -->
<header>
<nav class="container-fluid navbar navbar-expand-lg navbar-light">
        <?php if ( function_exists( 'the_custom_logo' ) ) {  the_custom_logo(); }  ?>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>">
    <?php    
        bloginfo('name');
     ?>
  </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php bootstrap_nav(); ?>
  </div>
</nav>
<?php if ( get_theme_mod( 'show_header_image', 'hideheader' ) == 'showheader' ) :
            get_template_part( 'partials/header-image' ); 
      endif; ?>

</header>
<main>
<div class="container-fluid flex-grow">