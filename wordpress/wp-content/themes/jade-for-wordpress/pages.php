<?php get_header(); ?>

   <div class="container-fluid">


    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row">
                <div>
            <div <?php post_class(); ?>>
                <h4 class="text-left-title modal-post"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a> <p class="text-right postdate"><?php the_time( 'M j y' ); ?></p></h4>

            </div><!--.post-header-->

                <div class="entry clear">

                    <?php if ( function_exists( 'add_theme_support' ) ) the_post_thumbnail(); ?>

                    <?php the_content(); ?>

                </div><!--. entry-->

                    <!-- navigation?-->
                    <?php wp_link_pages(); ?>

                <footer class="postfooter">
                <?php edit_post_link(); ?>
                <address itemscope itemtype="http://schema.org/Person">
                    <?php the_author(); ?>

                </footer>
                <!--.post-footer-->

            </div><!-- .post-->
                </div>
                    <!-- column 1 end! -->


	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>


    </div>


<div class="scroll-top">
	<span class="scroll-top-inner">
		<a href="#top"><i class="fa fa-2x fa-arrow-circle-up"></i>Back to top</a>
	</span>
</div>
</div><!-- container fluid END! -->

<?php get_footer(); ?>
