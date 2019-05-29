</div><!-- container END! -->
<div class="row">
  <!-- widget bar -->
  <?php get_sidebar( 'primary' ); ?>
</div>

</main>
<footer class="footer">
      <div class="container-fluid">
      <p class="text-center text-muted">
            <?php
              $laminaGetTheme = wp_get_theme();
              $laminaVersion = $laminaGetTheme->get( 'Version' );
              $laminaGetThemeName = $laminaGetThemeName->get( 'Name' );

              echo '<strong>' . esc_html_e($laminaGetThemeName,'lamina') . ' </strong>' . ' ' . esc_html_e($laminaVersion,'lamina') ;
            ?>    
        </p>
      </div>
          <!-- close with WordPress footer aka adminbar etc. -->
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