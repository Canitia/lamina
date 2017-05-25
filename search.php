<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>
<div class="container-fluid">
 <?php get_template_part( 'partials/slider' ); ?>

  <div class="row">
    <div class="main-content col s12 m8 l8">
 
     <h1 class="text-left-title-featured-sidebar"><?php _e('Results for ', 'cerulean-for-wordpress'); echo '<strong>' . get_query_var("s") . '</strong>'; ?> </h1>
 <ul class="collection">

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
          <a href="<?php the_permalink(); ?>">
        <li class="collection-item">
            <p title="<?php the_title_attribute(); ?>" class="truncate"><?php if ( is_sticky() ) {?><i class="fa fa-star <?php echo 'sticky';?>" aria-hidden="true"></i><?php } else {?><i class="fa fa-circle" aria-hidden="true"></i><?php }; the_title(); ?>
              <span class="badge">
              <time><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
            </span> 
            </p>
        </li>
        </a>
                 <?php
        }
    }else{
?>
                        		      <p><?php _e('Sorry, it seems this search query has no posts.', 'cerulean-for-wordpress'); ?></p>
<?php } ?>
</ul>
                    </div><!-- einde md8 -->  <!-- column end! -->

                    <!-- second column (widget bar) -->
                        <?php get_sidebar( 'primary' ); ?>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
