<?php get_header(); ?>

     <div class="row">
               <div class="col s12 m8 l8 main-content">
                 <h1 class="text-left-title-featured-sidebar">Latest posts in <?php single_cat_title(); ?></h1>
                <ul class="collection">
                              <?php if ( have_posts() ) : ?>
                                  <?php while ( have_posts() ) : the_post(); ?>
                                    <div>
                                          <div <?php post_class(); ?>>
                                              <a href="<?php the_permalink(); ?>">
                                              <li class="collection-item truncate">
                                                  <p title="<?php the_title_attribute(); ?>"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                                                    <span class="badge">
                                                    <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time>
                                                  </span> 
                                                  </p>
                                              </li>
                                              </a>
                                      </div><!-- close post class div -->
                                    </div>
                                          <!-- column end! -->

                                      <!-- error handling -->
                                      <?php endwhile; else: ?>
                                  		      <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                                      <?php endif; ?>
              </ul>
                                      <!-- navigation?-->

                                    <ul class="pagination center-align" role="pagination">
                                      <?php if( get_previous_posts_link() ) :

                                      previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-ellipsis-h"></i></li>' );

                                      endif; ?>

                                      <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?></li>
                                      <?php if( get_next_posts_link() ) :

                                      next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-ellipsis-h"></i></li>' );

                                      endif; ?>
                                    </ul>
                                    </div><!-- einde md8 -->

                  <?php get_sidebar( 'primary' ); ?>

            </div><!-- end row -->
          </div><!-- container fluid END! -->

          <!-- start of footer -->
          <?php get_footer(); ?>