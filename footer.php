<footer class="page-footer accentcolor">
  <div class="socialfooter">
        <a href="/rss" target="_blank"><i class="fa fa-rss fa-2x"></i></a>
        <p class="right">
          <a href="<?php echo home_url();?>/privacy-policy">privacy policy</a>
          <?php
              $my_theme = wp_get_theme();
              echo $my_theme->get( 'Name' ) . " is version " . $my_theme->get( 'Version' );
            ?>
        </p>
      </div>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
</footer>
  </body>
</html>
