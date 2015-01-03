<?php get_header(); ?>

   <div class="container-fluid">
       <div class="container-inside">
                    <?php if ( have_posts() ) : ?>
                            <div class="col-xs-12 col-md-8 visible-xs visible-sm visible-md visible-lg">
                        <?php while ( have_posts() ) : the_post(); ?>

                                    <div <?php post_class(); ?>>

                                    <article>
                                                <div class="modal-post"><!--.post-header-->
                                                    <h4 class="text-left-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <?php
                                                        if ( has_post_thumbnail() ) {
                                                        	the_post_thumbnail();
                                                        }?>

                                                    <p class="text-right postdate"><?php echo 'Written by '; the_author(); ?></p>
                                                    <p class="text-right postdate"><?php the_tags(); ?></p>
                                                </div><!--.post-header-->


                                                <div class="entry clear"><!--. entry-->

                                                    <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                                                    <?php the_excerpt(); ?>

                                                </div><!--. entry-->

                                            <!--.post-footer-->
                                            <footer>
                                                    <a href="<?php echo get_permalink(); ?>" class="readmore">Read More</a>

                                                    <?php edit_post_link(); ?>
                                            </footer>
                                                <!--.post-footer-->

                                    </article><!-- close article -->

                                    <hr>

                            </div><!-- close post class div -->

                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php _e('Sorry, this page does not exist.'); ?></p>
                            <?php endif; ?>

                            <!-- navigation?-->
                            <div class="pagination">
                                <?php posts_nav_link(); ?>
                            </div>
                            <!-- navigation?-->

                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                    <div class="col-md-4 visible-md visible-lg">
                        <?php get_sidebar( 'primary' ); ?>
                    </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
