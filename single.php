<?php get_header(); ?>
<?php the_post_thumbnail('large', ['class' => 'responsive-img', 'title' => 'Feature image']); ?>
    <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
 <div>   
    <div class="col s12 m8 l8 main-content">
    <div <?php post_class(); ?>>
        <article>
          <span class="card-title">
            <h1 class="center"><?php the_title(); ?></h1>
            </span>
          <div class="post-subitems center">
            <i class="fa fa-clock-o"></i><time><?php echo get_the_date(); ?></time>
            <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
          </div>
        <hr />
        <div class="card-content">
            <p><?php the_content(); ?></p>
        </div> 
        <section class="author-profile">
       <hr />
        <?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
          <p class="author-bio">
          <strong class="author-name"><?php the_author_posts_link();?></strong>
        <br />
        <?php echo nl2br(get_the_author_meta('description'));  ?>
        </p>
        </section>
        <hr />
        <span class="cat-links">
          <span class="label">Posted in</span> <a href="#"><?php $category = get_the_category();
            $firstCategory = $category[0]->cat_name; 
            echo $firstCategory;?></a>
         <hr />
             <?php the_tags( '<span class="label">Tags</span> ', ', ', ' ' ); ?> 
        <hr />
          </span>
       </article><!-- close article -->
                                          <!-- let user enter a comment -->
      <h1 class="text-left-title-featured-sidebar"><?php _e('Join the conversation', 'cerulean-for-wordpress'); ?></h1>
      <?php comments_template(); ?>
  
    </div><!-- close post class div -->
  </div><!-- close col s12 m8 l8 class div -->

      <!-- error handling -->
      <?php endwhile; else: ?>
            <p><?php _e('Sorry, this post can not be found or has been deleted.', 'cerulean-for-wordpress'); ?></p>
      <?php endif; ?>

      <?php wp_link_pages('before=<ul class="pagination center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>'); ?>

        <?php get_sidebar( 'primary' ); ?>
</div><!-- close col s12 m12 l12 class div -->
  </div><!-- end row -->
</div><!-- container fluid END! -->
<!-- start of footer -->
<?php get_footer(); ?>
