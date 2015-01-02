<?php get_header(); ?>

   <div class="container-fluid">
       <div class="container-inside">
    <div>
    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <article>
            <div <?php post_class(); ?>>
                <div class="modal-post"><!-- post header -->
                    <h4 class="text-left-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php
                        if ( has_post_thumbnail() ) {
                        	the_post_thumbnail();
                        }?>

                    <p class="text-right postdate"><?php echo 'Written by '; the_author(); ?></p>
                    <p class="text-right postdate"><?php the_tags(); ?></p>
                </div>



                <div class="entry clear">

                    <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                    <?php the_content(); ?>

                </div><!--. entry-->

                    <!-- navigation?-->
                    <?php wp_link_pages(); ?>

                <!--.post-footer-->
                <footer class="postfooter">
                <?php edit_post_link(); ?>
                </footer>
            </div><!--.post-header-->
        </article> <!-- column 1 end! -->


	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>

	  	<hr>
          <!-- let user enter a comment -->
		<?php comments_template(); ?>

        </div>
</div>
    </div>







</div><!-- container fluid END! -->

<?php get_footer(); ?>
