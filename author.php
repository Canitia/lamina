<?php get_header();?>
<div class="container-fluid">
<div class="row">

  <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>

  <div class="col-xs-12 col-md-8 col-lg-8 main-content">
  <h1 class="text-left-title-featured-sidebar" style="color: <?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Latest posts by', 'canitia'); ?> 
  <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    echo '<strong>' . $curauth->display_name . '</strong>';?></h1>

   <div class="collection">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
        <div class="collection-item truncate">
        <a href="<?php the_permalink();?>">
            <p title="<?php the_title_attribute();?>"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title();?>
              <span class="badge">
                 <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'canitia'); ?></time>
            </span> 
            </p>
        </a>
        </div>

    <!-- error handling -->
    <?php endwhile; else: ?>
      <div class="post-content post-errortext">
          <p><?php _e('Sorry, there are no posts by this author.', 'canitia'); ?></p>
         
         <?php get_search_form(); ?>
      </div><!-- post-content END! -->
    <?php endif;?>
    </div>

       <?php canitia_pagination_numeric_posts_nav(); ?>

  </div>
  <!-- einde md8 -->
    <?php if ( get_theme_mod( 'move_sidebar_left' ) == 0 ) : ?>
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>

</div>
<!-- end row -->
</div>
<!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer();
?>
