<?php get_header(); ?>
<div class="container-fluid">
     <div class="row">
               <div class="col s12 m8 l8 main-content">
                 <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts tagged', 'cerulean-for-wordpress');?> <strong><?php single_tag_title(); ?></strong></h1>
                <ul class="collection">
                              <?php if ( have_posts() ) : ?>
                                  <?php while ( have_posts() ) : the_post(); ?>
                                    <div>
                                          <div <?php post_class(); ?>>
                                              <a href="<?php the_permalink(); ?>">
                                              <li class="collection-item">
                                                  <p title="<?php the_title_attribute(); ?>" class="truncate"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                                                    <span class="badge">
                                                      <time datetime="<?php the_date('Y-m-d'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
                                                  </span> 
                                                  </p>
                                              </li>
                                              </a>
                                      </div><!-- close post class div -->
                                    </div>
                                          <!-- column end! -->

                                      <!-- error handling -->
                                      <?php endwhile; else: ?>
                                  		      <p><?php _e('Sorry, no posts can be found within this tag.', 'cerulean-for-wordpress'); ?></p>
                                      <?php endif; ?>
                  <?php get_template_part( 'partials/pagination' ); ?>
                                    </div><!-- einde md8 -->

                  <?php get_sidebar( 'primary' ); ?>

            </div><!-- end row -->
          </div><!-- container fluid END! -->

          <!-- start of footer -->
          <?php get_footer(); ?>
