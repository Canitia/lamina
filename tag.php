<?php get_header(); ?>
<div class="container-fluid">
     <div class="row">

      <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
      <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>

        <div class="col-xs-12 col-md-8 col-lg-8 main-content">
        <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color' ); ?>;"><?php _e('Latest posts tagged', 'cerulean-for-wordpress');?> <strong><?php single_tag_title(); ?></strong></h1>
        <div class="collection">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                    <div class="collection-item">
                        <p title="<?php the_title_attribute(); ?>" class="truncate"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                          <span class="badge">
                            <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
                        </span> 
                        </p>
                    </div>
                    </a>
                </div><!-- close post class div -->

              <!-- error handling -->
              <?php endwhile; else: ?>
                <div class="post-content post-errortext">
                  <p><?php _e('Sorry, no posts can be found within this tag.', 'cerulean-for-wordpress'); ?></p>
                  <?php get_search_form(); ?>
                </div>
           
              <?php endif; ?>
                <?php cerulean_pagination_numeric_posts_nav(); ?>
          </div><!-- einde md8 -->
          </div>
            <?php if ( get_theme_mod( 'move_sidebar_left' ) == 0 ) : ?>
            <!-- second column (widget bar) -->
            <?php get_sidebar( 'primary' ); ?>
            <?php endif; ?>

            </div><!-- end row -->
          </div><!-- container fluid END! -->

          <!-- start of footer -->
          <?php get_footer(); ?>
