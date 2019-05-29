<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<div class="main-content col-md-12 col-lg-12">
 
<div class="row page-row">

    <h1 class="text-left-title-featured-sidebar text-center top-text truncate"><?php esc_html_e('Results for ', 'lamina'); esc_html('<strong class="strong-search">') . get_query_var("s") . '</strong>'; ?> </h1>
    <div class="row">

    <?php

    if ( have_posts() ) {
            while ( have_posts() ) {
            the_post();
                    ?>
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
              <p class="card-text"><?php esc_html( get_the_excerpt() ); ?></p>
                <div class="card-actions-top">
                    <small class="text-muted badge">
                        <time datetime="<?php esc_html(get_the_date('c')); ?>"><?php esc_html(human_time_diff( get_the_time('U'), current_time('timestamp')); esc_html('&nbsp;'); esc_html_e('ago', 'lamina'); ?></time>
                  </small>
                </div>
            </div>
          </div>     

   <?php    }
    } else {?>

      <div class="post-content">
              <p><?php esc_html_e('Sorry, it seems there are no posts available.', 'lamina'); ?></p>
        <?php get_search_form(); ?>
    </div><!-- post-content END! -->
                
    <?php } ?>
</div><!-- end main-content -->
</div>
</div><!-- end row -->

<!-- start of footer -->
<?php get_footer(); ?>
