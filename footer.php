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
              $getActiveTheme = wp_get_theme();

              echo '<strong>' . esc_html($getActiveTheme->get( 'Name' )) . ' </strong>' . ' ' . esc_html($getActiveTheme->get( 'Version' )) ;
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