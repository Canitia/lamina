<?php get_header();?>
<div class="container-fluid">
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
  
   <div class="col s12 m12 l12">
          <div <?php post_class();?>>
                <article>
                  <span class="post-title">
                    <h1 class="center"><?php the_title();?></h1>
                    </span>
      <div class="post-subitems center">
        <i class="fa fa-clock-o"></i><time datetime="<?php the_date('Y-m-d'); ?>"><?php echo get_the_date();?></time>
        <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
      </div>
   <hr />
      <div class="post-content">
        <p><?php the_content();?></p>
      </div>  
        <?php get_template_part( 'partials/authorsection' ); ?>
                                    </article><!-- close article -->
                            </div><!-- close post class div -->

                            <!-- error handling -->
                            <?php endwhile;
else: ?>
                        		      <p><?php _e('Sorry, this page can not be found or has been deleted.', 'cerulean-for-wordpress'); ?></p>
<?php endif;
?>
                            <?php wp_link_pages('before=<ul class="pagination center-align" role="pagination">&after=</ul>&link_before=<li>&link_after=</li>');?>
                          </div><!-- einde md8 -->

</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer();?>
