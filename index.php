<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="main-content col s12 m8 l8">
    <?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      if ($paged < 2) {    
    ?>
    <h1 class="text-left-title-featured-sidebar"><?php _e('Today', 'cerulean-for-wordpress'); ?></h1>
    <ul class="collection">
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
        <li class="collection-item">
        <a href="<?php the_permalink(); ?>">
            <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
              <span class="badge">
               <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
            </span> 
            <?php echo the_date();?>
            </p>
        </a>
        </li>
          <?php
        }
        
      } else { ?>
      <li class="post-errortext">
        <?php
           _e('It seems there are no posts today.', 'cerulean-for-wordpress'); 
        ?>
      </li>
      <?php     
      }

      wp_reset_postdata(); 
      };
      ?>
      </ul>

    <h1 class="text-left-title-featured-sidebar"><?php _e('Older posts', 'cerulean-for-wordpress');?></h1>
    <ul class="collection">
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
        <li class="collection-item">
        <a href="<?php the_permalink(); ?>">
            <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
              <span class="badge">
              <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
            </span> 
            </p>
        </a>
        </li>
        <?php endwhile; else: ?>
        <!-- error handling -->
        <p><?php _e('Sorry, it seems there are no posts available.', 'cerulean-for-wordpress'); ?></p>
    <?php endif; ?>
    </ul>

<!-- navigation?-->

<?php get_template_part( 'partials/pagination' ); ?>
  </div><!-- einde md8 -->  <!-- column end! -->

  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>

  </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
