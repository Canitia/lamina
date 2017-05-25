<?php get_header(); ?>
    <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
 <div>   
    <div class="col s12 m8 l8 main-content">
    <div <?php post_class(); ?>>
        <article>
          <span class="post-title">
            <h1 class="center"><?php the_title(); ?></h1>
            </span>
          <div class="post-subitems center">
            <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
            <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
          </div>
        <hr />
        <div class="post-content">
            <p><?php the_content(); ?></p>
        </div> 

      <?php wp_link_pages('before=<hr /><ul class="pagination center-align" role="pagination">&link_before=<li>&link_after=</li>&after=</ul>'); ?>

        <?php get_template_part( 'partials/authorsection' ); ?>

        <div class="cat-links">
          <span class="label"><?php _e("Posted in", "cerulean-for-wordpress"); ?></span> <a href="#"><?php $category = get_the_category();
            $firstCategory = $category[0]->cat_name; 
            echo $firstCategory;?></a>
         <hr class="cat-links-hr" />
             <?php the_tags( '<span class="label">Tags</span> ', ', ', ' ' ); ?> 
        <hr class="cat-links-hr" />
          </div>
       </article><!-- close article -->
                                          <!-- let user enter a comment -->
      <h3 class="h3-join-the-conversation"><?php _e('Join the conversation', 'cerulean-for-wordpress'); ?></h3>
      <?php comments_template(); ?>
  
    </div><!-- close post class div -->
  </div><!-- close col s12 m8 l8 class div -->

      <!-- error handling -->
      <?php endwhile; else: ?>
            <p><?php _e('Sorry, this post can not be found or has been deleted.', 'cerulean-for-wordpress'); ?></p>
      <?php endif; ?>
        <?php get_sidebar( 'primary' ); ?>
</div><!-- close col s12 m12 l12 class div -->
  </div><!-- end row -->
</div><!-- container fluid END! -->
<!-- start of footer -->
<?php get_footer(); ?>
