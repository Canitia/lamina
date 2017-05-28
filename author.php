<?php get_header();?>
<div class="container-fluid">
<div class="row">

  <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>

  <div class="col-xs-12 col-md-8 col-lg-8 main-content">
  <h1 class="text-left-title-featured-sidebar"><?php _e('Latest posts by', 'cerulean-for-wordpress'); ?> 
  <?php $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    echo '<strong>' . $curauth->display_name . '</strong>';?></h1>

   <ul class="collection">
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
        <li class="collection-item truncate">
        <a href="<?php the_permalink();?>">
            <p title="<?php the_title_attribute();?>"><i class="fa fa-circle" aria-hidden="true"></i><?php the_title();?>
              <span class="badge">
                 <time datetime="<?php the_time('c'); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp')); echo '&nbsp;'; _e('ago', 'cerulean-for-wordpress'); ?></time>
            </span> 
            </p>
        </a>
        </li>

    <!-- error handling -->
    <?php endwhile; else: ?>
    <p class="post-errortext">
      <?php _e('Sorry, there are no posts by this author.', 'cerulean-for-wordpress'); ?>
    </p>
    <?php endif;?>
    </ul>

       <?php cerulean_pagination_numeric_posts_nav(); ?>

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
