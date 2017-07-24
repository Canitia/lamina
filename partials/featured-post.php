   <div class="container-fluid">
    <div class="row row-featured">
  <?php

        $args = array(		
            'posts_per_page' => 3,		
            'post__in'  => get_option( 'sticky_posts' )		
            );		
            $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
        $i=0;		
        while ( $query->have_posts() ) {		
            $query->the_post();	?>	
    
    <div class="col-sm-4">
    <span class="badge badge-default badge-date">
       <?php _e('featured', 'canitia');?>
    </span>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'medium', ['class' => 'img-responsive archive-image', 'title' => 'Feature image']); ?>
        </a>
    <?php else : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-pic-available.jpg"  alt="<?php the_title(); ?>" class="archive-image"/>
        </a>
    <?php endif;?>
    <a href="<?php the_permalink(); ?>">
                <p title="<?php the_title_attribute(); ?>" class="text-center truncate"><?php the_title(); ?>
                </p>
            </a>
    </div>
        <?php } ?>
<?php endif;?>
</div>
</div>