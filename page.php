<?php get_header(); ?>

     <div class="row">
     <div class="col s12 m12 l8 main-content">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $argsnosticky = array(
                        'ignore_sticky_posts' => 1,
                        'posts_per_page' => 8,
                        'paged' => $paged
                    );

                    $querynosticky = new WP_Query( $argsnosticky );

                    if ( $querynosticky->have_posts() ) : ?>
                        <?php while ( $querynosticky->have_posts() ) : $querynosticky->the_post(); ?>

                                    <div <?php post_class(); ?>>
                                    <article>
                                      <p class="postdate right"><i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                                        <div class="card-image">
                                          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                          <?php if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail( 'medium', array( 'class' => 'responsive-img' ) );
                                                } else { ?>
                                                  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />
                                                  <?php }; ?>
                                          </a>
                                          <span class="card-title">
                                            <p class="posttitle"><?php the_title(); ?></p>
                                            </span>
                                        </div>
                                        <div class="card-content">
                                          <p><?php the_content(); ?></p>
                                        </div>
                                        <div class="tags center-align">
                                        <?php the_tags( '<div class="waves-effect waves-light chip accentcolor2">', '</div><div class="waves-effect waves-light chip accentcolor2">', '</div>' ); ?>
                                        </div>

                                        <section class="author-profile">
                                          <p class="author-bio">
                                        <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
                                          <strong><i class="fa fa-user-secret"></i>  <?php the_author_posts_link();?></strong>
                                            <?php edit_post_link('edit', '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>' ); ?>
                                          <br />
                                            <?php echo nl2br(get_the_author_meta('description'));  ?>
                                        </p>
                                        </section>
                                    </article><!-- close article -->


                                          <!-- let user enter a comment -->
                                		<?php //comments_template(); ?>
                            </div><!-- close post class div -->
                                <!-- column end! -->



                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                            <?php endif; ?>

                            </div><!-- einde md8 -->


    <div class="col l4 hide-on-med-and-down">
        <?php get_sidebar( 'primary' ); ?>
    </div>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
