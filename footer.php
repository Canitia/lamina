<footer class="page-footer white">

    <p class="right">
      <?php
        $getActiveTheme = wp_get_theme();

        echo $getActiveTheme->get( 'Name' ) . '  ' . $getActiveTheme->get( 'Version' );
      ?>
    </p>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer();
?>
</footer>
  </body>
</html>
