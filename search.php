<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
 <?php get_template_part( 'partials/slider' ); ?>

<div class="row">

  <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>

<div class="main-content col-xs-12 col-md-8 col-lg-8">
 
    <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color' ); ?>;"><?php _e('Results for ', 'cerulean-for-wordpress'); echo '<strong>' . get_query_var("s") . '</strong>'; ?> </h1>
    <div class="collection">

    <?php
    $s=get_search_query();
    $args = array(
      's' =>$s
    );
    // The Query
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
            $the_query->the_post();
                    ?>
                <div class="collection-item">
                    <a href="<?php the_permalink(); ?>">
                    <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
                        <span class="badge">
                            <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
                        </span> 
                    </p>
                    </a>
                </div>

   <?php    }
    } else {?>

        <div class="collection-item">
            <p><i class="fa fa-circle" aria-hidden="true"></i><?php _e('Sorry, it seems this search query has no posts.', 'cerulean-for-wordpress'); ?></p>
        </div>
        </div>

        <?php get_search_form(); ?>
    <?php } ?>

</div><!-- einde main-content -->
</div><!-- end row -->
  <?php if ( get_theme_mod( 'move_sidebar_left' ) == 0 ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
