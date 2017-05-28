<?php get_header(); ?>
<div class="container-fluid">
     <div class="row">
       <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
      <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>
        <div class="col-xs-12 col-md-8 col-lg-8 main-content">
          <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts in', 'cerulean-for-wordpress'); ?> <strong><?php single_cat_title(); ?></strong></h1>
        <ul class="collection">
      <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <div>
                  <div <?php post_class(); ?>>

                      <li class="collection-item">
                      <a href="<?php the_permalink(); ?>">
                          <p title="<?php the_title_attribute(); ?>" class="truncate"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                            <span class="badge">
                              <time datetime="<?php the_time(get_option( 'date_format' )); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
                          </span> 
                          </p>
                      </a>
                      </li>

              </div><!-- close post class div -->
            </div>
                  <!-- column end! -->

              <!-- error handling -->
              <?php endwhile; else: ?>
                <div class="post-content">
                    <p><?php _e('Sorry, this category can not be found.', 'cerulean-for-wordpress'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- post-content END! -->
              <?php endif; ?>
        </ul>
          <?php cerulean_pagination_numeric_posts_nav(); ?>
      </div><!-- einde md8 -->

      <?php if ( get_theme_mod( 'move_sidebar_left' ) == 0 ) : ?>
      <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>

    </div><!-- end row -->
  </div><!-- container fluid END! -->

          <!-- start of footer -->
          <?php get_footer(); ?>