<?php get_header(); ?>

  <div class="row">
    <div class="main-content col s12 m12 l8">
                        <?php
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                        ?>
                                      <div class="card large">
                                        <p class="postdate right">
                                          <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                                          <?php if( is_sticky() ) {
                                            ?><i class="fa fa-star"></i>
                                        <?php  } ?>
                                        </p>
                                          <div class="card-image">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php if ( has_post_thumbnail() ) {
                                                          the_post_thumbnail( 'medium', array( 'class' => 'responsive-img' ) );
                                                  } else { ?>
                                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />
                                                    <?php }; ?>
                                            </a>
                                            <span class="card-title">
                                              <p class="posttitle"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
                                              </span>
                                          </div>
                                          <div class="card-content">
                                            <?php the_excerpt(); ?>
                                          </div>
                                        </div>

                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php echo wpautop( 'Sorry, seems there are no posts available' ); ?></p>
                            <?php endif; ?>
                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                    <div class="col s12 m12 l4 hide-on-med-and-down">
                        <?php get_sidebar( 'primary' ); ?>
                    </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
