<?php get_header(); ?>
<div class="container-fluid">
  <div class="row">
    <div class="main-content col s12 m8 l8">
 
     <h1 class="text-left-title-featured-sidebar"><?php _e('Latest', 'cerulean-for-wordpress'); ?></h1>
 <ul class="collection">
    <?php 
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array( 'orderby'=> 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1, 'paged' => $paged ); 
    $my_query = new WP_Query( $args );
    if ( $my_query->have_posts() ) : 
      while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
        <li class="collection-item">
            <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
              <span class="badge">
              <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
            </span> 
            </p>
        </li>
        </a><?php endwhile; else: ?>
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
