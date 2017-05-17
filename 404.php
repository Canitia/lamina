<?php get_header();
?>

   <div class="container-fluid">
     <div class="row">
                      <div class="card large card-error">
                          <div class="card-image center">
                            <i class="fa fa-ban fa-5x" aria-hidden="true"></i>
                            <span class="card-title"><p class="posttitle"><?php _e('Error', 'cerulean-for-wordpress'); ?></p></span>
                          </div>
                          <div class="card-content">
                            <p><?php _e('This page doesnt exist anymore or was available on the old website. To continue please select a menu option from the navigation menu.', 'cerulean-for-wordpress');?></p>
                          </div>
                      </div>

    </div><!-- end container inside -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer();
?>
