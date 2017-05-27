<footer class="page-footer white">

    <p class="center">
      
      <?php
        $getActiveTheme = wp_get_theme();

        echo 'Powered by ' . ' <strong>' . $getActiveTheme->get( 'Name' ) . ' </strong>';
      ?>
    </p>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer();?>
</footer>
  </body>
</html>
