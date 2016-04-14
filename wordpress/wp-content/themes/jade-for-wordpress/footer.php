<footer class="page-footer accentcolor">
  <div class="socialfooter center-align">
        <a href="/rss" target="_blank"><i class="fa fa-rss fa-2x"></i></a>
</div>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
      // Activate the side menu
      // Initialize collapse button
      $('.button-collapse').sideNav({
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
          }
        );
    $('.slider').slider({indicators: false});

     });
    </script>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
</footer>
  </body>
</html>
