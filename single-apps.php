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
                                        <p class="postdate center-align">
                                          <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
                                          <i class="fa fa-user-secret"></i>  <?php the_author_posts_link();?>
                                          <?php if( is_sticky() ) {
                                            ?><i class="fa fa-star"></i> Featured
                                        <?php  } ?>
                                        </p>
                                        <hr />
                                        <?php
                                        $parentname = get_field('appparent', get_the_id());
                                        var_dump($parentname);

                                            $args = array( 'post_type' => 'app-updates', 'posts_per_page' => 5, 	'meta_key'		=> 'appparent',	'meta_value'	=> $parentname );
                                            ?>

                                            <h2>Latest app updates</h2>
                                            <ul class="collection">
                                            <?php

                                            $loop = new WP_Query( $args );
                                            //var_dump($loop);
                                            while ( $loop->have_posts() ) : $loop->the_post();
                                              ?>
                                                <li class="collection-item">

                                               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>


                                            </li>
                                        <?php endwhile; // end of the loop. ?>
                                          </ul>
                                            <?php wp_reset_postdata(); ?>

                                      </div>


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

    <div class="col l4 hide-on-med-and-down">
        <?php get_sidebar( 'primary' ); ?>
    </div>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
