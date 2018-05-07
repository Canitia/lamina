</div><!-- container END! -->
</main>
<footer class="footer" style="background-image:url('<?php echo esc_url( get_template_directory_uri() ); ?>/images/bgpattern.png')">
      <div class="container">
        <p class="text-center text-muted">
            <?php
              $getActiveTheme = wp_get_theme();

              echo 'Powered by ' . ' <strong>' . $getActiveTheme->get( 'Name' ) . ' </strong>' . ' ' . $getActiveTheme->get( 'Version' ) ;
            ?>    
        </p>
      </div>
          <!-- close with Wordpress footer aka adminbar etc. -->
       <?php wp_footer();?>
</footer>
  </body>
</html>