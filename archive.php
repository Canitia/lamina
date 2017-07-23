<?php get_header(); ?>
<div class="container-fluid">
    <h1 class="text-left-title-featured-sidebar"><strong><?php _e('Archive ', 'canitia');?></strong> <?php the_archive_title();?></h1>
  <div <?php post_class(); ?>>
  <div class="row">
         <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-sm-4">
                <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive archive-image', 'title' => 'Feature image']); ?>
                    </a>
                <?php else : ?>
                      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-pic-available.jpg"  alt="<?php the_title(); ?>" class="archive-image"/>
                    </a>
          <?php     
                endif;
?>
                <a href="<?php the_permalink(); ?>">
                            <p title="<?php the_title_attribute(); ?>" class="truncate"><?php the_title(); ?>
                            </p>
                        </a>
                </div>
              <?php endwhile; else: ?>
                <div class="post-content">
                    <p><?php _e('Sorry, this archive is empty.', 'canitia'); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- post-content END! -->
              <?php endif; ?>
            </div>
          <?php canitia_pagination_numeric_posts_nav(); ?>
    </div><!-- einde md8 -->

  </div><!-- container fluid END! -->

       <!-- start of footer -->
         <?php get_footer(); ?>