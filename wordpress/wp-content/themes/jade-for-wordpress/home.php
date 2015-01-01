<?php get_header(); ?>

   <div class="container-fluid">
       <div class="container-inside">
                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                                    <div class="row">
                                            <div><!-- .post-->
                                                        <div <?php post_class(); ?>><!--.post-header-->
                                                                <h4 class="text-left-title modal-post">
                                                                        <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                                                                        <p class="text-right postdate"><?php echo 'Written by '; the_author(); ?></p></h4>
                                                        </div><!--.post-header-->

                                                            <div class="entry clear"><!--. entry-->

                                                                <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                                                                <?php the_excerpt(); ?>

                                                            </div><!--. entry-->
                                                                <a href="<?php echo get_permalink(); ?>" class="readmore">Read More</a>

                                                        <!-- navigation?-->
                                                        <div class="navigation">
                                                            <?php posts_nav_link(); ?>
                                                        </div>
                                                        <!-- navigation?-->

                                                        <!--.post-footer-->
                                                        <footer class="postfooter">
                                                                <?php edit_post_link(); ?>
                                                        </footer>
                                                            <!--.post-footer-->

                                                        <hr>
                                            </div><!-- .post-->
                                    </div>
                                    <!-- column end! -->

                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php _e('Sorry, this page does not exist.'); ?></p>
                            <?php endif; ?>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
