<?php get_header(); ?>
<div class="container-fluid">
     <div class="row">
       <?php if ( get_theme_mod( 'sidebar_position', 'left' ) == 'left' ) : ?>
      <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>
        <div class="<?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12';};?> main-content">
          <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts in', 'canitia'); ?> <strong><?php single_cat_title(); ?></strong></h1>
        <div class="collection">
      <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <div>
                  <div <?php post_class(); ?>>

                      <div class="collection-item">
                      <a href="<?php the_permalink(); ?>">
                          <p title="<?php the_title_attribute(); ?>" class="truncate"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                            <span class="badge">
                              <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
                          </span> 
                          </p>
                      </a>
                      </div>

              </div><!-- close post class div -->
            </div>
                  <!-- column end! -->

              <!-- error handling -->
              <?php endwhile; else: ?>
                <div class="post-content">
                    <p><?php _e('Sorry, there are no posts in this category.', 'canitia'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- post-content END! -->
              <?php endif; ?>
        </div>
          <?php canitia_pagination_numeric_posts_nav(); ?>
      </div><!-- einde md8 -->

      <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
        <!-- second column (widget bar) -->
        <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>

    </div><!-- end row -->
  </div><!-- container fluid END! -->

          <!-- start of footer -->
          <?php get_footer(); ?>