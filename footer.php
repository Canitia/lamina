<footer class="page-footer accentcolor">

    <div class="socialfooter">
        <?php get_sidebar( 'footer' ); ?>
        <p class="right">
          <a href="<?php echo home_url();?>/privacy-policy">privacy policy</a>
          <?php
              $my_theme = wp_get_theme();
              echo $my_theme->get( 'Name' ) . " v" . $my_theme->get( 'Version' );
            ?>
        </p>
      </div>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
</footer>
  </body>
</html>
