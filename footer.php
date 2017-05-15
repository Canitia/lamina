<footer class="page-footer white">

    <div class="socialfooter">
        <a href="/rss" target="_blank"><i class="fa fa-rss fa-2x"></i></a>
        <p class="right">
          <?php
              $getActiveTheme = wp_get_theme();
              echo $getActiveTheme->get( 'Name' ) . " v" . $getActiveTheme->get( 'Version' );
            ?>
        </p>
      </div>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
</footer>
  </body>
</html>
