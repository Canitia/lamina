<?php get_header(); ?>

     <div class="row">
          <div class="tag_heading center-align">
          <h3><?php single_tag_title(); ?></h3>
          <hr />
          </div>

     <div class="col s12 m12 l8 main-content">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                                    <div <?php post_class(); ?>>
                                    <article>
                                      <?php
                                      if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                      }?>
                                      <h1 class="text-left-title center-align"></i><?php the_title(); ?></h1>
                                      <h4 class="text-left-title-featured center-align">
                                        <p class="postdate center-align">
                                          <i class="fa fa-clock-o"></i><time> <?php echo get_the_date(); ?></time>
                                          <i class="fa fa-user-secret"></i>  <?php the_author_posts_link();    ?>
                                          <?php edit_post_link('edit', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' ); ?>
                                        </p>
                                      </h4>
                                                            <div class="entry clear"><!--. entry-->
                                                                <p class="text-justify-individual"><?php the_content(); ?></p>

                                                            </div><!--. entry-->

                                                        <!--.post-footer-->
                                                        <footer>
                                                          <div class="tags center-align">
                                                          <?php the_tags( '<div class="chip accentcolor">', '</div><div class="chip accentcolor">', '</div>' ); ?>
                                                          </div>
                                                        </footer>
                                                            <!--.post-footer-->
                                    </article><!-- close article -->


                                          <!-- let user enter a comment -->
                                		<?php //comments_template(); ?>
                            </div><!-- close post class div -->
                                <!-- column end! -->



                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php echo wpautop( 'Sorry, no posts were found' ); ?></p>
                            <?php endif; ?>

                            </div><!-- einde md8 -->


    <div class="col l4 hide-on-med-and-down">
        <?php get_sidebar( 'primary' ); ?>
    </div>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
