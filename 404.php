<?php get_header();?>

<div class="container-fluid">
  <div class="row">

    <?php if ( get_theme_mod( 'move_sidebar_left' ) == 1 ) : ?>
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>

    <div class="main-content <?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12';};?>">
        <h1 class="text-left-title-featured-sidebar error" style="<?php echo get_theme_mod( 'set_itemheader_color', '#979797' ); ?>;"><?php _e('Error', 'canitia'); ?></h1>
        <div class="post-content post-errortext">
          <p><?php _e('This post/page doesnt exist anymore or has been renamed. Try searching for it.', 'canitia');?></p>
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
