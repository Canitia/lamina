<?php get_header();?>
<div class="container-fluid">
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post();?>
  
  <div class="col s12 m12 l12">
    <div <?php post_class();?>>
    <article>
      <h1 class="center"><?php the_title();?></h1>
      <div class="post-subitems center">
        <i class="fa fa-clock-o"></i><time datetime="<?php the_time('c'); ?>"><?php echo get_the_date();?></time>
        <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
      </div>
   <hr />
      <div class="post-content">
        <?php the_content();?>
      </div>  
        <?php get_template_part( 'partials/authorsection' ); ?>
        </article><!-- close article -->
  </div><!-- close post class div -->
  <!-- error handling -->
  <?php endwhile; else: ?>
       <p><?php _e('Sorry, this page can not be found or has been deleted.', 'cerulean-for-wordpress'); ?></p>
  <?php endif;?>

   <?php wp_link_pages('before=<ul class="pagination pagination-within center-align" role="navigation">&after=</ul>&link_before=<li>&link_after=</li>');?>

</div><!-- einde md8 -->
</div><!-- container fluid END! -->

<!-- start of footer -->
<?php get_footer();?>
