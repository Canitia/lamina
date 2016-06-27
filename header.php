<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- some meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico" />
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="application-name" content="InsideUWP"/>
    <meta name="msapplication-square70x70logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/win-tiles/small.jpg"/>
    <meta name="msapplication-square150x150logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/win-tiles/medium.jpg"/>
    <meta name="msapplication-wide310x150logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/win-tiles/wide.jpg"/>
    <meta name="msapplication-square310x310logo" content="<?php echo esc_url( get_template_directory_uri() ); ?>/win-tiles/large.jpg"/>
    <meta name="msapplication-TileColor" content="#0d47a1"/>
    <meta name="msapplication-notification" content="frequency=30;polling-uri=http://notifications.buildmypinnedsite.com/?feed=https://insideuwp.xyz/feed&amp;id=1;polling-uri2=http://notifications.buildmypinnedsite.com/?feed=https://insideuwp.xyz/feed&amp;id=2;polling-uri3=http://notifications.buildmypinnedsite.com/?feed=https://insideuwp.xyz/feed&amp;id=3;polling-uri4=http://notifications.buildmypinnedsite.com/?feed=https://insideuwp.xyz/feed&amp;id=4;polling-uri5=http://notifications.buildmypinnedsite.com/?feed=https://insideuwp.xyz/feed&amp;id=5; cycle=1"/>
    <!-- rss, pingback -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo( 'rss2_url' )?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <title><?php wp_title(); ?></title>
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <!-- close with wp_head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<!-- start of the actual header -->
<header>
    <div class="navbar-fixed">
    <nav class="accentcolor">
      <div class="nav-wrapper">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        }?>
        <p class="brand-logo center">
            <a href="<?php echo home_url();  ?>" class="headerurl" style="color: #<?php echo get_header_textcolor(); ?> !important;"><?php bloginfo('name'); ?></a>
        </p>

         <ul id="nav-mobile" class="right hide-on-med-and-down">
           <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
         </ul>
         <a href="#" data-activates="slide-out" class="button-collapse right"><i class="fa fa-bars" aria-hidden="true"></i></a>

<ul id="slide-out" class="side-nav">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
</ul>

</div>
</nav>

</div>
</header>
<div class="container-fluid">
<?php>
    $description = get_bloginfo('description');

    if ( $description ) {
        //echo '<p class="tagline text-left-title-featured-sidebar accentcolor2">' . //$description . '</p>';
    }?>
<!-- <img src="<?php header_image(); ?>" height="<?php // echo get_custom_header()->height; ?>" width="<?php //echo get_custom_header()->width;?>" class="center-align"  alt="header image" /> -->
