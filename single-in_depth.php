<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <div class="post-header-img">
      <?php if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'large' );
            } else { ?>
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" class="responsive-img" />
      <?php }; ?>
      </div>

      <div class="jumbotron accentcolor2">
          <div class="container">
                  <div class="col-md-24 center">
                      <h3 class="posttitle-single"><?php the_title(); ?></h3>
                      <div>
                          <div class="type-p3"><?php
                          // Fetch post content
                          $content = get_post_field( 'post_content', get_the_ID() );

                          // Get content parts
                          $content_parts = get_extended( $content );

                          // Output part before <!--more--> tag
                          echo $content_parts['main'];

                           ?></div>
                          <br />
                          <p class="postdate-single center-align">
                            <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                            <i class="fa fa-user-secret"></i>  <?php the_author_posts_link();?>
                            <?php if( is_sticky() ) {
                              ?><i class="fa fa-star"></i> Featured
                          <?php  } ?>
                          </p>
                      </div>
                  </div>
          </div>
      </div>
     <div class="row-single">
     <div class="main-content">
                          <div class="card">
                                <div <?php post_class(); ?>>
                                    <article>
                                      <div class="card-content card-content-single">
                                        <p><?php the_content(); ?></p>
                                      </div>
                                      <?php if(has_tag()) { ?>
                                      <div class="tags center">
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
                            <?php endif; ?>

                            <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
                          </div><!-- einde md8 -->

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
