<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <!-- some meta -->
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory(); ?>/favicon.ico" />

    <!-- Font awesome (icons) and Raleway font as is used in the whole site -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css' />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css"/>

    <!-- my own css file (style.css) -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />

    <!-- rss, pingback -->
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo get_feed_link( 'rss2_url' )?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <!-- close with wp_head -->
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>

<!-- start of the actual header -->
<header>
<div id="header">
    <p class="blogtitle"><a href="<?php echo home_url();  ?>" id="headerurl"><?php bloginfo('name'); ?></a></p>
    <p class="text-right"><?php bloginfo('description'); ?></p>
     <div id="about"><a href="#aboutModal2" data-toggle="modal" data-target="#myModal2"><i class="fa fa-question fa-3x"></i></a></div>
</div>
</header>
