<?php get_header(); ?>

     <div class="row">
     <div class="col s12 m12 l8 main-content">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
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
                      <div class="card-content">
                        <p>



                                   <?php $my_query = new WP_Query( 'post_type=app-updates&posts_per_page=10' ); ?>

                                   <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                                   	<!-- Do special_cat stuff... --> <?php echo get_the_date(); ?>
                                   <?php endwhile; ?>




                        </p>
                      </div>
                      <?php if(has_tag()) { ?>
                      <div class="tags">
                        <p><strong>Tags: </strong><?php the_tags( '', ', ', '' ); ?>
                      </div>
                      <?php } ?>

                      <section class="author-profile">
                        <p class="author-bio">
                      <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
                        <?php the_author_posts_link();?>
                          <?php edit_post_link('edit', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' ); ?>
                        <br />
                          <?php echo nl2br(get_the_author_meta('description'));  ?>
                      </p>
                      </section>
                    </article><!-- close article -->

                          <!-- let user enter a comment -->
                    <?php //comments_template(); ?>
            </div><!-- close post class div -->
          </div>
                <!-- column end! -->



            <!-- error handling -->
            <?php endwhile; else: ?>
                  <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
            <?php endif;

            	 wp_reset_postdata(); ?>

            <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
          </div><!-- einde md8 -->

<div class="col l4 hide-on-med-and-down">
<?php get_sidebar( 'primary' ); ?>
</div>

</div><!-- end row -->


</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
