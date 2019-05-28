<?php get_header(); ?>

    <div class="row h-100 page-row post-row">
        <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' ) : ?>
        <!-- second column (widget bar) -->
        <?php get_sidebar( 'primary' ); ?>
        <?php endif; ?>
        
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
    <div class="<?php if ( is_active_sidebar('primary')) { echo 'col-md-12 col-lg-12';};?> main-content">
    <div <?php post_class(); ?>>
        <article>
        <div class="post-head">
                <h1 class="text-center post-title"><?php the_title(); ?></h1>
                <div class="post-subitems text-center d-block">
                     <i class="fas fa-clock"></i><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                     <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
                </div>
        </div>

        <?php
        if ( has_post_thumbnail() ) {
            the_post_thumbnail('full', ['class' => 'post-head-image', 'title' => 'Feature image']);
        } else {
            ?>
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/no-pic-available.jpg" alt="<?php the_title(); ?>" class="img-fluid" />
        <?php } ?>

        <div class="post-content">
            <?php the_content(); ?>
        </div> 

        <?php wp_link_pages('before=<ul class="pagination pagination-within center-align" role="navigation">&link_before=<li>&link_after=</li>&after=</ul>'); ?>

        <?php if ( get_theme_mod( 'show_author_section', 'hideauthor' ) == 'showauthor' ) :
            get_template_part( 'partials/authorsection' ); 
        endif; ?>
       </article><!-- close article -->
       <!-- let user enter a comment -->
      <?php comments_template(); ?>
  
    </div><!-- close post class div -->
  </div><!-- close col s12 m8 l8 class div -->

      <!-- error handling -->
      <?php endwhile; else: ?>
          <div class="post-content">
            <p><?php _e('Sorry, this post can not be found or has been deleted.', 'lamina'); ?></p>
            <?php get_search_form(); ?>
        </div><!-- post-content END! -->
      <?php endif; ?>


  <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'right' ) : ?>
  <!-- second column (widget bar) -->
  <?php get_sidebar( 'primary' ); ?>
  <?php endif; ?>
  </div><!-- end row -->
<!-- start of footer -->
<?php get_footer(); ?>