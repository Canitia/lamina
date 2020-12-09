<?php get_header(); ?>
  <div class="row">

  <div class="main-content col-md-12 col-lg-12" >
        
      <?php if($paged <= 1) {

        if ( is_archive() && !is_tag() && !is_author() ) { ?>
            <h1 class="text-left-title-featured-sidebar text-center top-text"><?php esc_html_e('Archive ', 'lamina');?> <strong><?php the_archive_title();?></strong></h1>  
            <hr class="top-text-hr"/>
        <?php }
        elseif ( is_tag() ) { ?>
            <h1 class="text-left-title-featured-sidebar text-center top-text"><?php esc_html_e('Posts tagged', 'lamina');?> <strong><?php single_tag_title(); ?></strong></h1>  
            <hr class="top-text-hr"/>
        <?php } 
        elseif ( is_author() ) {?>
            <?php 
                echo get_avatar( get_the_author_meta('email'), '100', $default, $alt, array( 'class' => array( 'avatar-post avatar-author-page' ) ) ); 
            ?>
            <h1 class="text-left-title-featured-sidebar text-center top-text"><?php esc_html_e('Latest posts by', 'lamina'); ?> 
            <?php $lamina_curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
              echo '<strong>' . esc_html($lamina_curauth->display_name) . '</strong>';?></h1>
              <hr class="top-text-hr" />
        <?php }
        }
         ?>

  <div class="row page-row">
  <!-- show the right header item -->

     <?php

    if ( have_posts() ) {
    while ( have_posts() ) : the_post(); ?>

          <div class="card col col-sm-12 col-md-6 col-lg-4">
          <a href="<?php the_permalink(); ?>">
              <?php if ( has_post_thumbnail() && is_sticky() ) {

                    the_post_thumbnail( 'medium', array( 'class' => 'card-img-top homepage-image homepage-image-featured' ) );                
              }
                elseif ( has_post_thumbnail() ) {
                  the_post_thumbnail( 'medium', array( 'class' => 'card-img-top homepage-image' ) );                  
                }

                 else { ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title(); ?>" class="card-img-top homepage-image" />
                <?php } ?>

            </a>
            <div class="card-block">
                  <?php if ( is_sticky() ) { ?>
                    <span class="badge-featured">
                      <?php esc_html_e('Featured', 'lamina');?>
                    </span>
                <?php
                } ?>
              <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="card-text"><?php echo esc_html(get_the_excerpt()); ?></p>
                <div class="card-actions-top">
                    <small class="text-muted badge">
                        <time datetime="<?php echo esc_html(get_the_date('c')); ?>"><?php echo esc_html(human_time_diff( get_the_time('U'), current_time('timestamp'))); echo esc_html('&nbsp;'); echo esc_html('ago'); ?></time>
                  </small>
                </div>
            </div>
          </div>     

      
          <?php endwhile; } else { ?>
          <div class="post-content">
              <p><?php esc_html_e('Sorry, it seems there are no posts available.', 'lamina'); ?></p>
              <?php get_search_form(); ?>
          </div><!-- post-content END! -->
                
          <?php }
          wp_reset_postdata(); 
          ?>
      

   </div>
   <hr />
  <!-- pagination?-->
  <?php lamina_pagination_numeric_posts_nav(); ?>

</div> <!-- close content main -->

</div> <!-- row main -->
<!-- start of footer -->
<?php get_footer(); ?>
