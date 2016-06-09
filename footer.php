<footer class="page-footer accentcolor">
  <div class="socialfooter">
        <a href="/rss" target="_blank"><i class="fa fa-rss fa-2x"></i></a>
        <p class="right">
          <a href="<?php echo home_url();?>/privacy-policy">privacy policy</a>
          <a href="https://jadewp.demo.insideuwp.xyz" target="_blank">powered by: Jade for Wordpress</a>
        </p>
</div>
    <!-- Compiled and minified JavaScript -->
    <script>
    $(document).ready(function(){
      // Activate the side menu
      // Initialize collapse button
      $('.button-collapse').sideNav({
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
          }
        );
     });

    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63270110-1', 'auto');
  ga('send', 'pageview');

</script>

    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
</footer>
  </body>
</html>
