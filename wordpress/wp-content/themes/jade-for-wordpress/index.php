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

   <div class="container-fluid">
       <div class="container-inside">
       <div>
            <?php if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="row">
                        <div>
                    <div <?php post_class(); ?>>
                        <h4 class="text-left-title modal-post"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a><p class="text-center postdate"> <p class="text-right postdate"><?php echo 'Written by '; the_author(); ?></p></h4>

                    </div><!--.post-header-->

                        <div class="entry clear">

                            <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                            <?php the_excerpt(); ?>

                        </div><!--. entry-->
                            <a href="<?php echo get_permalink(); ?>" class="readmore">Read More</a>

                    <!-- navigation?-->
                    <div class="navigation"><?php posts_nav_link(); ?></div>

                <footer class="postfooter">
                <?php edit_post_link(); ?>
                </footer>
                        <!--.post-footer-->
        <hr>
                    </div><!-- .post-->
                        </div>
                            <!-- column 1 end! -->


        	<?php endwhile; else: ?>
        		<p><?php _e('Sorry, this page does not exist.'); ?></p>
        	<?php endif; ?>

        </div>
</div>
    </div><!-- container fluid END! -->

<?php get_footer(); ?>
