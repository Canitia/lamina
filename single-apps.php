<?php get_header(); ?>

     <div class="row">
     <div class="col s12 m12 l8 main-content">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
          <div class="card">
                <div <?php post_class(); ?>>
                    <article>
                      <span class="card-title-single">
                        <p class="posttitle-single"><?php the_title(); ?></p>
                        </span>
                      <div class="card-image card-image-single">
                        <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail( 'large', array( 'class' => 'responsive-img' ) );
                              } else { ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title_attribute(); ?>" class="responsive-img" />
                                <?php }; ?>
                      </div>
                      <div class="card-content">
                        <p>

                        </p>
                      </div>

                    </article><!-- close article -->

                          <!-- let user enter a comment -->
                    <?php //comments_template(); ?>
            </div><!-- close post class div -->
          </div>
                <!-- column end! -->





            <?php wp_link_pages('before=<ul class="pagination accentcolor2 center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
          </div><!-- einde md8 -->

<div class="col l4 hide-on-med-and-down">
<?php get_sidebar( 'primary' ); ?>
</div>

</div><!-- end row -->


</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
