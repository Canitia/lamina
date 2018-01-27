<?php get_header(); ?>

<?php
    if ( is_single() || is_page() ) {

        if ( has_post_thumbnail() ) {
            the_post_thumbnail('full', ['class' => 'img-fluid', 'title' => 'Feature image']);
        }
    }
?>

    <div class="row h-100">
        <?php if ( get_theme_mod( 'sidebar_position', 'right' ) == 'left' ) : ?>
        <!-- second column (widget bar) -->
        <?php get_sidebar( 'primary' ); ?>
        <?php endif; ?>
        
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
    <div class="col-xs-12 col-md-8 col-lg-8 main-content">
    <div <?php post_class(); ?>>
        <article>
            <h1 class="text-center"><?php the_title(); ?></h1>
          <small class="post-subitems text-center text-muted d-block">
            <i class="fa fa-clock-o"></i><time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
            <i class="fa fa-user" aria-hidden="true"></i><?php the_author_posts_link();?>
        </small>

        <div class="post-content">
            <?php the_content(); ?>
        </div> 

        <?php wp_link_pages('before=<ul class="pagination pagination-within center-align" role="navigation">&link_before=<li>&link_after=</li>&after=</ul>'); ?>

        <div class="cat-links">

        <?php if(has_tag()) { ?>
            <?php if ( get_theme_mod( 'show_tags', 'showtags' ) == 'showtags' ) : ?>
                <div class="tagslist"><?php the_tags( '<i class="fa fa-tags" aria-hidden="true"></i>', ', ', ' ' ); ?> </div>
                <?php endif; ?>
        <?php } ?>
        <?php if (get_theme_mod( 'show_categories', 'showcategories' ) == 'showcategories' ) { ?>
        <?php if(has_category()) { ?>
          <div class="categorylist"><i class="fa fa-list" aria-hidden="true"></i></span>
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
            </div>
        <?php 
            }
        } ?>


          </div>

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
