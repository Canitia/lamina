<?php get_header(); ?>

    <div class="row row-post">
    <div>
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col s12 m8 l8">
                                <div <?php post_class(); ?>>
                                    <article>
                                      <span class="card-title">
                                        <p class="posttitle center"><?php the_title(); ?></p>
                                        </span>
      <div class="post-subitems center">
        <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
        <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
      </div>
      <div class="card-content">
        <p><?php the_content(); ?></p>
      </div>  
  
  <section class="author-profile">
  <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
    <p class="author-bio">
    <strong class="author-name"><?php the_author_posts_link();?></strong>
  <br />
  <?php echo nl2br(get_the_author_meta('description'));  ?>
  </p>
  </section>
   </article><!-- close article -->
   <hr />
                                          <!-- let user enter a comment -->
                  <h1 class="text-left-title-featured-sidebar">Join the conversation</h1>
                                		<?php comments_template(); ?>
                            </div><!-- close post class div -->
                          </div>



                            <!-- error handling -->
                            <?php endwhile; else: ?>
                        		      <p><?php echo wpautop( 'Sorry, this post can not be found' ); ?></p>
                            <?php endif; ?>

                            <?php wp_link_pages('before=<ul class="pagination center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>
                          </div><!-- einde  -->

        <?php get_sidebar( 'primary' ); ?>

  </div><!-- end row -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer(); ?>
