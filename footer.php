</div><!-- container END! -->
</main>
<footer class="footer">
      <div class="container-fluid">

      <p class="text-center text-muted">
            <?php
              $lamina_getTheme = wp_get_theme();

              echo '<strong>' . esc_html($lamina_getTheme->get( 'Name' )) . ' </strong> ' . esc_html($lamina_getTheme->get( 'Version' ));
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