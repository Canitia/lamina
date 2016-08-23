<?php get_header(); ?>

     <div class="row">
     <div class="col s12 m12 l8 main-content">

                      <div class="card-content">
                        <p>

                          <?php $my_query = new WP_Query( 'post_type=app-updates&posts_per_page=10' );
                          while ( $my_query->have_posts() ) : $my_query->the_post();
                          $do_not_duplicate = $post->ID; 
                          	$my_query->the_title();?>
                          <?php endwhile; ?>
                          	<!-- Do other stuff... -->
                          <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                          if ( $post->ID == $do_not_duplicate ) continue; ?>
                                    <div class="card">
                                          <div <?php post_class(); ?>>
                                              <article>
                                                <span class="card-title-single">
                                                  <p class="posttitle-single"><?php the_title(); ?></p>
                                                  </span>
                                                <div class="card-image card-image-single">
                                                  <?php if ( has_post_thumbnail() ) {
                                                                  the_post_thumbnail( 'large', array( 'class' => 'responsive-img' ) );
                                                        } else { ?>
                                                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" class="responsive-img" />
                                                          <?php }; ?>
                                                </div>
                                                <!-- error handling -->
                                                <?php endwhile; else: ?>
                                                      <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                                                <?php endif;
                           ?>

                        </p>
                      </div>
                    </article><!-- close article -->

                          <!-- let user enter a comment -->
                    <?php //comments_template(); ?>
            </div><!-- close post class div -->
          </div>
                <!-- column end! -->





            <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
          </div><!-- einde md8 -->

<div class="col l4 hide-on-med-and-down">
<?php get_sidebar( 'primary' ); ?>
</div>

</div><!-- end row -->


</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
