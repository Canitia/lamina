<!DOCTYPE html>
<html <?php language_attributes();?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <!-- some meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type');?>; charset=<?php bloginfo('charset');?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version');?>" />
    <meta name="description" content="<?php bloginfo( 'description' );?>" />
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() );?>/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="navbar-fixed">
    <nav class="white">
      <div class="nav-wrapper">
        <a href="#" data-activates="slide-out" class="button-collapse left"><i class="fa fa-bars" aria-hidden="true"></i></a>
        <?php if ( function_exists( 'the_custom_logo' ) ) {
	
	        the_custom_logo();
            
        }
        ?>
        <p class="brand-logo site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="headerurl" style="color: #<?php echo get_header_textcolor();?> !important;"><?php bloginfo('name');?></a>
        </p>

         <div id="nav-mobile" class="right hide-on-med-and-down">
           <?php
            wp_nav_menu(
                array(
                 'theme_location' => 'header-menu',
                  'container' => '',
                  'fallback_cb' => false
                )
            );

            ?>
         </div>

        <div id="slide-out" class="side-nav">
            <p class="text-left-title-featured-sidebar sidenav-menu-header"><?php _e('Menu', 'cerulean-for-wordpress');?></p>
          <?php
            wp_nav_menu(
                array(
                 'theme_location' => 'header-menu',
                 'container' => '',
                 'fallback_cb' => false,
                 'depth' => 0
                )
            );

            ?>
        </div>

</div>
</nav>

</div>
</header>
<?php
    if ( is_home() ) {
        get_template_part( 'partials/slider' );
        }
        
    if ( is_single() ) {
        the_post_thumbnail('full', ['class' => 'responsive-img', 'title' => 'Feature image']);
    }

        if ( is_page() ) {
        the_post_thumbnail('full', ['class' => 'responsive-img', 'title' => 'Feature image']);
    }
?>
