<?php get_header(); ?>
    <div class="row h-100">
<?php
    if ( is_single() || is_page() ) {

        if ( has_post_thumbnail() ) {
            the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']);
        }
    }
?>


        <?php if ( get_theme_mod( 'sidebar_position', 'left' ) == 'left' ) : ?>
        <!-- second column (widget bar) -->
        <?php get_sidebar( 'primary' ); ?>
        <?php endif; ?>
        
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
    <div class="col-xs-12 col-md-8 col-lg-8 main-content">
    <div <?php post_class(); ?>>
        <article>
            <h1 class="text-center"><?php the_title(); ?></h1>
          <div class="post-subitems text-center">
            <i class="fa fa-clock-o"></i><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
            <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
          </div>
        <hr class="cat-links-hr" />
        <div class="post-content">
            <?php the_content(); ?>
        </div> 

        <?php wp_link_pages('before=<ul class="pagination pagination-within center-align" role="navigation">&link_before=<li>&link_after=</li>&after=</ul>'); ?>


        <?php if ( get_theme_mod( 'show_author_section', 'show' ) == 'show' ) :
            get_template_part( 'partials/authorsection' ); 
        endif; ?>

        <div class="cat-links">
        <?php if (get_theme_mod( 'show_categories', 'show' ) == 'show' ) { ?>
        <?php if(has_category()) { ?>
          <span class="label"><i class="fa fa-list" aria-hidden="true"></i></span>
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
        <?php 
            }
        } ?>
        <?php if(has_tag()) { ?>
            <?php if ( get_theme_mod( 'show_tags', 'show' ) == 'show' ) : ?>
                <?php the_tags( '<i class="fa fa-tag" aria-hidden="true"></i>', ', ', ' ' ); ?> 
                <hr class="cat-links-hr" />
                <?php endif; ?>
        <?php } ?>
          </div>
       </article><!-- close article -->
      <?php if( comments_open() ) { ?>
	          <h3 class="h3-join-the-conversation"><?php _e('Join the conversation', 'canitia'); ?></h3>
        <?php }
        ?>
       <!-- let user enter a comment -->
      <?php comments_template(); ?>
  
    </div><!-- close post class div -->
  </div><!-- close col s12 m8 l8 class div -->

      <!-- error handling -->
      <?php endwhile; else: ?>
          <div class="post-content">
            <p><?php _e('Sorry, this post can not be found or has been deleted.', 'canitia'); ?></p>
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
