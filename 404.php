<?php get_header(); ?>
<script>
function goBack() {
    window.history.back();
}
</script>

  <div class="row page-row">
    <div class="main-content col-md-12 col-lg-12">
        
          <div class="card col s12 m12 l12">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <div class="card-block">
              <h2 class="card-title"><?php esc_html_e('Error', 'lamina'); ?></h2>
              <p class="card-text"><?php esc_html_e('This post/page doesnt exist anymore or has been renamed. Try searching for it.', 'lamina');?></p>
              <?php get_search_form(); ?>  
              <div class="spacer"></div>
                <div class="card-actions-bottom">
                  <a class="btn btn-primary read-more-btn" href="/"><?php esc_html_e('Return to the homepage', 'lamina');?></a>
                </div>

            </div>
          </div>  

    </div><!-- main content END! -->
</div><!-- row END! -->
<!-- start of footer -->
<?php get_footer();
?>
