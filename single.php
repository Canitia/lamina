<?php get_header(); ?>

     <div class="row">
     <div class="col s12 m12 l8 main-content">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                          <div class="card">
                                <div <?php post_class(); ?>>
                                    <article>
<p class="postdate right"><i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                                      <div class="card-image">
                                        <?php
                                        if ( has_post_thumbnail() ) {
                                          the_post_thumbnail();
                                        }?>
                                        <span class="card-title">
                                          <p class="posttitle"><?php the_title(); ?></p>
                                          </p></span>
                                      </div>
                                      <div class="card-content">
                                        <p>{{content}}</p>
                                      </div>
                                      <div class="tags center-align">
                                      <?php the_tags( '<div class="waves-effect waves-light chip accentcolor2">', '</div><div class="waves-effect waves-light chip accentcolor2">', '</div>' ); ?>
                                      </div>
                                      <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
                                      <section class="author-profile">
                                        <p class="author-bio">
                                        <strong><i class="fa fa-user-secret"></i>  <?php the_author_posts_link();?></strong>
                                          <?php edit_post_link('edit', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' ); ?>
                                          <i class="fa fa-info fa-2x" aria-hidden="true"></i><a href="<?php the_author_meta('user_url');?>"><?php the_author_meta('user_url'); ?></a>

                                        <br />
                                          <?php get_the_author_meta('description'); ?>
                                      </p>
                                      </section>
                                    </article><!-- close article -->

                                          <!-- let user enter a comment -->
                                		<?php comments_template(); ?>
                            </div><!-- close post class div -->
                          </div>
                                <!-- column end! -->



                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                            <?php endif; ?>

                            <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
                          </div><!-- einde md8 -->

    <div class="col l4 hide-on-med-and-down">
        <?php get_sidebar( 'primary' ); ?>
    </div>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
