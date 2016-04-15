<?php get_header(); ?>

   <div class="container-fluid">
     <div class="row">
                    <?php if ( have_posts() ) : ?>
                          <div class="main-content col s12 m12 l8">
                        <?php while ( have_posts() ) : the_post(); ?>

                                    <div <?php post_class(); ?>>

                                    <article>
                                                    <h4 class="text-left-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <?php
                                                        if ( has_post_thumbnail() ) {
                                                        	the_post_thumbnail('large');
                                                        }?>

                                                    <p class="text-right postdate"><?php echo 'Written by '; the_author(); ?></p>
                                                    <p class="text-right postdate"><?php the_tags(); ?></p>


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

                            <ul class="pagination accentcolor2 center-align" role="pagination">
                              <?php if( get_previous_posts_link() ) :

                              previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-arrow-left fa-2x"></i></li>' );

                              endif; ?>

                              <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></li>
                              <?php if( get_next_posts_link() ) :

                              next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-arrow-right fa-2x"></i></li>' );

                              endif; ?>
                            </ul>
                            <!-- navigation?-->

                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                    <div class="col s12 m12 l4 hide-on-med-and-down">
                        <?php get_sidebar( 'primary' ); ?>
                    </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
