</div><!-- container END! -->
</main>
<footer class="footer">
      <div class="container">
        <p class="text-center">
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