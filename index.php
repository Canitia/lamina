<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">

    <?php if ( get_theme_mod( 'sidebar_position', 'left' ) == 'left' ) : ?>
    <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>

  <div class="main-content <?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12'; echo ' style="border-right:0';};?>" >

    <?php 
    if ( get_theme_mod( 'display_today' ) == 1 ) : //show today section or not

      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      if ($paged < 2) {    //only show today section on page 1
      ?>
 
      <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Today', 'canitia'); ?></h1>
      <div class="collection">
      <?php

        $lastweek_args = array(
          'post_type'      => 'post',
          'post_status'    => 'publish',
          'orderby'        => 'date',
          'order'          => 'DESC',
          'ignore_sticky_posts' => 1,
          'date_query'     => array(
                                      array(             
                                        'after' => '1 day ago'
                                      )
                                )
        );
        $lastweek_query = new WP_Query( $lastweek_args );

        if ( $lastweek_query->have_posts() ) {
          
          while ( $lastweek_query->have_posts() ) {
            $lastweek_query->the_post();
            ?>
          <div class="collection-item">
          <a href="<?php the_permalink(); ?>">
              <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
                <span class="badge">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
              </span> 
              </p>
          </a>
          </div>
            <?php
          
          
        } ?>
                </div> <!-- end first collection -->
        <?php } else { ?>
              <p class="post-errortext"><i class="fa fa-circle" aria-hidden="true"></i><?php  _e('It seems there are no posts today.', 'canitia'); ?></p>
          </div> <!-- end first collection -->
        <?php     
        }

        wp_reset_postdata(); 
        };
        ?>
        
      <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Older posts', 'canitia');?></h1>            
  <?php endif; ?>

  <!-- end today section -->
  
  <!-- show the right header item -->
  <?php 
  if ( get_theme_mod( 'display_today' ) == 0 ) :   ?>
      
      <?php if ($paged <= 1) { ?>
       <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Latest', 'canitia');?></h1>        
      <?php }
      else { ?>
        <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Older posts', 'canitia');?></h1> 
      <?php }
      ?>    
 <?php endif;?>
 

  <div class="collection">
      <?php
      $args = array( 'orderby'=> 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1, 'paged' => $paged,
              'date_query'     => array(
                                      array(
                                        'column' => 'post_date_gmt',              
                                        'before' => '1 day ago'

                                      )
                                )    
      ); 
      $main_query = new WP_Query( $args );
      if ( $main_query->have_posts() ) : 
        while ( $main_query->have_posts() ) : $main_query->the_post(); ?>
          <div class="collection-item">
          <a href="<?php the_permalink(); ?>">
              <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
                <span class="badge">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
              </span> 
              </p>
          </a>
          </div>
          <?php endwhile; else: ?>
          <div class="post-content">
              <p><?php _e('Sorry, it seems there are no posts available.', 'canitia'); ?></p>
              <?php get_search_form(); ?>
          </div><!-- post-content END! -->
                
      <?php endif; ?>
  </div><!-- close collection 2 -->

  <!-- navigation?-->
  <?php canitia_pagination_numeric_posts_nav(); ?>

</div> <!-- close content main -->

  <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>


</div> <!-- row main -->
</div> <!-- fluid main -->
<!-- start of footer -->
<?php get_footer(); ?>
