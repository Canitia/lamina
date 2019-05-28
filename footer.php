</div><!-- container END! -->
<div class="row">
<?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>
</div>

</main>
<footer class="footer">
      <div class="container-fluid">
        <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
        <!-- second column (widget bar) -->
        <?php get_sidebar( 'primary' ); ?>
        <?php endif; ?>  
      <p class="text-center text-muted">
            <?php
              $getActiveTheme = wp_get_theme();

              echo '<strong>' . $getActiveTheme->get( 'Name' ) . ' </strong>' . ' ' . $getActiveTheme->get( 'Version' ) ;
            ?>    
        </p>
      </div>
          <!-- close with Wordpress footer aka adminbar etc. -->
       <?php wp_footer();?>
</footer>
<script>
  WebFont.load({
    google: {
      families: ['Source Sans Pro:600', 'Asap', 'Anaheim']
    }
  });
</script>
  </body>
</html>