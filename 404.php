<?php get_header();?>

<div class="container-fluid">
  <div class="row">

    <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>

    <div class="main-content col-xs-12 col-md-8 col-lg-8">
        <h1 class="text-left-title-featured-sidebar error"><?php _e('Error', 'cerulean-for-wordpress'); ?></h1>
        <div class="post-content">
          <p><?php _e('This post/page doesnt exist anymore or has been renamed. Try searching for it.', 'cerulean-for-wordpress');?></p>
        </div><!-- post-content END! -->

<?php get_search_form(); ?>

  </div><!-- main content END! -->

    <?php if ( get_theme_mod( 'move_sidebar_left' ) == 0 ) : ?>
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>
    
</div><!-- row END! -->
</div><!-- container END! -->
<!-- start of footer -->
<?php get_footer();
?>
