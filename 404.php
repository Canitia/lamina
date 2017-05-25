<?php get_header();?>

   <div class="container-fluid">
     <div class="row">
           <div class="main-content col s12 m8 l8">
                <h1 class="text-left-title-featured-sidebar"><?php _e('Error', 'cerulean-for-wordpress'); ?></h1>
              <div class="post-content">
                <p><?php _e('This post or page doesnt exist anymore. To continue please select a menu option from the navigation menu or navigate to the previous page.', 'cerulean-for-wordpress');?></p>
              </div>

</div><!-- container fluid END! -->
    <!-- second column (widget bar) -->
    <?php get_sidebar( 'primary' ); ?>
<!-- start of footer -->
<?php get_footer();
?>
