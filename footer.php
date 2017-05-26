<footer class="page-footer white">

    <p class="center">
      
      <?php
        $getActiveTheme = wp_get_theme();

        echo 'Powered by ' . $getActiveTheme->get( 'Name' ) . '  ' . $getActiveTheme->get( 'Version' );
      ?>
    </p>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer();
?>
</footer>
  </body>
</html>
