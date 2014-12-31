<?php
/*
Theme Name: Jade for Wordpress
Theme URI: http://teamtreehouse.com/wordpress-bootstrap-theme-tutorial
Description: A theme based on material-design elements. This is the wordpress version of the Ghost original theme.
Author: Michael Boumann
Author URI: https://github.com/hxkclan/jade-for-wordpress
Version: 1.0
Tags: responsive, white, bootstrap, material design

License: Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)
License URI: http://creativecommons.org/licenses/by-sa/3.0/
*/
?>
<?php get_header(); ?>
<body>

  <div id="header">
        <p class="blogtitle"><a href="<?php bloginfo('wpurl'); ?>" id="headerurl"><?php bloginfo('name'); ?></a></p>
         <div id="about"><a href="#aboutModal2" data-toggle="modal" data-target="#myModal2"><i class="fa fa-question fa-4x"></i></a></div>
    </div>


   <div class="container-fluid">


    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div>
            <div <?php post_class(); ?>>
                <h4 class="text-left-title modal-post"><?php the_title(); ?> <p class="text-right postdate"><?php the_time( 'M j y' ); ?></p></h4>

            </div><!--.post-header-->

                <div class="entry clear">

                    <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                    <?php the_content(); ?>


                    <?php wp_link_pages(); ?>

                </div><!--. entry-->

                <footer class="postfooter">
                <?php edit_post_link(); ?>
                <address itemscope itemtype="http://schema.org/Person">
                    <?php the_author(); ?>

                </footer>
                <!--.post-footer-->

            </div><!-- .post-->
                </div>
                    <!-- column 1 end! -->


        <?php endwhile; /* rewind or continue if all posts have been fetched */ ?>


    <?php endif; ?>

                        <?php posts_nav_link( $sep, 'Previous', 'Next' ); ?><!--.navigation-->

    
    </div>


<div class="scroll-top">
	<span class="scroll-top-inner">
		<a href="#top"><i class="fa fa-2x fa-arrow-circle-up"></i>Back to top</a>
	</span>
</div>
</div><!-- container fluid END! -->

<?php get_footer(); ?>
