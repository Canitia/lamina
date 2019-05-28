<?php get_header(); ?>
  <div class="row">

    <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' ) : ?>
    <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>
  <div class="main-content <?php if ( is_active_sidebar('primary')) { echo 'col-md-12 col-lg-12'; echo ' style="border-right:0';};?>" >
        
      <?php if($paged <= 1) {

        if ( is_archive() && !is_tag() && !is_author() ) { ?>
            <h1 class="text-left-title-featured-sidebar text-center"><?php _e('Archive ', 'lamina');?> <strong><?php the_archive_title();?></strong></h1>  
        <?php }
        elseif ( is_tag() ) { ?>
            <h1 class="text-left-title-featured-sidebar text-center"><?php _e('Posts tagged', 'lamina');?> <strong><?php single_tag_title(); ?></strong></h1>  
        <?php } 
        elseif ( is_author() ) {?>
            <h1 class="text-left-title-featured-sidebar text-center"><?php _e('Latest posts by', 'lamina'); ?> 
            <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
              echo '<strong>' . $curauth->display_name . '</strong>';?></h1>
        <?php }
        elseif ( is_home() || is_front_page() ) {?>
               <h1 class="text-left-title-featured-sidebar text-center"><?php _e('Latest posts by', 'lamina'); ?> </h1>
               <p class="text-center"><?php _e('Read the newest posts','lamina'); ?></p>
        <?php } ?>

  <div class="row page-row">
  <!-- show the right header item -->

     <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;


      $args = array(
        'ignore_sticky_posts' => 1,
        'paged' => $paged
      );
      $query = new WP_Query($args);

     if ( $query->have_posts() ) {
    while ( $query->have_posts() ) : $query->the_post(); ?>

          <div class="card col col-sm-12 col-md-12 col-lg-6 col-xl-4">
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
                              <?php _e('Featured', 'lamina');?>
                            </span>
                <?php
                } ?>
              <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p class="card-text"><?php echo  get_the_excerpt(); ?></p>
                <div class="card-actions-top">
                    <small class="text-muted badge">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'lamina'); ?></time>
                  </small>
                </div>
            </div>
          </div>     

      
          <?php endwhile; } else { ?>
          <div class="post-content">
              <p><?php _e('Sorry, it seems there are no posts available.', 'lamina'); ?></p>
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
