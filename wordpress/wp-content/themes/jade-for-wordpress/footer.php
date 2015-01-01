<!-- 'back to top' item at the bottom of the screen -->
    <div class="scroll-top">
        	<span class="scroll-top-inner">
        		<a href="#top"><i class="fa fa-2x fa-arrow-circle-up"></i>Back to top</a>
        	</span>
        </div>
    </div>

    <!-- Modal about site (question mark at top) -->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <h4 class="text-left-title modal-post"></i>About Jade</h4>
                <div class="modal-body">
                  <div class="panel">
                        <p>The theme currently used is called <a href="https://github.com/hxkclan/jade" target="_blank">Jade (for Wordpress)</a>. Jade uses elements from <a href="http://getbootstrap.com/" target="_blank">Bootstrap</a> with <a href="http://jquery.com/" target="_blank">JQuery</a> for modals and the (fluid) website layout. Jade also uses <a href="https://github.com/FortAwesome/Font-Awesome" target="_blank">Font-Awesome</a> for the scalable icons.
                        </p>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- call jQuery and bootstrap JS in footer -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/classie.js"></script>
    <script>
    function init() {
    window.addEventListener('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 100,
            header = document.querySelector("header");
        if (distanceY > shrinkOn) {
            classie.add(header,"smaller");
        } else {
            if (classie.has(header,"smaller")) {
                classie.remove(header,"smaller");
            }
        }
    });
}
window.onload = init();
    </script>
    <!-- close with Wordpress footer aka adminbar etc. -->
    <?php wp_footer(); ?>
  </body>
</html>
