<footer class="footer">
      <div class="container">
        <p class="text-center">
            <?php
              $getActiveTheme = wp_get_theme();

              echo 'Powered by ' . ' <strong>' . $getActiveTheme->get( 'Name' ) . ' </strong>';
            ?>
        <?php if ( get_theme_mod( 'display_social', 'show' ) == 'show' ) : ?>
          <div class="author-social float-right">
              <i class="fa fa-twitter-square" aria-hidden="true"></i>
          </div>
      <?php endif; ?>        
        </p>
      </div>
          <!-- close with Wordpress footer aka adminbar etc. -->
       <?php wp_footer();?>
</footer>
  </body>
</html>