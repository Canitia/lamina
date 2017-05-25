<?php get_header();?>

<div class="container-fluid">
  <div class="row">
    <div class="main-content col s12 m8 l8">
        <h1 class="text-left-title-featured-sidebar error"><?php _e('Error', 'cerulean-for-wordpress'); ?></h1>
        <div class="post-content">
        <p class="post-errortext"><?php _e('This post/page doesnt exist anymore or has been renamed. Try searching for it.', 'cerulean-for-wordpress');?></p>
    </div><!-- main-content END! -->

<?php get_search_form(); ?>

  </div><!-- row END! -->
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
</div><!-- container fluid END! -->
<!-- start of footer -->
<?php get_footer();
?>
