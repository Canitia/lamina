<?php get_header(); ?>

<div class="container-fluid">

  <div class="slider hide-on-small-only">
                <ul class="slides">
       <?php
       $args = array(
       	'posts_per_page'      => 3,
       	'post__in'            => get_option( 'sticky_posts' ),
       	'ignore_sticky_posts' => 1,
       );

       // The Query
       $the_query = new WP_Query( $args );

       // The Loop
       if ( $the_query->have_posts() ) {
       	while ( $the_query->have_posts() ) {
       		$the_query->the_post();
          echo '<li>';
          if ( has_post_thumbnail() ) {
            the_post_thumbnail();
          }
          echo '<div class="caption center-align"><h3 class="text-left-title-featured accentcolor2">';
          the_title();
          echo '</h3></div></li>';

       	}
       } else {
       	// no posts found
       }
       /* Restore original Post Data */
       wp_reset_postdata();
?>




              </ul>
  </div><!-- .slider -->




  <div class="row">
                    <?php if ( have_posts() ) : ?>
                          <div class="main-content col s12 m12 l8">
                        <?php while ( have_posts() ) : the_post(); ?>

                                      <div class="card hoverable">
                                        <article>
                                              <div>
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                <?php endif; ?>
                                                  </a>
                                            </div>
                                            <div>
                                                      <h1 class="text-left-title center-align"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
                                                      <p class="postdate center-align"><i class="fa fa-clock-o"></i><time> <?php echo get_the_date(); ?></time></p>
                                                                <?php the_excerpt(); ?>
                                            </div>
                                        </article>
                                        </div>

                                    <hr>

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
                    <div class="col s12 m12 l4 hide-on-med-and-down">
                        <?php get_sidebar( 'primary' ); ?>
                    </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
