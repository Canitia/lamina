<?php get_header(); ?>



<div>    
    <?php		
    $args = array(		
      'posts_per_page' => 3,		
      'post__in'  => get_option( 'sticky_posts' )		
     );		
     $query = new WP_Query( $args );		
 		
     if ( $query->have_posts() ) : ?>		
             <div class="slider">		
                 <ul class="slides">		
                  <?php		
                  // The Loop		
                  if ( $query->have_posts() ) {		
                   while ( $query->have_posts() ) {		
                     $query->the_post();		
                     echo '<li>';		?>		
                     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">		
                     <?php if ( has_post_thumbnail() ) {		
                                   the_post_thumbnail( 'large', array( 'class' => 'responsive-img' ) );		
                           } else { ?>		
                             <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" />		
                             <?php }; ?>		
                     </a><?php		
                     echo '<div class="caption center-align"><h3 class="text-left-title-featured">';		
                     the_title();		
                     echo '</h3></div></li>';		
 		
                   }		
                  }
                  endif;	
                  /* Restore original Post Data */		
                  wp_reset_postdata();		
           ?>
</div>
</div>

  <div class="row">
    <div class="main-content col s12 m8 l8">
 
     <h1 class="text-left-title-featured-sidebar"><?php _e('Latest', 'cerulean-for-wordpress'); ?></h1>
 <ul class="collection">
    <?php 
    $args = array( 'orderby'=> 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1 ); 
    $my_query = new WP_Query( $args );
    if ( $my_query->have_posts() ) : 
      while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>">
        <li class="collection-item truncate">
            <p title="<?php the_title_attribute(); ?>"><?php if ( is_sticky() ) {?> <i class="fa fa-star" aria-hidden="true"></i> <?php } else {?> <i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
              <span class="badge">
              <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></time>
            </span> 
            </p>
        </li>
        </a><?php endwhile; else: ?>
                            <!-- error handling -->
                        		      <p><?php _e('Sorry, it seems there are no posts available.', 'cerulean-for-wordpress'); ?></p>
                            <?php endif; ?>
                        </ul>
        <?php /* Restore original Post Data */		
           wp_reset_postdata();	?>
                            <!-- navigation?-->

                          <ul class="pagination center-align" role="pagination">
                            <?php if( get_previous_posts_link() ) :

                            previous_posts_link( '<li class="pagination-arrows newer-posts"><i class="fa fa-ellipsis-h"></i></li>' );

                            endif; ?>

                            <li class="active"><?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; echo $paged; ?> </li>

                            <?php if( get_next_posts_link() ) :

                            next_posts_link( '<li class="pagination-arrows older-posts"><i class="fa fa-ellipsis-h"></i></li>' );

                            endif; ?>
                          </ul>
                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                        <?php get_sidebar( 'primary' ); ?>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
