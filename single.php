<?php get_header(); ?>
 <div class="container-fluid">
    <div class="row">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
 <div>   
    <div class="col s12 m8 l8 main-content">
    <div <?php post_class(); ?>>
        <article>
            <h1 class="center"><?php the_title(); ?></h1>
          <div class="post-subitems center">
            <i class="fa fa-clock-o"></i><time datetime="<?php the_date('Y-m-d h:m'); ?>"><?php echo get_the_date(); ?></time>
            <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
          </div>
        <hr />
        <div class="post-content">
            <?php the_content(); ?>
        </div> 

      <?php wp_link_pages('before=<hr /><ul class="pagination center-align" role="pagination">&link_before=<li>&link_after=</li>&after=</ul>'); ?>

        <?php get_template_part( 'partials/authorsection' ); ?>

        <div class="cat-links">
          <span class="label"><?php _e("Posted in", "cerulean-for-wordpress"); ?></span>
          <?php $categories = get_the_category();
            $separator = ', ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach( $categories as $category ) {
                    $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' 
                    . esc_html( $category->name ) . '</a>' . $separator;
                }
                echo trim( $output, $separator );
            } ?>
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
            <p class="post-errortext"><?php _e('Sorry, this post can not be found or has been deleted.', 'cerulean-for-wordpress'); ?></p>
      <?php endif; ?>
        <?php get_sidebar( 'primary' ); ?>
</div><!-- close col s12 m12 l12 class div -->
  </div><!-- end row -->
</div><!-- container fluid END! -->
<!-- start of footer -->
<?php get_footer(); ?>
