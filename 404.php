<?php get_header();?>
<script>
function goBack() {
    window.history.back();
}
</script>

  <div class="row page-row">
    <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' ) : ?>
    <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>

    <div class="main-content <?php if ( is_active_sidebar('primary')) { echo 'col-md-8 col-lg-8'; } else { echo 'col-md-12 col-lg-12';};?>">
        
          <div class="card col s12 m12 l12">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <div class="card-block">
              <h2 class="card-title"><?php esc_html_e('Error', 'lamina'); ?></h2>
              <p class="card-text"><?php esc_html_e('This post/page doesnt exist anymore or has been renamed. Try searching for it.', 'lamina');?></p>
                <div class="spacer"></div>
                <div class="card-actions-bottom">
                  <a class="btn btn-primary read-more-btn" onclick="goBack()"><?php esc_html_e('Return to the previous page', 'lamina');?></a>
                  <a class="btn btn-primary read-more-btn" href="/"><?php esc_html_e('Return to the homepage', 'lamina');?></a>
                </div>
            </div>
          </div>  

    </div><!-- main content END! -->

    <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
    <!-- second column (widget bar) -->
      <?php get_sidebar( 'primary' ); ?>
    <?php endif; ?>
    
</div><!-- row END! -->
<!-- start of footer -->
<?php get_footer();
?>
