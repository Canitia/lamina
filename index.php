<?php get_header(); ?>
  <div class="row">

    <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' ) : ?>
    <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>
  <div class="main-content <?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12'; echo ' style="border-right:0';};?>" >
        
      <h1 class="text-left-title-featured-sidebar"><?php _e('Latest', 'canitia');?></h1>            


  <!-- show the right header item -->
     <div class="row">
      <?php
      $args = array( 'orderby'=> 'date', 'order' => 'DESC', 'paged' => $paged ); 
      $main_query = new WP_Query( $args );
      if ( $main_query->have_posts() ) : 
        while ( $main_query->have_posts() ) : $main_query->the_post(); ?>
          <div class="col col-sm-12 col-md-6 col-lg-4 post-item-main">

          <?php

          if ( is_sticky() ) { ?>
                      <span class="badge-featured">
                        Featured
                      </span>
          <?php
          } elseif ( !is_sticky() ) {?>
          <span class="badge">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
                      </span>

          <?php }

          ?>



              <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail()  && is_sticky() ) {

                    the_post_thumbnail( 'thumbnail', array( 'class' => 'homepage-image post-featured' ) );                
              }
                elseif ( has_post_thumbnail() && !is_sticky() ) {
                  the_post_thumbnail( 'thumbnail', array( 'class' => 'homepage-image' ) );                  
                }

                 else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/no-pic-available.jpg" alt="<?php the_title(); ?>" class="homepage-image" />
                <?php } ?>

                  <h2 class="caption-image"><?php the_title(); ?></h2>
            </a>

          </div>
          <?php endwhile; else: ?>
          <div class="post-content">
              <p><?php _e('Sorry, it seems there are no posts available.', 'canitia'); ?></p>
              <?php get_search_form(); ?>
          </div><!-- post-content END! -->
                
      <?php endif; 
              wp_reset_postdata(); 
      ?>
      
  </div><!-- close collection 2 -->

  <!-- navigation?-->
  <?php canitia_pagination_numeric_posts_nav(); ?>

</div> <!-- close content main -->

  <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>


</div> <!-- row main -->
<!-- start of footer -->
<?php get_footer(); ?>
