<?php get_header(); ?>
     <div class="row">

      <?php if ( get_theme_mod( 'sidebar_position' ) == 'left' ) : ?>
      <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
      <?php endif; ?>

        <div class="<?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12'; echo ' style="border-right:0';};?> main-content">
        <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts tagged', 'canitia');?> <strong><?php single_tag_title(); ?></strong></h1>
        <div class="collection">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                    <div class="collection-item">
                        <p title="<?php the_title_attribute(); ?>" class="truncate"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title(); ?>
                          <span class="badge">
                            <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
                        </span> 
                        </p>
                    </div>
                    </a>
                </div><!-- close post class div -->

              <!-- error handling -->
              <?php endwhile; else: ?>
                <div class="post-content post-errortext">
                  <p><?php _e('Sorry, no posts can be found within this tag.', 'canitia'); ?></p>
                  <?php get_search_form(); ?>
                </div>
           
              <?php endif; ?>
                <?php canitia_pagination_numeric_posts_nav(); ?>
          </div><!-- einde md8 -->
          </div>
            <?php if ( get_theme_mod( 'sidebar_position' ) == 'right' ) : ?>
            <!-- second column (widget bar) -->
            <?php get_sidebar( 'primary' ); ?>
            <?php endif; ?>

            </div><!-- end row -->

          <!-- start of footer -->
          <?php get_footer(); ?>
